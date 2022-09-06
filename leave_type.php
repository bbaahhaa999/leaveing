<?php session_start(); ?>
<?php include('includes/header.php')?>
<?php include('includes/conn.php')?>


<?php 
	 if (isset($_GET['delete'])) {
		$leave_type_id = $_GET['delete'];
		$sql = "DELETE FROM leave_type where id = ".$leave_type_id;
		$result = mysqli_query($connect, $sql);
		if ($result) {
			echo "<script>alert('LeaveType deleted Successfully');</script>";
     		echo "<script type='text/javascript'> document.location = 'leave_type.php'; </script>";
			
		}
	}
?>
<?php
 if(isset($_POST['add']))
{
	 $leavetype=$_POST['leavetype'];
	 $description=$_POST['description'];
	 $dtefrom=date('d-m-Y', strtotime($_POST['date_from']));
	 $dteto=date('d-m-Y', strtotime($_POST['date_to']));

   $query = mysqli_query($connect,"select * from leave_type where Leave_Type = '$leavetype'");
	 $count = mysqli_num_rows($query);

   if ($count > 0){ 
    echo "<script>alert('LeaveType Already exist');</script>";
   }
   else{
     $query = mysqli_query($connect,"insert into leave_type (leave_type,description, date_from, date_to)
    values ('$leavetype', '$description', '$dtefrom', '$dteto')");

 if ($query) {
   echo "<script>alert('LeaveType Added');</script>";
   echo "<script type='text/javascript'> document.location = 'leave_type.php'; </script>";
 }
 }
}
?>
<div class="py-4"></div>
<div class="row">
						<div class="col-lg-4 col-md-6 col-sm-12 mb-30">
							<div class="card-box pd-30 pt-10 height-100-p">
								<h2 class="mb-30 h4 py-3">New Leave Type</h2>
								<section>
									<form name="save" method="post">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label >Leave Type</label>
												<input name="leavetype" type="text" class="form-control" required="true" autocomplete="off">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Leave Description</label>
												<textarea name="description" style="height: 5em;" class="form-control text_area" type="text"></textarea>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Start Date</label>
												<input name="date_from" class="form-control" type="date">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label>End Date</label>
												<input name="date_to" class="form-control" type="date">
											</div>
										</div>
									</div>
									
									<div class="col-sm-12 text-right">
										<div class="dropdown">
										   <input class="btn btn-primary" type="submit" value="REGISTER" name="add" id="add">
									    </div>
									</div>
								   </form>
							    </section>
							</div>
						</div>
						
						<div class="col-lg-8 col-md-6 col-sm-12 mb-30">
							<div class="card-box pd-30 pt-10 height-100-p">
								<h2 class="mb-30 h4 py-3">Leave Type List</h2>
								
									<table class="data-table table stripe hover nowrap">
										<thead>
										<tr>
											<th class="table-plus">LEAVETYPE</th>
											<th class="table-plus">DESCRIPTION</th>
											<th table-plus>DATE RANGE</th>
											<th class="datatable-nosort">ACTION</th>
										</tr>
										</thead>
										<tbody>

											<?php $query = "SELECT * from leave_type";
											$result = $connect->query($query);
											
											while($row = $result->fetch_assoc()) :
                       ?>  
											<tr>
												<td> <?php echo htmlentities($row['leave_type']);?></td>
	                           <td><?php echo htmlentities($row['description']);?></td>
	                           <td><?php echo htmlentities($row['date_from']." - ".$row['date_to']);?></td>
												<td>
													<div class="table-actions">
														<a href="edit_leave_type.php?edit=<?php echo htmlentities($row['id']);?>" data-color="#265ed7"><i class="icon-copy dw dw-edit2 text-info"></i></a>
														<a href="leave_type.php?delete=<?php echo htmlentities($row['id']);?>" data-color="#e95959"><i class="icon-copy dw dw-delete-3 text-danger"></i></a>
													</div>
												</td>
                        <
											</tr>

											<?php endwhile; ?>  

										</tbody>
									</table>
								</div>
							</div>
						</div>
					
          <?php include('includes/footer.php') ?>