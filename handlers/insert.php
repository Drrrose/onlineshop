<?php 
require_once "../App.php";

if ($request->check($request->post("submit")) ) {
    
    //catch
    $title = $request->santize($request->post("title"));
    $price = $request->santize($request->post("price"));
    $body = $request->santize($request->post("body"));
    $image = $request->images("image");
    if ($image) {
        $tmp_name = $image['tmp_name'];
        $imgname = $image['name'];
        $ext = strtolower(pathinfo($imgname, PATHINFO_EXTENSION)); // use strtolower to handle case sensitivity
    }
    
    //validate
    
    $validate->endvalidate("title",$title,["Required","Str"]);
    $validate->endvalidate("price",$price,["Required","Number"]);
    $validate->endvalidate("body",$body,["Required","Str"]);
    $validate->endvalidate($ext,$image,["Imagevalidate"]);
    $errors = $validate->geterror();
    
    if(empty($errors)) {
        $imagenewname = uniqid().".$ext";
        $upload = move_uploaded_file($tmp_name,"../images/$imagenewname");

        if ($upload){
          $user_id =  $session->get("user_id");
          $insert =  $db->insert("products", ["title"=>$title,"price"=>$price,"body"=>$body,"image"=>$imagenewname,"user_id"=>$user_id]);
          if ($insert) {
            $session->set("success","Product Added");
            $request->redirect("../index.php");

          } else {
            $session->set("errors",["failed to add product"]);
        $request->redirect("../index.php");
          }
          
        }else {
            $session->set("errors",["failed to upload image"]);
        $request->redirect("../index.php");
        }        
    }else {
        $session->set("errors",$errors);
        $request->redirect("../index.php");
        
    }
    

    



    
    
    
}else {
    $request->redirect("../index.php");
}