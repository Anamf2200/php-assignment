<?php
include './navbar.php';

include './startlink.php';
include './config.php';


if(isset($_POST['add'])){

    $name=$_POST['username'];
    $email=$_POST['useremail'];
    $password =$_POST['userpass'];

    $encrypt= password_hash($password,PASSWORD_BCRYPT);
    // echo $encrypt;


    $check_email = $conn->prepare("SELECT * FROM `signup` where Email= '$email'");
$check_email->execute();
$data=$check_email->fetchAll();

if(count($data)>0){

    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
    <strong>Email Already Exist. Change your Email</strong>.
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";

}else{
$insert= $conn->prepare("INSERT INTO signup (Name,Email,Password)VALUES ('$name','$email','$encrypt')");
$insert->execute();
 if($insert){
    echo"<div class='alert alert-warning alert-dismissible fade show' role='alert'>
      <strong>You Registered Successfully</strong>.
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
 }


}
}


 ?>




<div class="container">
   
    <div class="row">
    <h1>User Sign Up Form</h1>
        <div class="col-12">
            <form action="" method="POST">
                <div class="mt-3">
                    <label for="n">Name</label>
                    <input type="text" name="username" id="n" placeholder="Enter Name" class="form-control" required>
                </div>

                <div class="mt-3">
                    <label for="e">Email</label>
                    <input type="email" name="useremail" id="e" placeholder="Enter Email" class="form-control" required>
                </div>
                <div class="mt-3">
                    <label for="p">Password</label>
                    <input type="password" name="userpass" id="p" placeholder="Enter Password" class="form-control" required>
                </div>

                <div class="mt-3">
                   <button type="submit" class="btn btn-primary" name="add">SignUp</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
<?php
include './endlinks.php';
include './footer.php';

?>