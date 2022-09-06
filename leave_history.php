<?php 
 include('includes/session.php');
 
 include('includes/header.php');
 include('includes/conn.php');
?>

			<div class="title pb-20 pt-20">
				<h2 class="h3 mb-0">Leave History</h2>
			</div>
			

			<div class="card-box mb-30">
				<div class="pd-20">
						<h2 class="text-blue h4">ALL MY LEAVE</h2>
					</div>
				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
						<thead>
							<tr>
								<th class="table-plus">LEAVE TYPE</th>
								<th>DATE FROM</th>
								<th>DATE TO</th>
								<th>NO. OF DAYS</th>
								<th>STATUS</th>	
							</tr>
						</thead>
						<tbody>
							<tr>
								 <?php 
                       $query = "SELECT * from leaves where emp_id = '$session_id'";
                       $result =$connect->query($query);
                       while($row = $result-> fetch_assoc()) : ?>
                       

	                      <td><?php echo htmlentities($row['leave_type']);?></td>
                            <td><?php echo htmlentities($row['fromdate']);?></td>
                            <td><?php echo htmlentities($row['todate']);?></td>
                            <td><?php echo htmlentities($row['num_days']);?></td>
                            <td><?php $stats=$row['status'];
                                 if($stats=="approved"){
                                  ?>
                                     <span style="color: green">Approved</span>
                                      <?php } if($stats=="napproved")  { ?>
                                     <span style="color: red">Not Approved</span>
                                      <?php } if($stats=='waiting')  { ?>
	                                 <span style="color: blue">Pending</span>
	                                 <?php } ?>

                                    </td>      
								   <td>
									 
								   </td>
							</tr>
							<?php endwhile;?>  
						</tbody>
					</table>
			   </div>
			</div>

			<?php include('includes/footer.php'); ?>
		</div>
	</div>