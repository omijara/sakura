<?php
//include'db/dbcon.php';
session_start();
$phone = $_POST['number'];
require_once('layouts/db/dbcon.php');
$sql = "SELECT *FROM users WHERE (username = '$phone')";
$result = mysqli_query($link, $sql);
// var_dump($result);
// exit();
$data_row = mysqli_fetch_array($result);



//$row = mysqli_num_rows($result);



if(mysqli_num_rows($result)==1){


       
     // if(!$row == 0) {

        // $_SESSION['login_user'] = $username;

         //echo "Login Success";
   
if($phone ==  $data_row['username'])
{
        $_SESSION['user_id'] = $data_row['id']; 
        $_SESSION['username'] = $data_row['username'];
        $_SESSION['user_level'] = $data_row['user_level'];
        $_SESSION['name'] = $data_row['name'];
         header("Location:layouts/quantity.php");
}
else
{
$msg ="Username or Password is invalid";
header("location:store_login.php?msg=".$msg);
}


}
else{

$msg ="Username or Password is invalid";
header("location: store_login.php?msg=".$msg);
}


        
       // 
         
         
//if ($rows['username'] == $username and $rows['password'] == $password) {



?>
