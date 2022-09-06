<?php 
include("includes/conn.php");
$output="";
if(isset($_POST['register'])){
  $fname= $_POST['fname'];
  $lname= $_POST['lname'];
  $uname= $_POST['uname'];
  $gender= $_POST['gender'];
  $role = $_POST['role'];
  $pass = $_POST['pass'];
  $c_pass = $_POST['c_pass'];

  $error = array();
  if(empty($fname)){
    $error['error'] = 'First Name is Empty';
  }else if(empty($lname)){
    $error['error'] = 'Last Name is Empty';
  }else if(empty($uname)){
    $error['error'] = 'User Namea is Empty';
  }else if(empty($gender)){
    $error['error'] = 'Select Gender';
  }else if(empty($role)){
    $error['error'] = 'Select Role';
  }else if(empty($pass)){
    $error['error'] = 'Enter Password';
  }else if(empty($c_pass)){
    $error['error'] = 'Confirm Password';
  }else if( $pass != $c_pass){
    $error['error'] = "Passwords Dosen't Match";
  }


  if(isset($error['error'])){
    $output .= $error['error'];
  }else{
    $output .="";
  }

  if(count($error) < 1) {
    $query = "INSERT INTO users (firstname, lastname, username,gender,role,password)
    VALUES ('$fname', '$lname', '$uname','$gender','$role','$pass')";

    $res= mysqli_query($connect,$query);

    if($res){
      $output .= "You Have Successfully Register! ";
      header("Location:index.php");
    }else{
      $output .= "Failed To Register";
    }
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
  <div class="container">
  <div class="col-md-12">
    <div class="row d-flex justify-content-center">
      <div class="col-md-6 shadow-sm" style="margin-top: 10px;">
        <form action="" method="post">
          <h3 class="text-center my-3">Register</h3>

          <div class="text-center text-danger"><?php echo $output ?></div>
          <label for="">First Name</label>
          <input type="text" name="fname" class="form-control my-2" placeholder="Enter ur First Name" autocomplete="off">

          <label for="lname">Last Name</label>
          <input type="text" name="lname" class="form-control my-2" placeholder="Enter ur Last Name" autocomplete="off">


          <label for="uname">User Name</label>
          <input type="text" name="uname" class="form-control my-2" placeholder="Enter User Name" autocomplete="off">

          <label for="gender">Select Gender</label>
          <select class="form-control my-2" name="gender">
            <option  val="male">--Select Gender--</option>
            <option val="male">Male</option>
            <option val="female">Female</option>
          </select>

          <label for="role">Select Role</label>
          <select name="role" class="form-control my-2">
            <option value="user">--Select Role--</option>
            <option value="admin">Admin</option>
            <option value="user">User</option>
          </select>

          <label for="">Password</label>
          <input type="password" name="pass" class="form-control my-2" placeholder="Enter Password">
          <label for="">Confirm Password</label>
          <input type="password" name="c_pass" class="form-control my-2" placeholder="Confirm Password">


          <input type="submit" value="Register" name="register" class="btn btn-success">
        </form>
      </div>
    </div>
  </div>
</div>
<div style="margin-top: 30px;"></div>
</body>
</html>