<?php 
define('TITLE', 'Status');
define('PAGE', 'CheckStatus');
include('includes/header.php');
include('../dbConnection.php');
session_start();
if($_SESSION['is_login']){
 $rEmail = $_SESSION['rEmail'];
} else {
 echo "<script> location.href='RequesterLogin.php'; </script>";
}
?>







<!-- Start 2nd Column  -->
<div class="col-sm-6 mt-5 mx-3">
 <form action="" method="post" class="form-inline">
  <div class="form-group mr-3">
   <label for="checkid">Enter Request ID:&nbsp; </label>

   <input type="text" class="form-control" name="checkid" id="checkid" onkeypress="isInputNumber(event)">
  </div>
  <button type="submit" class="btn btn-danger">Search</button>
 </form>
 <?php 
  if(isset($_REQUEST['checkid'])){
   if($_REQUEST['checkid'] == ""){
    $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
   } else {


    $sql34 = "SELECT r_name, r_email FROM requesterlogin_tb WHERE r_email = '$rEmail'";
    $result = $conn->query($sql34);
    if($result->num_rows == 1){
     $row = $result->fetch_assoc();
     $rName = $row['r_name'];
    }



    $sql = "SELECT * FROM assignwork_tb WHERE request_id = {$_REQUEST['checkid']} AND requester_name = '$rName' ";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if((isset($row['request_id']) == isset($_REQUEST['checkid']))){ ?>
    <h3 class="text-center mt-5">Assigned Work Details</h3>
    <table class="table table-bordered">
     <tbody>

     <tr>
       <td>Token ID </td>
       <td><?php if(isset($row['rq_token'])){echo $row['rq_token'];} ?></td>
      </tr>

      <tr>
       <td>Request ID</td>
       <td><?php if(isset($row['request_id'])){echo $row['request_id'];} ?></td>
      </tr>
      <tr>
       <td>Request Info</td>
       <td><?php if(isset($row['request_info'])){echo $row['request_info'];} ?></td>
      </tr>
      <tr>
       <td>Request Description</td>
       <td><?php if(isset($row['request_desc'])){echo $row['request_desc'];} ?></td>
      </tr>
      <tr>
       <td>Name</td>
       <td>
         <?php if(isset($row['requester_name'])) {echo $row['requester_name']; } ?>
       </td>
      </tr>
      <tr>
       <td>Address Line 1</td>
       <td>
         <?php if(isset($row['requester_add1'])) {echo $row['requester_add1']; } ?>
       </td>
      </tr>
      <tr>
       <td>Address Line 2</td>
       <td>
         <?php if(isset($row['requester_add2'])) {echo $row['requester_add2']; } ?>
       </td>
      </tr>
      <tr>
       <td>City</td>
       <td>
         <?php if(isset($row['requester_city'])) {echo $row['requester_city']; } ?>
       </td>
      </tr>
      <tr>
       <td>State</td>
       <td>
         <?php if(isset($row['requester_state'])) {echo $row['requester_state']; } ?>
       </td>
      </tr>
      <tr>
       <td>Pin Code</td>
       <td>
         <?php if(isset($row['requester_zip'])) {echo $row['requester_zip']; } ?>
       </td>
      </tr>
      <tr>
       <td>Email</td>
       <td>
         <?php if(isset($row['requester_email'])) {echo $row['requester_email']; } ?>
       </td>
      </tr>
      <tr>
       <td>Mobile</td>
       <td>
         <?php if(isset($row['requester_mobile'])) {echo $row['requester_mobile']; } ?>
       </td>
      </tr>

      <tr>
       <td>Date on service required</td>
       <td>
         <?php if(isset($row['request_date'])) {echo $row['request_date']; } ?>
       </td>
      </tr>





      <tr>
       <td>Assigned Date</td>
       <td>
         <?php if(isset($row['assign_date'])) {echo $row['assign_date']; } ?>
       </td>
      </tr>
      
      <tr>
       <td>Problems and Costs</td>
       <td>
         <?php if(isset($row['problem1'])) {echo $row['problem1']; } ?> -  <?php if(isset($row['price1'])) {echo $row['price1']; } ?> <br>
         <?php if(isset($row['problem2'])) {echo $row['problem2']; } ?> -  <?php if(isset($row['price2'])) {echo $row['price2']; } ?>  <br>
         <?php if(isset($row['problem3'])) {echo $row['problem3']; } ?> -  <?php if(isset($row['price3'])) {echo $row['price3']; } ?>   <br>
         <?php if(isset($row['problem4'])) {echo $row['problem4']; } ?>-  <?php if(isset($row['price4'])) {echo $row['price4']; } ?>  <br>

         Visiting Charge      -  <?php if(isset($row['price_visit'])) {echo $row['price_visit']; } ?>    <br>
         -----------------------------------------------------------------<br>
         Total Costs          -  <?php if(isset($row['price_total'])) {echo $row['price_total']; } ?>

        </td>
      </tr>
      





     </tbody>
    </table>
    <div class="text-center">
     <form action="" class="mb-3 d-print-none">
      <input class="btn btn-danger" type="submit" value="Print" onClick="window.print()">
      <input class="btn btn-secondary" type="submit" value="Close">
     </form>
    </div>
    <?php } elseif(isset($row['request_id']) == isset($_REQUEST['checkid'])) {
       
     echo '<div class="alert alert-info mt-4">Your Request is Still Pending </div>';
    }
            else{
              echo '<div class="alert alert-info mt-4">Invalid Request Id, please enter valid Request ID...</div>';
            }

   }
 }?>
 <?php if(isset($msg)){echo $msg;} ?>
</div> <!-- End 2nd Column  -->
<!-- Only Number for input fields -->
<script>
  function isInputNumber(evt) {
    var ch = String.fromCharCode(evt.which);
    if (!(/[0-9]/.test(ch))) {
      evt.preventDefault();
    }
  }
</script>
<?php 
include('includes/footer.php');
?>