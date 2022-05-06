<?php
namespace iboxs\encryption\lib;

trait Aes {
                // 'pwd'=>'0Tyxysgyain*6458.12s6545x6ma58dx8&^dsak134166',
                // 'iv'=>chr(0x18) . chr(0xB6) . chr(0xA1) . chr(0x0F) . chr(0xA9) . chr(0x40) . chr(0x6B) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x78) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0xA5) . chr(0x13)


    public function Des($str,$key,$iv){
        $password = $key;
        $method = 'aes-256-cbc';
        $key = substr(hash('sha256', $password, true), 0, 32);
        $iv = $iv;
        $decrypted = openssl_decrypt(base64_decode($str), $method, $key, OPENSSL_RAW_DATA, $iv);
        return $decrypted;
    }

    public function Aes($str,$key,$iv){
        $password =  $key;
        $method = 'aes-256-cbc';
        $key = substr(hash('sha256', $password, true), 0, 32);
        $encrypted = base64_encode(openssl_encrypt($str, $method, $key, OPENSSL_RAW_DATA, $iv));
        return $encrypted;
    }
}