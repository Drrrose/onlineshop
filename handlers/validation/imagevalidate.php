<?php 
namespace Onlineshop\Classes\handlers\validations;
use  Onlineshop\Classes\handlers\validations\validator;
require_once "validator.php";

class Imagevalidate implements validator{

    public function check($ext,$image)
    {       
            if ($image['error']!=0) {
               return "Error uploading image.";
            }
            elseif($image["size"]>5242880) {//5mb
            return  "image size is too large";
            }
            elseif(!in_array($ext,array('jpg', 'jpeg', 'png'))){
                return "please keep allowed extentions only";
            }
            else {
                return false;
            }
    }
}