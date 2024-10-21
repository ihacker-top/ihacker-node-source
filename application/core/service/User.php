<?php

namespace app\core\service;

class User {

     public function checkEmail ($email) {
        
        $pattern = '/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/';
        if (preg_match($pattern, $email)) {
            return true;
        }else {
            return false;
        }
    }
}