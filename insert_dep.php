<?php
session_start();
include("includes/conn.php");
$errors = [];
if($_SERVER['REQUEST_METHOD'] == 'POST'){

  $dname = $_POST['dname'];
  $dlocation = $_POST['dlocation'];

  if (!isset($_POST['dname']) || empty($_POST['dname'])) {
    $errors['dname'] = 'The Department Name filed is required.';
    }
  if (!isset($_POST['dlocation']) || empty($_POST['dlocation'])) {
      $errors['dlocation'] = 'The Department Location filed is required.';
      }

  if (!$errors) {
  
  $query = 'INSERT INTO department (department_name,location) VALUES (?, ?)';
  $stmt = $connect->prepare($query);
  $stmt->bind_param('ss', $_POST['dname'], $_POST['dlocation']);
  $stmt->execute();

 
  $_SESSION['flash_messages']['success'] = 'Account created!';

header("Location: displaydep.php"); 
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
          <h3 class="text-center my-3">Add a Department HERE! </h3>

          
          <label for="dname">Department Name</label>
          <input type="text" name="dname" class="form-control my-2" placeholder="Enter Department Name" autocomplete="off">
          <?php if (isset($errors['dname'])) : ?>
                    <p class="text-danger"><?= $errors['dname'] ?></p>
          <?php endif ?>


          <label for="dlocation">Location</label>
          <input type="text" name="dlocation" class="form-control my-2" placeholder="Enter ur Last Name" autocomplete="off">
          <?php if (isset($errors['dlocation'])) : ?>
                    <p class="text-danger"><?= $errors['dlocation'] ?></p>
          <?php endif ?>
          <input type="submit" value="Add Department" name="adddep" class="btn btn-success"
          />
          
        </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>