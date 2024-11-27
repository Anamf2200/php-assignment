<?php

$server= 'localhost';
$username='root';
$password='';
$database='website';


$conn= new PDO("mysql:host=$server;dbname=$database",$username,$password);
$conn->setAttribute(pdo::ERRMODE_WARNING, pdo::ERRMODE_EXCEPTION);


if($conn){

}else{
    echo 'error';
}















?>