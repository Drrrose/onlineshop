<?php include 'inc/header.php';
require_once 'App.php';

$products = $db->select("*","products");
$protest = '';
// print_r($products);
?>


<div class="container my-5">
    <div class="row justify-content-center">
        
        <?php 
                    require_once "inc/errors.php";
                    require_once "inc/success.php";
                    ?>

</div>
<div class="row">
        
    <?php  if($request->notempty($products)):  /*using not empty method to display " no products found " 
    if the products is empty or doesn't run probably " you can test it using the null $protest" */ 
             foreach ($products as $product):
             ?>
            
            <div class="col-lg-4 mb-3">
                <div class="card">
                    <img src=" images/<?php echo $product["image"] ?>" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $product["title"] ?></h5>
                        <p class="text-muted"><?php echo $product["price"]." EGP" ?></p>
                        <p class="card-text"><?php echo $product["body"] ?></p>
                        <a href="show.php?id=<?php echo $product["id"]  ?>" class="btn btn-primary">Show</a>
                        <a href="edit.php?id=<?php echo $product["id"]  ?>" class="btn btn-info">Edit</a>
                        <a href="handlers/delete.php?id=<?php echo $product["id"]  ?>" class="btn btn-danger">Delete</a>
                    </div>
                </div>
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