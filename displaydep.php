<?php
session_start();
include("includes/conn.php");
include("includes/header.php");
?>

            <h2 class="mx-5 my-5">Departments</h2>
            <div class="mx-5 my-5">
                <a href="insert_dep.php" class="btn btn-sm btn-outline-primary">Add Department</a>
            </div>
        
        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
            <!-- <div class="mb-3 d-flex">
                <select name="action" class="form-select me-2">
                    <option value="">Select Action</option>
                    <option value="delete">Bulk Delete</option>
                </select>
                <button type="submit" class="btn btn-dark">Do action on selected items</button>
            </div> -->
            <table class="table table-hover table-striped  my-5" >
                <thead>
                    <tr>
                       
                        <th>Department Name</th>
                        <th>Department Location</th>                        
                    </tr>
                </thead>
                <tbody class="">
                    <?php
                    $query = 'SELECT * FROM department ORDER BY department_name';
                    $result = $connect->query($query);
                 
                    
                    while ( $row = $result->fetch_assoc() ) :
                    ?>
                    <tr>
                        <!-- <td><input type="checkbox" name="id[]" value="<?= $row['id'] ?>"></td> -->
                        <!-- <td>
                          <?php echo $row['id'] ?>
                      </td> -->
                        <td><?= $row['department_name'] ?></td>
                        <td><?= $row['location'] ?></td>
                        
                        <td><a href="edit_dep.php?id=<?= $row['dep_id'] ?>" class="btn btn-sm btn-outline-success">Edit</a></td>
                        <td><a href="delete_dep.php?id=<?= $row['dep_id'] ?>" class="btn btn-sm btn-outline-danger">Delete</a></td>
                        
                    </tr>
                    <?php
                    endwhile
                    ?>
                </tbody>
            </table>
        </form>
    <?php include("includes/footer.php") ?>

