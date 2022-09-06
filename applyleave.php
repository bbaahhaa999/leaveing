<?php 
 include('includes/session.php');
 
 include('includes/header.php');
 include('includes/conn.php');
?>

<?php
error_reporting(E_ERROR | E_PARSE);
	if(isset($_POST['apply']))
	{
	$empid=$session_id;
	$leave_type=$_POST['leave_type'];
	$fromdate=(strtotime($_POST['date_from']));
	$todate=(strtotime($_POST['date_to']));
	$description=$_POST['description'];  
	$datePosting = date("Y-m-d");
  $status="waiting";

	if($fromdate > $todate)
	{
      echo "<script>alert('End Date should be greater than Start Date');</script>";
	  }else {
		
		$DF = ($_POST['date_from']);
		$DT = ($_POST['date_to']);

		#$diff =  date_diff($DF , $DT );
    $diff = (int)($DF - $DT);
		#$num_days = (1 + $diff->format("%a"));
      $num_days = abs(round($diff / 86400));
		$sql="INSERT INTO leaves(leave_type,todate,fromdate,description,postingdate,emp_id,status,num_days)
     VALUES('$leave_type','$DT','$DF','$description','$datePosting','$empid','$status','$num_days')";
     $res= mysqli_query($connect,$sql);
		
    header("Location: leave_history.php");

	}

}

?>

  
    <div class="pb-20">
      <div class="min-height-200px">
        <div class="page-header">
          <div class="row">
            <div class="col-md-6 col-sm-12">
              <div class="title">
                <h4>Leave Application</h4>
              </div>
            </div>
          </div>
        </div>

        <div style="margin-left: 50px; margin-right: 50px;" class="pd-20 card-box mb-30">
          <div class="clearfix">
            <div class="pull-left">
              <h4 class="text-blue h4">Employee Form</h4>
              <p class="mb-20"></p>
            </div>
          </div>
          <div class="wizard-content">
            <form method="post" action="">
              <section>

                
                <?php
                  $q = "select * from employees where employee_id = '$session_id'"; 
                  $result = $connect->query($q);
                  
                  $row = $result->fetch_assoc();
                ?>
            
                <div class="row">
                  <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                      <label >First Name </label>
                      <input name="firstname" type="text" class="form-control wizard-required" required="true" readonly autocomplete="off" value="<?php echo $row['firstname']; ?>">
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                      <label >Last Name </label>
                      <input name="lastname" type="text" class="form-control" readonly required="true" autocomplete="off" value="<?php echo $row['lastname']; ?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                      <label>Email Address</label>
                      <input name="email" type="text" class="form-control" required="true" autocomplete="off" readonly value="<?php echo $row['email']; ?>">
                    </div>
                  </div>
                  
                 
                </div>
                <div class="row">
                  <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                      <label>Leave Type :</label>
                      <select name="leave_type" class="custom-select form-control" required="true" autocomplete="off">
                      <option value="">Select leave type...</option>
                      <?php
                        $query = "SELECT leave_type from leave_type";
                        $result = $connect->query($query);
                        while ($row = $result->fetch_object()) :
                        ?>
                        <option value="<?php echo ($row->leave_type); ?>"><?php echo ($row->leave_type); ?></option>
                        <?php endwhile ?>
                      
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                      <label>Start Leave Date :</label>
                      <input name="date_from" type="date" class="form-control date-picker" required="true" autocomplete="off">
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                      <label>End Leave Date :</label>
                      <input name="date_to" type="date" class="form-control date-picker" required="true" autocomplete="off">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-8 col-sm-12">
                    <div class="form-group">
                      <label>Reason For Leave :</label>
                      <textarea id="textarea1" name="description" class="form-control" required length="150" maxlength="150" required="true" autocomplete="off"></textarea>
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                      <label style="font-size:16px;"><b></b></label>
                      <div class="modal-footer justify-content-center">
                        <button class="btn btn-primary" name="apply" id="apply" data-toggle="modal">Apply&nbsp;Leave</button>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
            </form>
          </div>
        </div>

      </div>
      <?php include("includes/scripts.php");?>
      <?php include('includes/footer.php'); ?>
    </div>
  </div>

