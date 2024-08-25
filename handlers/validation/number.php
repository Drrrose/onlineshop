<?php


namespace Onlineshop\Classes\handlers\validations;
require_once "validator.php";
use Onlineshop\Classes\handlers\validations\validator;

class Number implements validator {

public function check($key, $value){
    if (!is_numeric($value)) {
        return "$key must be number ";
    } else {
        return false;
    }
}
}