<?php

namespace Onlineshop\Classes\handlers\validations;
use  Onlineshop\Classes\handlers\validations\validator;
require_once "validator.php";

class Password implements validator{

    public function check($key, $password)
{   //keep commented if you want simple validation
    if (empty($password)) {
        return "Invalid $key.";
    } elseif (strlen($password) < 8) {
        return "$key must be at least 8 characters long.";
    // } elseif (!preg_match("/[a-z]/", $password)) {
    //     return "$key must contain at least one lowercase letter.";
    // } elseif (!preg_match("/[A-Z]/", $password)) {
    //     return "$key must contain at least one uppercase letter.";
    // } elseif (!preg_match("/[0-9]/", $password)) {
    //     return "$key must contain at least one digit.";
    // 
    } else {
        return false;
    }
}
}