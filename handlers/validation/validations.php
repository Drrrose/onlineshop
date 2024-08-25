<?php 
namespace Onlineshop\Classes\handlers\Validations;


class Validations{
    private $errors = [];


    public function endvalidate($key,$value,$rules){
        foreach ($rules as $rule) {
            $rule = "Onlineshop\Classes\handlers\Validations\\".$rule;
            $obj  = new $rule;
            $reslut = $obj->check($key,$value);
            if($reslut){
                $this->errors[] = $reslut;
            }
            
        }
    }

    public function geterror(){
        return $this->errors;
    }

}