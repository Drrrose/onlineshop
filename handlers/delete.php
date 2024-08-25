<?php 
require_once '../App.php';


if ($request->check($request->get("id"))) {

    $id = $request->santize($request->get("id"));
    $products = $db->select("image","products","where id = $id");


    foreach ($products as $product) {
        $image_to_delete = $product["image"] ;
        
        if ($request->notempty($product)) {
            $delete = $db->delete("products","where id = $id");
            if ($delete) {
                $session->set("success","product deleted ! ");
                $request->redirect("../index.php");
                unlink("../images/$image_to_delete");
            } else {
                $session->set("errors",["error while deleting "]);
                $request->redirect("../index.php");
            }
            
            
        } else {
            $session->set("errors",["uncaught error or id missing ! "]);
            $request->redirect("../index.php");
        }
        
    }



} else {
    $session->set("errors",["uncaught error or id missing ? "]);
    $request->redirect("../index.php");
}
