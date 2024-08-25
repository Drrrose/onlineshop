<?php include 'inc/header.php'; 
require_once 'App.php';



$id = $request->get("id");
$products = $db->select("*","products","where id=$id");
?>

<div class="container my-5">
    <div class="row">
        <?php
        if($request->notempty($products)):
        foreach ($products as $product):?>

        <div class="col-lg-6 offset-lg-3">
            <form  action="handlers/update.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="title" value="<?php echo $product["title"]?>" name="title">
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price:</label>
                    <input type="number" class="form-control" id="price" value="<?php echo $product["price"]?>" name="price">
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Description:</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="body"><?php echo $product["body"]?></textarea>
                </div>

                <div class="mb-3">
                    <label for="formFile" class="form-label">Image:</label>
                    <input class="form-control" type="file" id="formFile"  name="image">
                </div>

                <div class="col-lg-3">
                    <img src="images/<?php echo $product["image"]?>" class="card-img-top" />
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary" name="submit">Add</button>
                </div>
            </form>
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