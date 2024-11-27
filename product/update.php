<?php

include (__DIR__ . '/../basic/config.php');
include(__DIR__ . '/../basic/startlink.php');
?>

<div class="conatiner">
    <div class="row">

    </div>
</div>

<?php
if(isset($_REQUEST['update'])){
    $id = $_REQUEST['update'];
    // echo $id;

    $fetch= $conn->prepare("SELECT * FROM `product`WHERE Id='$id'");
    $fetch->execute();
    $data = $fetch->fetchAll();

    if($data){
         foreach($data as $row){
            ?>

<div class="col-12">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mt-3">
                    <label for="n">Name</label>
                    <input type="text"  value="<?php echo $row['Name']?>" class="form-control " name="prname" id="n " required >
                </div>

                <div class="mt-3">
                    <label for="d">Description</label>
                    <input type="text" value="<?php echo $row['Description']?>" class="form-control " name="prdesc" id="d" required>
                </div>

                
                <div class="mt-3">
                    <label for="pr">Price</label>
                    <input type="number"  value="<?php echo $row['Price']?>" class="form-control " name="prprice" id="pr" required>
                </div>

                <div class="mt-3">
                    <label for="im">Image</label>
                    <input type="file" class="form-control " name="primage" id="im" >
                    <img src="./uploads/<?php echo $row['Image']?>" style='width:100px;' alt="">
                </div>


                <div class="mt-3">
                    <button type="submit" name="updproduct" value="<?php echo $row['Id']?>" class="btn btn-primary">Update Product</button>
                </div>
            </form>
        </div>
        <?php
         }
         }
         else{
            ?>
            <div class="container mt-5">
    <div class="row mt-5 text-center">
        <div class="col-12 mt-5 bg-secondary">
            <h1>
                <?php
                echo 'No user found'?>
                  </h1>
        </div>
    </div>
</div>
<?php

         }

    }

    ?>

</div>
</div>

<?php

if(isset($_REQUEST['updproduct'])){
$updID=$_REQUEST['updproduct'];
// echo $updID;
$imagefetch= $conn->prepare("SELECT * FROM `product`WHERE Id='$updID'");
$imagefetch->execute();
$show=$imagefetch->fetch();
$oldimage=$row['Image'];
$updName=$_REQUEST['prname'];
$updDesc=$_REQUEST['prdesc'];
$updprice=$_REQUEST['prprice'];
$updimage=$_FILES['primage']['name'];
$updimagetmp=$_FILES['primage']['tmp_name'];
$updimageloc="./uploads/".$updimage;


if($updimage==null){
    $update=$conn->prepare("UPDATE product SET Name='$updName',Description='$updDesc',Price='$updprice',Image='$oldimage' WHERE Id='$updID'");
    $update->execute();
    header("location:./read.php");
}
else{
    $update=$conn->prepare("UPDATE product SET Name='$updName',Description='$updDesc',Price='$updprice',Image='$updimage' WHERE Id='$updID'");
    $update->execute();
    if($update){

        if (unlink('./uploads/'.$oldimage))
        {
        if (move_uploaded_file($updimagetmp,$updimageloc))
            {
            header("location:./read.php");
        }
    }
}

}

}




include (__DIR__ . '/../basic/endlinks.php');
?>