<?php

include("includes/session.php");
include("includes/conn.php");
if($_SERVER['REQUEST_METHOD'] == 'POST'){
$username = $_POST['uname'];
$password = $_POST['pass'];
$newpassword = $_POST['newpass'];
$confirmnewpassword = $_POST['confirmnewpass'];
$q="SELECT password FROM employees WHERE employee_id ='$session_id';";
$result = mysqli_query($connect,$q);
$data = $result->fetch_assoc();

$out="";
if(!$result){
        $out .= "The username you entered does not exist";
        }
        //$password!= $data['password']
        else if(false)
        {
        $out .= "You entered an incorrect password";
        }
    if($data){
        if($newpassword==$confirmnewpassword)
        $sql=mysqli_query($connect,"UPDATE employees SET password='$newpassword' where username='$username'");
}
}
      ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
</head>
<body>
  <?php include("includes/header.php"); ?>
  <body>

  <div class="container my-5"> 
      <h3 class="text-center">Change Password</h3>
      <h5 class="text-center text-danger"><?php $out ?></h5>
  </div>
  <form method="post" action="" class="container my-5">
  <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label">User Name</label>
    <div class="col-sm-4">
      <input type="text" name="uname" class="form-control" id="inputEmail3" placeholder="Enter ur User Name Please">
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Old Password</label>
    <div class="col-sm-4">
      <input type="password" name="pass" class="form-control" id="inputPassword3" placeholder="Enter Old Password">
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputPassword3" class="col-sm-2 col-form-label">New Password</label>
    <div class="col-sm-4">
      <input type="password" name="newpass" class="form-control" id="inputPassword3" placeholder="Enter New Password">
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Confirm Password</label>
    <div class="col-sm-4">
      <input type="password" name="confirmnewpass" class="form-control" id="inputPassword3" placeholder="Confirm New Password">
    </div>
  </div>
  
  <input type="submit" value="Update Password" class="btn btn-primary"></input>
</form>


