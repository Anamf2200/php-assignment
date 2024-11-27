<?php
include(__DIR__ . '/../basic/config.php');
include(__DIR__ . '/../basic/startlink.php');

$id = $_REQUEST['delete'];
$delete=$conn->prepare("DELETE FROM `product`where Id='$id'");
$delete->execute();
if($delete){
    header('Location:./read.php');
}



?>