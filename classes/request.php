<?php 
namespace Onlineshop\Classes;
class request {
    public function get($key){
        return (isset($_GET[$key])) ? $_GET[$key] : null ; 
    }

    public function post($key){
        return (isset($_POST[$key])) ? $_POST[$key] : null ; 
    }

    public function check($data)
    {
        return  isset($data);
    }
    public function images($data){
        return isset($_FILES[$data]) ? $_FILES[$data]: null;
    }

    public function santize ($data){
        return trim(htmlspecialchars($data));
    }

    // public function isGet() {
    //     return $_SERVER['REQUEST_METHOD'] === 'GET';
    // }
    
    // public function isPost() {
    //     return $_SERVER['REQUEST_METHOD'] === 'POST';
    // }
    

    public function redirect($url) {
        header("Location: $url");
        exit();
    }
    
    public function notempty($data){
        return !empty($data);
    }


}