<?php

namespace app\common\tools;

class Aes {
    
    private $key = '123456';
    private $iv = '123456';
    private $mode = 'AES-128-CBC';

    public function setKey ($value) {

        $this->key = $value;
    }

    public function setIv ($value) {

        $this->iv = $value;
    }

    public function setMode ($value) {

        $this->mode = $value;
    }

    //加密
    public function encrypt($data){

        return  base64_encode(openssl_encrypt($data, $this->mode, $this->key, OPENSSL_RAW_DATA, $this->iv));
    }

    //解密
    public function decrypt($data){

        return openssl_decrypt(base64_decode($data), $this->mode, $this->key, OPENSSL_RAW_DATA, $this->iv);
    }
}