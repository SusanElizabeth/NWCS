<?php
include('loginredirect.php');

include('nwcsdatabase.php');


$acctID='SELECT ACCOUNT_ID, CUSTOMER_LNAME, CUSTOMER_FNAME FROM CHARGE_ACCOUNT, CUSTOMER WHERE CHARGE_ACCOUNT.CUSTOMER_ID=CUSTOMER.CUSTOMER_ID ORDER BY ACCOUNT_ID';
$statement7= $db->prepare($acctID);
//$statement->bindValue(':POSITION', $position);
$statement7->execute();
$acct=$statement7->fetchAll();
$statement7->closeCursor();



 ?>
<!DOCTYPE html>
<html lang="en">

 <head>
   <title>Review Charge Accounts</title>
<meta charset="utf-8">

<!--get bootstrap requirements-->
 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

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
       <div class="col-md-6 col-md-offset-3">
<?php $test=""?>
<div class="page-header" style="text-align: center">
    <h1 style="padding-right:15px"><strong><span class= "label label-warning">North Willow Convenience Stores</span></strong></h1>
      <br>
    <h1><span class="label label-primary">Review Current Charge Accounts</h1>
</div>
<div class="panel-group" style="text-align:center">
<div class="panel panel-default">
  <?php echo "<div class=\"panel-heading\" role=\"tab\" id=\"heading".$test."\">";?>
    <h4 class="panel-title" style="font-weight:bold; font-size: 150%"> <span class="glyphicon glyphicon-user"></span>
      <?php echo '   Please choose a charge account customer:';?>
    </h4>
</div>

<!--panel body-->

<div class="panel-body" style="background-color:#C8F8FF; border:2px solid #FFC656" >

  <form method="post" action="reviewchargequery.php" id="reviewcharge" style="text-align:center">
    <div style="text-align:left">

    <div class="form-group">
    <label for="chargeID"><strong>Search For a Charge Account: </strong></label>
    <select name="account" class="form-control">
      <?php foreach ($acct as $a):?>
      <option value="<?php echo $a['ACCOUNT_ID'];?>"><?php echo $a['ACCOUNT_ID']." - ". $a['CUSTOMER_LNAME'].", ". $a['CUSTOMER_FNAME'];?></option>
    <?php endforeach;  ?>
    </select></div>
</div>

      <label>&nbsp;</label>
      <input type="submit" class="btn btn-warning"  name="one" value="Review Account">  <input type="submit" class="btn btn-warning"  name="edit" value="Edit Account">
    </form>

  </div>
  <p><strong><a href="charge.php">Back to the Charge Accounts Menu</a></strong></p>
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
