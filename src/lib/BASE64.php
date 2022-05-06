<?php
namespace iboxs\encryption\lib;
trait BASE64{
    /**
     * BASE64字符串加密
     */
    public function Base64Encry($str){
        return base64_encode($str);
    }
    /**
     * BASE64字符串解密
     */
    public function Base64Decrypt($str){
        return base64_decode($str);
    }

    /**
     * Base64对图片编码
     */
    public function Base64EncodeImage($file) {
        $base64_image = '';
        $image_info = getimagesize($file);
        $image_data = fread(fopen($file, 'r'), filesize($file));
        $base64_image = 'data:' . $image_info['mime'] . ';base64,' . chunk_split(base64_encode($image_data));
        return $base64_image;
    }

    /**
     * 图片base64解码
     * @param string $base64_image_content 图片文件流
     * @param string $path  文件保存路径（文件夹）
     * @return bool|string 文件路径
     */
    public function Base64DecryptImage($base64_image_content,$path=''){
        if(empty($base64_image_content)){
            return false;
        }
     
        //匹配出图片的信息
        $match = preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_image_content, $result);
        if(!$match){
            return false;
        }
        $base64_image = str_replace($result[1], '', $base64_image_content);
        $file_content = base64_decode($base64_image);
        $file_type = $result[2];
        $file_path = $path;
        if(!is_dir($file_path)){
            //检查是否有该文件夹，如果没有就创建
            mkdir($file_path,0777,true);
        }
        $file_name = time().".{$file_type}";
        $new_file = $file_path.$file_name;
        if(file_exists($new_file)){
            @unlink($new_file);
        }
        if (file_put_contents($new_file, $file_content)){
            return $new_file;
        }
        return false;
    }
}