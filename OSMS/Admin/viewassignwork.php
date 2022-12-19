<?php
define('TITLE', 'Work Order');
define('PAGE', 'work');
include('includes/header.php');
include('../dbConnection.php');
session_start();
if(isset($_SESSION['is_adminlogin'])){
   $aEmail = $_SESSION['aEmail'];
} else {
   echo "<script> location.href='login.php'</script>";
}



if(isset($_REQUEST['updatework']))
{
 
   $prblm1 = $_REQUEST['problem1'];
   $prblm2 = $_REQUEST['problem2'];
   $prblm3 = $_REQUEST['problem3'];
   $prblm4 = $_REQUEST['problem4'];
   $problem5 = $_REQUEST['problem5'];
   $p1price= $_REQUEST['p1price'];
   $p2price = $_REQUEST['p2price'];
   $p3price = $_REQUEST['p3price'];
   $p4price = $_REQUEST['p4price'];
   $p5price = $_REQUEST['p5price'];
   $total = $_REQUEST['total'];
   $cus_sign = $_REQUEST['cus_sign'];
   $tech_sign = $_REQUEST['tech_sign'];
   
   $sql = "UPDATE assignwork_tb SET problem1= problem1, problem2= problem2, problem3= problem3, problem4= problem4, problem5= problem5, p1price= p1price , p2price= p2price, p3price= p3price, p4price= p4price, p5price= p5price, total= total, cus_sign= cus_sign, tech_sign= tech_sign WHERE request_id = {$_REQUEST['id']} ";
   if($conn->query($sql) == TRUE){
    $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Updated Successfully</div>';
   } else {
    $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to Update</div>';
   }
}

?>
<!-- Start 2nd COlumn -->
<div class="col-sm-6 mt-5 mx-3">
 <h3 class="text-center">Assigned Work Details</h3>
 <?php
  if(isset($_REQUEST['view'])){
   $sql = "SELECT * FROM assignwork_tb WHERE request_id = {$_REQUEST['id']}";
   $result = $conn->query($sql);
   $row = $result->fetch_assoc(); ?>
    <form action="" method="POST">  
      <table class="table table-bordered">
        <tbody>

        <tr>
          <td>Token ID</td>
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
          <td>Assigned Technician</td>
          <td><?php if(isset($row['assign_tech'])){echo $row['assign_tech'];} ?></td>
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
        <!-- <input type="submit" class="btn btn-success" id="update" name="updatework" value="Update"> -->
        
    </form>  



    <div class="text-center">
     <form action="" class="mb-3 d-print-none d-inline">
  
      <input class="btn btn-danger" type="submit" value="Print" onClick="window.print()"> </form>
      <form action="work.php" class="mb-3 d-print-none d-inline"><input class="btn btn-secondary" type="submit" value="Close">
     </form>
    </div>
 <?php }?>
</div>
<!-- End 2nd COlumn -->

<?php include('includes/footer.php')?>