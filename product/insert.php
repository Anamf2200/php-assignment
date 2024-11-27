<?php


include (__DIR__."/../basic/startlink.php");
include(__DIR__ ."/../basic/config.php");


if(isset($_REQUEST['addproduct'])){

    $name=$_REQUEST['prname'];
    $desc = $_REQUEST['prdesc'];
    $rate= $_REQUEST['prrate'];
    $price=$_REQUEST['prprice'];
$image= $_FILES['primage']['name'];
$image_tmp=$_FILES['primage']['tmp_name'];
$image_loc= "./uploads/".$image;

$select = $conn->prepare("SELECT * FROM `product`where Name= '$name'");

$select->execute();
// echo $select;
$row = $select->fetchAll();


if(count($row)>0){
echo'Product exist already';

}

else{

    $insert=$conn->prepare("INSERT INTO `product`(Name,Description,Ratings,Price,Image)VALUES('$name','$desc','$rate','$price','$image')");
    $insert->execute();


    if($insert){

        move_uploaded_file($image_tmp,$image_loc);

    }
else{
    echo'no product added';
}

}

}

?>


<div class="container">
    <div class="row">
        <h1>Product Form</h1>
        <div class="col-12">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mt-3">
                    <label for="n">Name</label>
                    <input type="text" placeholder="Enter Product name" class="form-control " name="prname" id="n " required>
                </div>

                <div class="mt-3">
                    <label for="d">Description</label>
                    <input type="text" placeholder="Enter Product Description" class="form-control " name="prdesc" id="d" required>
                </div>

                <div class="mt-3">
                    <label for="r">Ratings</label>
                    <input type="number" placeholder="Enter Product Ratings" class="form-control " name="prrate" id="r" required>
                </div>
                <div class="mt-3">
                    <label for="pr">Price</label>
                    <input type="number" placeholder="Enter Product Price" class="form-control " name="prprice" id="pr" required>
                </div>

                <div class="mt-3">
                    <label for="im">Image</label>
                    <input type="file" class="form-control " name="primage" id="im" required>
                </div>


                <div class="mt-3">
                    <button type="submit" name="addproduct" class="btn btn-primary">Add Product</button>
                </div>
            </form>
        </div>
    </div>
</div>



<?php

include (__DIR__.'/../basic/endlinks.php');

?>