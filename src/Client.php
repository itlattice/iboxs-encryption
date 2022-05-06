<?php
/**
 * 加密从这里开始
 * @author  zqu zqu1016@qq.com
 */
namespace iboxs\encryption;

use iboxs\encryption\lib\{BASE64,Md5,Aes, RSA};

class Client
{
    use Md5,Aes,BASE64,RSA;
}