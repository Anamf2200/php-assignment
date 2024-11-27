<?php

include './navbar.php';

include './startlink.php';
include './config.php';


if(isset($_REQUEST['fb'])){
    $name=$_REQUEST['name'];
    $email=$_REQUEST['email'];
        $image= $_FILES['image']['name'];
        $image_tmp=$_FILES['image']['tmp_name'];
        $image_loc= "./reviews/".$image;
    $reviews = $_REQUEST['rev'];


    $select=$conn->prepare("SELECT * FROM `feedback`");
$select->execute();
$fetch=$select->fetchAll();
if( move_uploaded_file($image_tmp,$image_loc)){
   
    $insert=$conn->prepare("INSERT INTO `feedback`(Name,Email,Product_image,Reviews)VALUES('$name','$email','$image','$reviews')");
    $insert->execute();
    $insert->fetchAll();
    echo"<div class='alert alert-warning alert-dismissible fade show' role='alert'>
      <strong>Feedback submitted Successfully</strong>.
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";

}
else{
 echo'Error';
  
}

}


















?>



<div class="container">
    <div class="row">
        <h1>Feedback Form</h1>
        <div class="col-12">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mt-3">
                    <label for="n">Name</label>
                    <input type="text" placeholder="Enter Product name" class="form-control " name="name" id="n " required>
                </div>

                <div class="mt-3">
                    <label for="em">Email</label>
                    <input type="email" placeholder="Enter your email" class="form-control " name="email" id="em" required>
                </div>

                <div class="mt-3">
                    <label for="pro">Product</label>
                    <input type="file" class="form-control " name="image" id="pro" required>
                </div>

                <div class="mt-3">
                    <label for="rv">Reviews</label>
                    <textarea name="rev" id="rv" class="form-control "placeholder="Enter your feedback"></textarea>
                </div>


                <div class="mt-3">
                    <button type="submit" name="fb" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php

include './endlinks.php';
include './footer.php';

?>