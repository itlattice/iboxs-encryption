<?php
namespace iboxs\encryption\lib;

trait RSA {
    /**
     * 公钥加密
     */
    public function PublicEntry($data,$public_key){
        $public_key = chunk_split($public_key , 64, "\n");
        $public_key = "-----BEGIN PUBLIC KEY-----\n".wordwrap($public_key)."-----END PUBLIC KEY-----";
        openssl_public_encrypt($data, $encrypted, $public_key);
        $encrypted = base64_encode($encrypted);
        return $encrypted;
    }

    /**
     * 私钥解密
     */
    public function PrivateDecrypt($data,$private_key){
        $private_key = chunk_split($private_key , 64, "\n");
        $private_key = "-----BEGIN RSA PRIVATE KEY-----\n".wordwrap($private_key)."-----END RSA PRIVATE KEY-----";
        openssl_private_decrypt(base64_decode($data), $decrypted, $private_key);
        return $decrypted;
    }

    /**
     * 私钥加密
     */
    public function PrivateEntry($data,$private_key){
        $private_key = chunk_split($private_key , 64, "\n");
        $private_key = "-----BEGIN RSA PRIVATE KEY-----\n".wordwrap($private_key)."-----END RSA PRIVATE KEY-----";
        openssl_private_encrypt($data,$encrypted,$private_key);
        //加密后的内容通常含有特殊字符，需要base64编码转换下
        $encrypted = base64_encode($encrypted);
        return $encrypted;
    }

    /**
     * 公钥解密
     */
    public function PublicDecrypt($data,$public_key){
        $public_key = chunk_split($public_key , 64, "\n");
        $public_key = "-----BEGIN PUBLIC KEY-----\n".wordwrap($public_key)."-----END PUBLIC KEY-----";
        openssl_public_decrypt(base64_decode($data), $decrypted, $public_key);
        return $decrypted;
    }
}