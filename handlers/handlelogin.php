<?php 
require_once "../App.php"; // Adjust the path as needed


if ($request->check($request->post("submit")) ) { 

    $username_or_email = $request->santize($request->post('username_or_email'));
    $password = $request->santize($request->post('password'));

    // Validate input
    $validate->endvalidate("username_or_email", $username_or_email,["Required","Str"]);
    $validate->endvalidate("password", $password,["Required", "Password"]);

    $errors = $validate->geterror();

    if (empty($errors)) {
        
        $where = "where username = '$username_or_email' OR email = '$username_or_email'";
        $users = $db->select("*","users",$where);

        if ($users) {
            foreach ($users as $user) {
               $dbpassword = $user["password"];
               if (password_verify($password, $dbpassword)) {
                $user_id = $user["id"];
                $session->set("user_id", $user_id);
                $session->set("sucess","welcome ".$user["username"] );
                $request->redirect("../index.php");
               }else {
                $session->set("errors",["email or pasword mistake"]);
                $request->redirect("../index.php");
               }               
            }
        } else {
            $session->set("errors",["no user found"]);
            $request->redirect("../index.php");
        }
        
    


    } else {
        $session->set("errors",$errors);
        $request->redirect("../index.php");
    }
    



}else {
    $request->redirect("../index.php");
}