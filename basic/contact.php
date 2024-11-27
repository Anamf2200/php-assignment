<?php

include './navbar.php';

include './startlink.php';
include './config.php';


if(isset($_REQUEST['sub'])){
    $name=$_REQUEST['name'];
    $email = $_REQUEST['email'];
    $number= $_REQUEST['number'];
    $address=$_REQUEST['address'];
    $age=$_REQUEST['age'];


    $select=$conn->prepare("SELECT * FROM `contact`WHERE Email='$email'");
    $select->execute();
    $fetch=$select->fetchAll();

    if(count($fetch)>0){
        echo'Email already exist';
    }
    else{
$insert=$conn->prepare("INSERT INTO `contact`(Name,Email,Number,Address,Age)VALUES('$name','$email','$number','$address','$age')");
$insert->execute();
echo"<div class='alert alert-warning alert-dismissible fade show' role='alert'>
      <strong>Contact Saved successfully</strong>.
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
   


    }
}

?>
<div class="container">
    <div class="row">
        <h1>Contact Form</h1>
        <div class="col-12">
            <form action="" method="post">
                <div class="mt-3">
                    <label for="n">Name</label>
                    <input type="text" placeholder="Enter Product name" class="form-control " name="name" id="n " required>
                </div>

                <div class="mt-3">
                    <label for="em">Email</label>
                    <input type="email" placeholder="Enter your email" class="form-control " name="email" id="em" required>
                </div>

                <div class="mt-3">
                    <label for="num">Number</label>
                    <input type="number" placeholder="Enter your age" class="form-control " name="number" id="num" required>
                </div>
                <div class="mt-3">
                    <label for="add">Address</label>
                    <input type="text" placeholder="Enter your address" class="form-control " name="address" id="add" required>
                </div>

                <div class="mt-3">
                    <label for="ag">Age</label>
                    <input type="number" class="form-control " name="age" id="ag" placeholder="Enter your age" required>
                </div>


                <div class="mt-3">
                    <button type="submit" name="sub" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>













<?php

include './endlinks.php';
include './footer.php';

?>