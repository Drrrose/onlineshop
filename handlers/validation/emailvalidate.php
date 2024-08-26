<?php

namespace Onlineshop\Classes\handlers\validations;
use  Onlineshop\Classes\handlers\validations\validator;
require_once "validator.php";

class email implements validator{

    public function check($key,$email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Invalid $key address.";
        } elseif (strlen($email) > 254) {
            return "$key address is too long.";
        } else {
            return false;
        }
    }
}