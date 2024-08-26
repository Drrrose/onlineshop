<?php

require_once 'classes/Request.php';
require_once 'classes/Session.php';
require_once 'classes/Database.php';
require_once "handlers/validation/Number.php";
require_once "handlers/validation/Required.php";
require_once "handlers/validation/Str.php";
require_once "handlers/validation/validations.php";
require_once "handlers/validation/imagevalidate.php";
require_once "handlers/validation/emailvalidate.php";
require_once "handlers/validation/passwordvalidate.php";

use Onlineshop\Classes\handlers\validations\Validations;
use Onlineshop\Classes\Request;
use Onlineshop\Classes\Session;


$request = new Request;
$session = new Session;
$db = new Database;
$validate = new Validations;