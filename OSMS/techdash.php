
<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <!-- Bootstrap CSS -->
 <link rel="stylesheet" href="css/bootstrap.min.css">

 <!-- Font Awesome CSS -->
 <link rel="stylesheet" href="css/all.min.css">

 <!-- Google Font -->
 <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">

 <!-- Custom CSS -->
 <link rel="stylesheet" href="css/custom.css">
<?php 
 define('TITLE', 'Technician');
 define('PAGE', 'techdash');
 include('header.php');

?>
</head>
<body>
<?php   

include('./dbConnection.php');

session_start();
 
 
 if(isset($_REQUEST['empsubmit'])){
  if(($_REQUEST['problem1'] == "") ){
   $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
  } else {
   $prb1var = $_REQUEST['problem1'];
   $prb2var = $_REQUEST['problem2'];
   $prb3var = $_REQUEST['problem3'];
   $prb4var = $_REQUEST['problem4'];

   $cst1var = $_REQUEST['cst1'];
   $cst2var = $_REQUEST['cst2'];
   $cst3var = $_REQUEST['cst3'];
   $cst4var = $_REQUEST['cst4'];
  $visitprice= $_REQUEST['vscharge'];
  

   $jointime = time();



   $totalprice = $cst1var + $cst2var + $cst3var + $cst4var + 100;

   $sql = "UPDATE  assignwork_tb  SET  problem1 = '$prb1var', problem2 = '$prb2var', problem3 = '$prb3var', problem4 = '$prb4var', price1= '$cst1var', price2= '$cst2var', price3= '$cst3var', price4= '$cst4var', price_total= '$totalprice', price_visit= '$visitprice'  WHERE rq_token= '{$_SESSION['tokenidtrans']}' ";
    if($conn->query($sql) == TRUE){
     $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Added Successfully </div>';
    } else {
     $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Add </div>';
    }
  }
  }
 ?>
 
<!-- Start 2nd Column -->


<div class="col-sm-6 mt-5  mx-3 jumbotron">
  <h3 class="text-center">Client Management Portal</h3>
  <form action="" method="POST">
  <div class="form-group">
      <label   for="problem1">Problems</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <label   for="problem1">Cost</label>
    </div>  
  <div  class="form-group">
      <input  type="text"  id="problem1" name="problem1"> 
      <input type="text"  id="cst1" name="cst1" value="0">

    </div>
    <div class="form-group">
      <input type="text"   id="problem2" name="problem2">
      <input type="text"     id="cst2" name="cst2" value="0">

    </div>
    <div class="form-group">
      <input type="text"   id="problem3" name="problem3" >
      <input type="text"     id="cst3" name="cst3" value="0">

    </div>
    <div class="form-group">
      <input type="text"   id="problem4" name="problem4">
      <input type="text"     id="cst4" name="cst4" value="0">
    </div>


    <div class="form-group">
    <label for="visitcharge">Visiting Charge (FIX)</label>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text"     id="vscharge" name="vscharge"  value="100" readonly>
    </div>




    <div class="text-center">
      <button type="submit" class="btn btn-danger" id="empsubmit" name="empsubmit">Submit</button>
      <a href="techy.php" class="btn btn-secondary">Close</a>
    </div>



    
    <?php if(isset($msg)) {echo $msg; } ?>
  </form>
  <div class="text-center"><a href="./index.php" class="btn btn-info mt-3 font-weight-bold shadow-sm">Back to Home</a></div>
</div>


 </body>
 </html>

<!-- Only Number for input fields -->
<script>
  function isInputNumber(evt) {
    var ch = String.fromCharCode(evt.which);
    if (!(/[0-9]/.test(ch))) {
      evt.preventDefault();
    }
  }
</script>
