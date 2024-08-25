<?php 

namespace  Onlineshop\Classes\handlers\validations;
require_once "validator.php";
use  Onlineshop\Classes\handlers\validations\validator;

class Required implements validator {

public function check($key, $value){
    if (empty($value)) {
        return "$key is required ";
    } else {
        return false;
    }
}
}