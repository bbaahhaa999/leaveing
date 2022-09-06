<?php

session_start();
include("includes/conn.php");

$id = (int) $_GET['id'] ?? 0;
if (!$id) {
    header('Location: index.php');
    exit;
}
#SELECT * FROM department ORDER BY department_name
$clean_id = $connect->real_escape_string($id);
$query = "SELECT * FROM department WHERE dep_id = '$clean_id'"; // safe
$result = $connect->query($query);
$data = $result->fetch_assoc();

if (!$data) {
  header('Location: index.php');
  exit;
}

if($_POST){
  
  $dname = $_POST['dname'] ??'';
  $dlocation = $_POST['dlocation'] ??'';
  
    if($dname && $dlocation)
  {
  
  $query = "UPDATE department SET  department_name =?,
                                  location =? where dep_id =?" ;
  $stmt = $connect->prepare($query);
  $stmt->bind_param('ssi', $dname,$dlocation,$id);
  $stmt->execute();


header("Location: displaydep.php"); 
}
}
?>

  <?php include("includes/header.php"); ?>
  <div class="container">
        <h1>My Department</h1>
        <hr>
        
        <h2 class="mb-4">Edit Department</h2>
        <form action="<?= $_SERVER['PHP_SELF'] ."?id={$id}" ?>" method="post">
          
          <label for="dname">Department Name</label>
          <input type="text" name="dname" class="form-control my-2" value="">
          


          <label for="dlocation">Location</label>
          <input type="text" name="dlocation" class="form-control my-2" value="">
          
          <input type="submit" value="Update Department" name="adddep" class="btn btn-success"/>
          
        </form>
      </div>
    <?php include("includes/footer.php"); ?>