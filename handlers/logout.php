<?php 

require_once "../App.php";


$session->remove("user_id");
$session->set("sucess","you have logged out");
$request->redirect("../index.php");
exit();