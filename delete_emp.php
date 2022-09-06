<?php session_start();
      include("includes/conn.php");
      
$id = (int) $_GET['id'] ?? 0;
if (!$id) {
    header('Location: index.php');
    exit;
}
$clean_id = $connect->real_escape_string($id);
$query = "SELECT * FROM employees WHERE employee_id = '$clean_id'"; // safe
$result = $connect->query($query);
$data = $result->fetch_assoc();

if (!$data) {
  header('Location: index.php');
  exit;
}
if (isset($_POST['confirmed']) && $_POST['confirmed'] == 'yes') {
  
  $query = 'DELETE FROM employees WHERE employee_id = ?';
  $stmt = $connect->prepare($query); // mysqli_stmt
  $stmt->bind_param('i', $id);
  $stmt->execute();
 
  // Redirect
  header('Location: displayemployee.php');
  exit;
}
?>
<?php include("includes/header.php"); ?>

<div class="container">
        <h1></h1>
        <hr>
        <h2 class="mb-4">Delete Employee</h2>

        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) . "?id={$id}" ?>" method="post">
            <h3>Do you want to delete Employee Number: <?= $id ?> ?</h3>
            <button type="submit" class="btn btn-danger" name="confirmed" value="yes">Yes,, Delete</button>
            <a href="index.php" class="btn btn-dark">No</a>
        </form>
    </div>

<?php include("includes/footer.php"); ?>