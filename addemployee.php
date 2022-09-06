<?php 
session_start();
include("includes/conn.php");
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $efname= $_POST['efname'];
  $elname= $_POST['elname'];
  $eage  = $_POST['eage'];
  $euname= $_POST['euname'];
  $eaddress = $_POST['eaddress'];
  $egender  = $_POST['egender'];
  $edep = $_POST['dep'];
  $epass    = $_POST['epass'];
  $ec_pass  = $_POST['ec_pass'];
  $email = $_POST['eemail'];


  $error = [];

      if (!isset($_POST['efname']) || empty($_POST['efname'])) {
        $errors['efname'] = 'The fName filed is required.';
        }
      if (!isset($_POST['elname']) || empty($_POST['elname'])) {
          $errors['elname'] = 'The lName filed is required.';
      }
      if (!isset($_POST['eage']) || empty($_POST['eage'])) {
        $errors['eage'] = 'The Age filed is required.';
        }
      if (!isset($_POST['euname']) || empty($_POST['euname'])) {
          $errors['euname'] = 'The UserName filed is required.';
          }
      if (!isset($_POST['eaddress']) || empty($_POST['eaddress'])) {
            $errors['eaddress'] = 'The Address filed is required.';
            }
      if (!isset($_POST['egender']) || empty($_POST['egender'])) {
              $errors['egender'] = 'The Gender filed is required.';
          }
      if (!isset($_POST['dep']) || empty($_POST['dep'])) {
            $errors['dep'] = 'The Dep filed is required.';
            }
      if (!isset($_POST['epass']) || empty($_POST['epass'])) {
              $errors['epass'] = 'The Password filed is required.';
              }
    

  
  if(count($error) < 1) {
    $query = "INSERT INTO employees (firstname, lastname,age,gender,address,email,username,password,dep_id)
    VALUES ('$efname', '$elname', '$eage','$egender','$eaddress','$email','$euname','$epass',$edep)";
    
    $res= mysqli_query($connect,$query);
    
    header("Location: displayemployee.php");
}
 }
?>


 <?php include("includes/header.php"); ?>
  
 
        <form action="" method="post">
          <h3 class="text-center my-3">Add Employee</h3>

          <div class="text-center text-danger"></div>
          <label for="">First Name</label>
          <input type="text" name="efname" class="form-control my-2" placeholder="Enter ur First Name" autocomplete="off">
          <?php if (isset($errors['efname'])) : ?>
                    <p class="text-danger"><?= $errors['efname'] ?></p>
          <?php endif ?>


          <label for="elname">Last Name</label>
          <input type="text" name="elname" class="form-control my-2" placeholder="Enter ur Last Name" autocomplete="off">
          <?php if (isset($errors['elname'])) : ?>
                    <p class="text-danger"><?= $errors['elname'] ?></p>
          <?php endif ?>


          <label for="eage">Age</label>
          <input type="number" min="18" name="eage" class="form-control my-2" placeholder="Enter ur Age">
          <?php if (isset($errors['eage'])) : ?>
                    <p class="text-danger"><?= $errors['eage'] ?></p>
          <?php endif ?>


          <label for="email">Email Address</label>
          <input type="email" name="eemail" class="form-control my-2" placeholder="Enter ur email" autocomplete="off">
          <?php if (isset($errors['eemail'])) : ?>
                    <p class="text-danger"><?= $errors['eemail'] ?></p>
          <?php endif ?>


          <label for="uname">User Name</label>
          <input type="text" name="euname" class="form-control my-2" placeholder="Enter User Name" autocomplete="off">
          <?php if (isset($errors['euname'])) : ?>
                    <p class="text-danger"><?= $errors['euname'] ?></p>
          <?php endif ?>


          <label for="eaddress">Address</label>
          <input type="text" name="eaddress" class="form-control my-2" placeholder="Enter ur Address" >
          <?php if (isset($errors['eaddress'])) : ?>
                    <p class="text-danger"><?= $errors['eaddress'] ?></p>
          <?php endif ?>


          <label for="dep">Select ur Department</label>
          <select class="form-control my-2" name="dep">
            <option value="0">--Select Department--</option>
            <?php
                        $query = 'SELECT * FROM department ORDER BY department_name';
                        $result = $connect->query($query);
                        while ($row = $result->fetch_object()) :
                        ?>
                        <option value="<?= $row->dep_id ?>"><?= $row->department_name ?></option>
            <?php endwhile ?>
          </select>
          <?php if (isset($errors['dep'])) : ?>
                    <p class="text-danger"><?= $errors['dep'] ?></p>
          <?php endif ?>



          <label for="egender">Select Gender</label>
          <select class="form-control my-2" name="egender">
            <option  value="">--Select Gender--</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
          </select>
          <?php if (isset($errors['egender'])) : ?>
                    <p class="text-danger"><?= $errors['egender'] ?></p>
          <?php endif ?>




          <label for="epass">Password</label>
          <input type="password" name="epass" class="form-control my-2" placeholder="Enter Password">
          <?php if (isset($errors['epass'])) : ?>
                    <p class="text-danger"><?= $errors['epass'] ?></p>
          <?php endif ?>
          <label for="">Confirm Password</label>
          <input type="password" name="ec_pass" class="form-control my-2" placeholder="Confirm Password">


          <input type="submit" value="Add Employee!" name="addemp" class="btn btn-success">
        </form>
      </div>
    </div>
  </div>
</div>
 <?php include("includes/footer.php"); ?>