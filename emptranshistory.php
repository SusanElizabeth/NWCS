<?php
session_start();
$user=$_SESSION['start'];
require_once('nwcsdatabase.php');
$var=filter_input(INPUT_GET, 'emp');



$query='SELECT DISTINCT TRANSACTIONS.TRANSACTION_ID, TRANSACTIONS.TRANSACTION_TOTAL, TRANSACTIONS.STORE_ID, PAYMENT.PAYMENT_TYPE, TRANSACTIONS.TRANSACTION_DATE
FROM TRANSACTIONS, PAYMENT
WHERE TRANSACTIONS.EMPLOYEE_ID=:user AND PAYMENT.TRANSACTION_ID=TRANSACTIONS.TRANSACTION_ID';
$statement = $db->prepare($query);
$statement->bindValue(':user',$var);
$statement->execute();
$trans = $statement->fetchAll();
$statement->closeCursor();


$query2='SELECT EMPLOYEE_LNAME, EMPLOYEE_FNAME
FROM EMPLOYEE
WHERE EMPLOYEE_ID=:user';
$statement1 = $db->prepare($query2);
$statement1->bindValue(':user',$var);
$statement1->execute();
$EMP = $statement1->fetch();
$statement1->closeCursor();

?>
<!DOCTYPE html>
<html lang="en">

 <head>
   <title>Transaction Details</title>
<meta charset="utf-8">

<!--get bootstrap requirements-->
 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 <meta name="viewport" content="width=device-width, initial-scale=1">
<!--background-->
<style>
 body{
   background-color: #4C99B6;
 }
</style>
</head>


<body>
  <div class="container">
     <div class="row">
       <div class="col-md-10 col-md-offset-1">
<?php $test=""?>
<div class="page-header" style="text-align: center">
    <h1 style="padding-right:15px"><strong><span class= "label label-warning">North Willow Convenience Stores</span></strong></h1>
      <br>
    <h1><span class="label label-primary">Transaction Details</h1>
</div>
<div class="panel-group" style="text-align:center">
<div class="panel panel-default">
  <?php echo "<div class=\"panel-heading\" role=\"tab\" id=\"heading".$test."\">";?>
    <h4 class="panel-title" style="font-weight:bold; font-size: 150%"><span class="glyphicon glyphicon-leaf"></span>

        <?php echo 'Transaction Details for Employee: <span style="color:ORANGE">'.$EMP['EMPLOYEE_LNAME'].", ".$EMP['EMPLOYEE_FNAME'].'</span>';?>
    </h4>
</div>

<!--panel body-->

<div class="panel-body" style="background-color:#C8F8FF; border:2px solid #FFC656" >






  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 col-md-offset-0">
        <!--<h3><span class="label label-primary">In stock items at (store number)</h3>-->
      <!--<p>The .table-striped class adds zebra-stripes to a table:</p>-->
      <?php if (empty($trans)) { ?>
        <div class="alert alert-warning" role="alert">
            <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
            <span class=""><h3>  This employee has not completed any transactions </h3></span><br><br>
          <?php }
        else {?>
        <div class="table-responsive">
    <table class="table table-striped"style="text-align:left">

      <thead>
        <tr>
          <th>Transaction ID</th>

          <th>Transaction Total</th>
          <th>Store ID</th>
          <th>Transaction Type</th>
          <th>Transaction Date</th>
        </tr>
      </thead>
      <tbody>
	  <?php foreach ($trans as $t) { ?>
        <tr>
          <td><?php echo $t['TRANSACTION_ID'] ?></a></td>

          <td><?php echo "$ ".$t['TRANSACTION_TOTAL'] ?></td>
          <td><?php echo $t['STORE_ID'] ?></td>
          <td><?php echo $t['PAYMENT_TYPE'] ?></td>
          <td><?php echo $t['TRANSACTION_DATE'] ?></td>
        </tr>
	  <?php } ?>
      </tbody>
    </table>
    <?php }?>
  </div>
  </div>
</div>
</div>

  </body>
  </html>




  </div>
  <p><strong><a href="empprofile.php">Back to the Employee Profile</a></strong></p>
  <p><strong><a href="menu.php">Back to the Main Menu</a></strong></p>
  <p><strong><a href="logout.php">Click here to logout</a></strong></p>


  </div>
</div>

  </div>
</div>
</div>
<div style="text-align:center">
<h4><span class="label label-info" style="padding:10px;">
<?php echo "Date: ".date("Y-m-d ")." Time: ".date("h:i:sa "); ?>
</span></h4>

</div>
</body>
</html>
