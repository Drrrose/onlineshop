<?php include 'inc/header.php'; 
require_once 'App.php';

$id = $request->get("id");

$products = $db->select("*","products","where id=$id");

// print_r($products);
?>

<div class="container my-5">

    <div class="row">
    <?php  if($request->notempty($products)):  /* using not empty method to display " no products found " 
    if the products is empty or doesn't run probably */
             foreach ($products as $product):?>
            <div class="col-lg-6">
                    <img src="images/<?php echo $product["image"] ?>" class="card-img-top">
            </div>
    <div class="col-lg-6">
        <h5 ><?php echo $product["title"] ?></h5>
        <p class="text-muted"><?php echo $product["price"]."EGP" ?> </p>
        <p><?php echo $product["body"] ?></p>
        <a href="index.php" class="btn btn-primary">Back</a>
        <a href="edit.php?id=<?php echo $id ?>" class="btn btn-info">Edit</a>
        <a href="handlers/delete.php?id=<?php echo $id ?>"class="btn btn-danger">Delete</a>
    </div>
    <?php endforeach;
            else:?>
        <div class="col-lg-12 mb-3">
        <p>No products found.</p>
    </div>
    <?php endif?>
        
    </div>
</div>



<?php include 'inc/footer.php'; ?>