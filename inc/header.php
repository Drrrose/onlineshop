<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Shop</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php  require_once "App.php" ?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Online Shop</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">All Products</a>
        </li>
        <?php if(!is_null($session->get("user_id"))): ?>
        <li class="nav-item">
            <a class="nav-link" href="Add.php">Add Product</a>
        </li>
      <?php endif; ?>
      </ul>
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <?php if(is_null($session->get("user_id"))): ?>
        <li class="nav-item">
          <a class="nav-link" href="inc/login.php">Log In</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="inc/signup.php">Sign Up</a>
        <?php else: ?>
        <li class="nav-item">
          <a class="nav-link" href="handlers/logout.php">Log Out</a>
        </li>
          <?php endif; ?>
        </li>
      </ul>
    </div>
  </div>
</nav>
