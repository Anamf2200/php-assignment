<?php


include './startlink.php';
include './navbar.php';
include './config.php';






?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<div class="container">
   
   <div class="row">
   <h1>LOGIN</h1>
       <div class="col-12">
           <form action="" method="POST">
               

               <div class="mt-3">
                   <label for="e">Email</label>
                   <input type="email" name="useremail" id="e" placeholder="Enter Email" class="form-control" required>
               </div>
               <div class="mt-3">
                   <label for="p">Password</label>
                   <input type="password" name="userpass" id="p" placeholder="Enter Password" class="form-control" required>
               </div>

               <div class="mt-3">
                  <button type="submit" class="btn btn-primary" name="add">Login</button>
               </div>
           </form>
       </div>
   </div>
</div>
</body>
</html>




<?php


if(isset($_REQUEST['add'])){

    $useremail=$_REQUEST['useremail'];
    $userpassword=$_REQUEST['userpass'];
  
    
    $verify=$conn->prepare("SELECT * FROM `signup`where Email='$useremail'");

    $verify->execute();
    $result= $verify->fetch();
    $signemail=$result['Email'];
    $signpass=$result['Password'];

   
    
   if($useremail==$signemail && password_verify($userpassword,$signpass)){


     ?>



    <script>

window.location.href = ("./main.php");
    </script>
 <?php
   }
  
   else{
    echo'Incorrect login credentials';
   }

}



        
        ?>


























<?php
include './endlinks.php';
include './footer.php';

?>