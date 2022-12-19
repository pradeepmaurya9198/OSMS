<?php 
if(session_id() == ''){
 session_start();
}
if(isset($_SESSION['is_adminlogin'])){
   $aEmail = $_SESSION['aEmail'];
} else {
   echo "<script> location.href='login.php'</script>";
}

 
 if(isset($_REQUEST['view'])){
  $sql = "SELECT * FROM submitrequest_tb WHERE request_id = {$_REQUEST['id']}";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
 }
 
 if(isset($_REQUEST['assign'])){
  if(($_REQUEST['rq_token'] == "") || ($_REQUEST['request_id'] == "") || ($_REQUEST['request_info'] == "") || ($_REQUEST['requestdesc'] == "") || ($_REQUEST['requestername'] == "") || ($_REQUEST['address1'] == "") || ($_REQUEST['address2'] == "") || ($_REQUEST['requestercity'] == "") || ($_REQUEST['requesterstate'] == "") || ($_REQUEST['requesterzip'] == "") || ($_REQUEST['requesteremail'] == "") || ($_REQUEST['requestermobile'] == "") || ($_REQUEST['assigntech'] == "") || ($_REQUEST['inputdate'] == "")){
   $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fileds</div>';
  } 
  
  
  
  else {

   $rid = $_REQUEST['request_id'];
   $rinfo = $_REQUEST['request_info'];
   $rdesc = $_REQUEST['requestdesc'];
   $rname = $_REQUEST['requestername'];
   $radd1 = $_REQUEST['address1'];
   $radd2 = $_REQUEST['address2'];
   $rcity = $_REQUEST['requestercity'];
   $rstate = $_REQUEST['requesterstate'];
   $rzip = $_REQUEST['requesterzip'];
   $remail = $_REQUEST['requesteremail'];
   $rmobile = $_REQUEST['requestermobile'];
   $rqdate = $_REQUEST['request_date'];
   $rassigntech = $_REQUEST['assigntech'];
   $rdate = $_REQUEST['inputdate'];
   $rq_tokenvar= $_REQUEST['rq_token'];
   $sst =  $_REQUEST['rq_stflg'];

   $sql = "INSERT INTO assignwork_tb (request_id, request_info, request_desc, requester_name, requester_add1, requester_add2, requester_city, requester_state, requester_zip, requester_email, requester_mobile, request_date, assign_tech, assign_date, rq_token) VALUES ('$rid', '$rinfo','$rdesc', '$rname', '$radd1', '$radd2', '$rcity', '$rstate', '$rzip', '$remail', '$rmobile','$rqdate', '$rassigntech', '$rdate', '$rq_tokenvar')";
   
   $sql2 = "UPDATE submitrequest_tb SET rq_stflg = '1' where request_id = '$rid';";
  




   if($conn->query($sql) == TRUE) 
   {
       $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Work Assigned Successfully</div>';
   }

  else
   {
    $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to Assign Work</div>';

   }



   if($conn->query($sql2) == TRUE) 
   {
    header("Location: http://localhost/osms/Admin/request.php");
   }

  else
   {
   }


  }
 }

 ?>





