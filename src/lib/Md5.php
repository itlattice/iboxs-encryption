<?php
namespace iboxs\encryption\lib;
trait Md5{
    /**
     * MD5字符串摘要算法
     */
    public function md5($str){
        return md5($str);
    }
}