<!DOCTYPE html>
<html lang="en">
<head>


<meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <!-- Bootstrap CSS -->
 <link rel="stylesheet" href="./css/bootstrap.min.css">

 <!-- Font Awesome CSS -->
 <link rel="stylesheet" href="./css/all.min.css">

 <style>
  .custom-margin {
   margin-top: 8vh;
  }
 </style>
</head>
<body>
<?php 
include('./dbConnection.php');
?>

 <?php 
  if(isset($_REQUEST['checktokenid']) && ($_REQUEST['checktechid'])){
   if($_REQUEST['checktokenid'] == ""  || $_REQUEST['checktechid'] == "" ){
    $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
   } else {

    $varchecktk = $_REQUEST['checktokenid'];

   
    
    $varcheckem=$_REQUEST['checktechid'];
   
    $msg = '<div class="alert alert-warning mt-2">Invalid Token ID or Technician ID</div>';


    
session_start();
$_SESSION['tokenidtrans'] = $varchecktk;






    $sql34 = "SELECT * FROM assignwork_tb WHERE rq_token = '$varchecktk' AND assign_tech ='$varcheckem' ;" ;
    $result = $conn->query($sql34);

    if($result->num_rows == 1){
     $row = $result->fetch_assoc();

     $rName = $row['requester_name'];
     
     header("Location: http://localhost/osms/techdash.php");

    }


   }
   
}
?>

<div class="mb-3 mt-5 text-center" style="font-size: 30px;">
    <i class="fas fa-stethoscope"></i>
    <span>Online Service Management System</span>
  </div>
  <p class="text-center" style="font-size:20px;"><i class="fas fa-user-secret text-danger"></i>Requester Area</p>
  <div class="container-fluid">
    <div class="row justify-content-center custom-margin">
      <div class="col-sm-6 col-md-4">
        <form action="" class="shadow-lg p-4" method="POST">
          <div class="form-group">
            <i class="fas fa-user"></i><label for="checktokenid" class="font-weight-bold pl-2">Enter Assign Token ID</label>
            <input type="text" class="form-control" placeholder="Enter Token ID" name="checktokenid" id="checktokenid" onkeypress="isInputNumber(event)"> 
            
          </div>
          <div class="form-group">

            <i class="fas fa-user"></i><label for="checktechid" class="font-weight-bold pl-2">Enter Technician ID</label>
            <input type="text" class="form-control" placeholder="Enter Technician ID" name="checktechid" id="checktechid" >
            <?php if(isset($msg)) {echo $msg;} ?>
          </div>
          <button type="submit" class="btn btn-outline-danger mt-3 font-weight-bold btn-block shadow-sm">Search</button>
        </form>
        <div class="text-center"><a href="./index.php" class="btn btn-info mt-3 font-weight-bold shadow-sm">Back to Home</a></div>
      </div>
    </div>
 </div>



<?php include('./Admin/includes/footer.php')?>

 <!-- JavaScript Files -->
 <script src="./js/jquery.min.js"></script>
 <script src="./js/popper.min.js"></script>
 <script src="./js/bootstrap.min.js"></script>
 <script src="./js/all.min.js"></script>

 <!-- Only Number for input fields -->
<script>
  function isInputNumber(evt) {
    var ch = String.fromCharCode(evt.which);
    if (!(/[0-9]/.test(ch))) {
      evt.preventDefault();
    }
  }
</script>


</body>
</html>