<div class="col-sm-5 mt-5 jumbotron"> <!-- Start Assigned Work 3rd Column-->
 <form action="" method="POST">

   <h5 class="text-center">Assign Work Order Request</h5>

   <div class="form-group">

     <label for="rq_token">Token ID</label>
     <input type="text" class="form-control" id="rq_token" name="rq_token" value="<?php if(isset($row['rq_token']))echo $row['rq_token']; ?>" readonly>
   </div>

   <div class="form-group">
     <label for="request_id">Request ID</label>
     <input type="text" class="form-control" id="request_id" name="request_id" value="<?php if(isset($row['request_id']))echo $row['request_id']; ?>" readonly>
   </div>
   <div class="form-group">
     <label for="request_info">Request Info</label>
     <input type="text" class="form-control" id="request_info" name="request_info" value="<?php if(isset($row['request_info']))echo $row['request_info']; ?>">
   </div>
   <div class="form-group">
     <label for="requestdesc">Description</label>
     <input type="text" class="form-control" id="requestdesc" name="requestdesc" value="<?php if(isset($row['request_desc']))echo $row['request_desc']; ?>">
   </div>
   <div class="form-group">
     <label for="requestername">Name</label>
     <input type="text" class="form-control" id="requestername" name="requestername" value="<?php if(isset($row['requester_name']))echo $row['requester_name']; ?>">
   </div>
   <div class="form-row">
    <div class="form-group col-md-6">
      <label for="address1">Address Line 1</label>
      <input type="text" class="form-control" id="address1" name="address1" value="<?php if(isset($row['requester_add1'])) { echo $row['requester_add1']; } ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="address2">Address Line 2</label>
      <input type="text" class="form-control" id="address2" name="address2" value="<?php if(isset($row['requester_add2'])) {echo $row['requester_add2']; }?>">
    </div>
   </div>
   <div class="form-row">
    <div class="form-group col-md-4">
      <label for="requestercity">City</label>
      <input type="text" class="form-control" id="requestercity" name="requestercity" value="<?php if(isset($row['requester_city'])) {echo $row['requester_city']; }?>">
    </div>
    <div class="form-group col-md-4">
      <label for="requesterstate">State</label>
      <input type="text" class="form-control" id="requesterstate" name="requesterstate" value="<?php if(isset($row['requester_state'])) { echo $row['requester_state']; } ?>">
    </div>
    <div class="form-group col-md-4">
      <label for="requesterzip">Zip</label>
      <input type="text" class="form-control" id="requesterzip" name="requesterzip" value="<?php if(isset($row['requester_zip'])) { echo $row['requester_zip']; } ?>" onkeypress="isInputNumber(event)">
    </div>
   </div>
   <div class="form-row">
    <div class="form-group col-md-8">
      <label for="requesteremail">Email</label>
      <input type="email" class="form-control" id="requesteremail" name="requesteremail" value="<?php if(isset($row['requester_email'])) {echo $row['requester_email']; }?>">
    </div>
    <div class="form-group col-md-4">
      <label for="requestermobile">Mobile</label>
      <input type="text" class="form-control" id="requestermobile" name="requestermobile" value="<?php if(isset($row['requester_mobile'])) {echo $row['requester_mobile']; }?>" onkeypress="isInputNumber(event)">
    </div>
  </div>
   <div class="form-row"> 
    <div class="form-group col-md-4">
      <label for="request_date">Date on service required</label>
      <input type="date" class="form-control" id="request_date" name="request_date" value="<?php if(isset($row['request_date'])) {echo $row['request_date']; }?>" onkeypress="isInputNumber(event)">
    </div>
  
 
    <div class="form-group col-md-4">
      <label for="assigntech">Assign to Technician</label>
      <select class="form-control" id="assigntech" name="assigntech">
      
      <?php
      if(isset($_REQUEST['view'])){
        $sql = "SELECT * FROM technician_tb";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
       }
      ?>
      <option>Select</option>
        <?php foreach ($result as $row) : ?>
        <option>
          <?php if(isset($row['empcode'])) {echo $row['empcode']; }?>
        </option>

        <?php endforeach ?>
      </select>
      
     <!-- <input type="text" class="form-control" id="assigntech" name="assigntech"> -->
    </div>
  
    <div class="form-group col-md-4">
      <label for="inputDate">Date</label>
      <input type="date" class="form-control" id="inputDate" name="inputdate">
    </div>
    </div>
   
   <div class="float-right">
    <button type="submit" class="btn btn-success" name="assign">Assign</button>
    <button type="submit" class="btn btn-secondary">Reset</button>
   </div>
 </form>
 <?php if(isset($msg)){echo $msg; } ?>
</div> <!-- End Assigned Work 3rd Column-->
<script>
  function isInputNumber(evt) {
    var ch = String.fromCharCode(evt.which);
    if (!(/[0-9]/.test(ch))) {
      evt.preventDefault();
    }
  }
</script>