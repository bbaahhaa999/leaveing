<?php
session_start();
include("includes/conn.php");
?>
<?php include("includes/header.php"); ?>
  <h3 class="text-center my-5">Display Employee</h3>
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
                        
                        <th>First Name</th>
                        <th>Last Name</th>                        
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>username</th>
                        <th>Department</th>
                    </tr>
                </thead>
                <tbody >
                
       
                    <?php
                    $query = 'SELECT e.employee_id, e.firstname,e.lastname,e.age,e.gender,e.address,e.email,e.username,d.department_name
                    from employees e , department d
                    where e.dep_id = d.dep_id;';
                    $result = $connect->query($query);
                 
                    
                    while ($row = $result->fetch_array()):
                     
                    ?>
                    <tr>
                        
                        <td><?= $row['firstname'] ?></td>
                        <td><?= $row['lastname'] ?></td>
                        <td><?= $row['age'] ?></td>
                        <td><?= $row['gender'] ?></td>
                        <td><?= $row['address'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td><?= $row['username'] ?></td>
                        <td><?= $row['department_name'] ?></td>
                        <td><a href="edit_emp.php?id=<?= $row['employee_id'] ?>" class="btn btn-sm btn-outline-success">Edit</a></td>
                        <td><a href="delete_emp.php?id=<?= $row['employee_id'] ?>" class="btn btn-sm btn-outline-danger">Delete</a></td>
                    </tr>
                    <?php
                    endwhile
                    ?>
                </tbody>
            </table>
        </form>
<?php include("includes/footer.php"); ?>