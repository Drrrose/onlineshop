<?php
require_once "../App.php";


if ($request->check($request->post("submit")) and $request->check($request->get("id")) ) {
    
    //catch
    $id = $request->santize($request->get("id"));
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
        $products =  $db->select("*","products","where id= $id");

        // Update only the fields that have been changed
        foreach ($products as $product) {
            $updateData = [];
            if ($title !== $product["title"]) {
                $updateData["title"] = $title;
            }
            if ($price !== $product["price"]) {
                $updateData["price"] = $price;
            }
            if ($body !== $product["body"]) {
                $updateData["body"] = $body;
            }
        }
            $imagenewname = uniqid().".$ext";
            $upload = move_uploaded_file($tmp_name,"../images/$imagenewname");
            if ($upload) {
                $oldimage = $product['image'];
                unlink("../images/$oldimage");
                $updateData["image"] = $imagenewname;
            } else {
                $session->set("errors", ["failed to upload image"]);
                $request->redirect("../index.php");
            }
        
        
        // Update the product data
        if (!empty($updateData)) {
            $update = $db->update("products", $updateData,"where id= $id");
            if ($update) {
                $session->set("success", "Product updated");
                $request->redirect("../index.php");
            } else {
                $session->set("errors", ["failed to update product"]);
                $request->redirect("../index.php");
            }
        } else {
            $session->set("errors", ["no changes made"]);
            $request->redirect("../index.php");
        }







        // $imagenewname = uniqid().".$ext";
        // $upload = move_uploaded_file($tmp_name,"../images/$imagenewname");

        // if ($upload){
        //   $insert =  $db->insert("products", ["title"=>$title,"price"=>$price,"body"=>$body,"image"=>$imagenewname]);
        //   if ($insert) {
        //     $session->set("success","Product Added");
        //     $request->redirect("../index.php");

        //   } else {
        //     $session->set("errors",["failed to add product"]);
        // $request->redirect("../index.php");
        //   }
          
        // }else {
        //     $session->set("errors",["failed to upload image"]);
        // $request->redirect("../index.php");
        // }        

    }else {
        $session->set("errors",$errors);
        $request->redirect("../index.php");
        
    }
}
