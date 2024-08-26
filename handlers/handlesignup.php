<?php
require_once "../App.php";

// Ensure the request is from form submission
if ($request->check($request->post("submit")) ) {    
    // Sanitize and validate input
    $username = $request->santize($request->post("username"));
    $email = $request->santize($request->post("email"));
    $password = $request->santize($request->post("password"));

    $validate->endvalidate("username", $username, array("Required", "Str"));
    $validate->endvalidate("email", $email, array("Required", "Email"));
    $validate->endvalidate("password", $password, array("Required", "Password"));

    $errors = $validate->geterror();

    if (empty($errors)) {
        $password_hashed = password_hash($password, PASSWORD_DEFAULT);

        try {
            $insert = $db->insert("Users", array("username" => $username, "email" => $email, "password" => $password_hashed));
            if ($insert) {
                $session->set("success", "You have signed up !");
                $request->redirect("../inc/login.php");
            } else {
                $session->set("errors", array("Error while inserting"));
                $request->redirect("../index.php");
            }
        } catch (Exception $e) {
            $session->set("errors", array("Database error: " . $e->getMessage()));
            $request->redirect("../index.php");
        }
    } else {
        $session->set("errors", $errors);
        $request->redirect("../index.php");
    }
} else {

    $session->set("errors",["signup issue"]);
    $request->redirect("../index.php");
}
