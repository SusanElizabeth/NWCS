
<?php
include('loginredirect.php');
adminrights();
require_once('nwcsdatabase.php');
$name = filter_input(INPUT_POST, 'name');
$phone = filter_input(INPUT_POST, 'vphone');
$address = filter_input(INPUT_POST, 'vaddress');
$city = filter_input(INPUT_POST, 'vcity');
$state = filter_input(INPUT_POST, 'vstate');
$zip = filter_input(INPUT_POST, 'vzip');

$query = 'INSERT INTO VENDOR
(VENDOR_NAME, VENDOR_POC_PHONE, VENDOR_ADDRESS, VENDOR_CITY, VENDOR_STATE, VENDOR_ZIP)
VALUES (:name, :phone, :address, :city, :state, :zip)';

$statement = $db->prepare($query);

$statement->bindValue(':name', $name);
$statement->bindValue(':phone', $phone);
$statement->bindValue(':address', $address);
$statement->bindValue(':city', $city);
$statement->bindValue(':state', $state);
$statement->bindValue(':zip', $zip);
$statement->execute();
$statement->closeCursor();

$id = 'SELECT VENDOR_ID FROM VENDOR WHERE VENDOR_ID=LAST_INSERT_ID()';
$statement2= $db->prepare($id);
$statement2->execute();
$newID= $statement2->fetchColumn();
$statement2->closeCursor();



?>
<!DOCTYPE html>
<html lang="en">

 <head>
   <title>Vendor Added</title>
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
  <div class="container-fluid">
     <div class="row">
       <div class="col-md-10 col-md-offset-1">
<?php $test=""?>
<div class="page-header" style="text-align: center">
    <h1 style="padding-right:15px"><strong><span class= "label label-warning">North Willow Convenience Stores</span></strong></h1>
      <br>
    <h1><span class="label label-primary">Vendor Added</h1>
</div>
<div class="panel-group" style="text-align:center">
<div class="panel panel-default">
  <?php echo "<div class=\"panel-heading\" role=\"tab\" id=\"heading".$test."\">";?>
    <h4 class="panel-title" style="font-weight:bold; font-size: 150%">
        <?php echo 'This vendor has successfully been added to the NWCS database: ';?>
    </h4>
</div>

<!--panel body-->

<div class="panel-body" style="background-color:#C8F8FF; border:2px solid #FFC656" >






  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 col-md-offset-0">
        <!--<h3><span class="label label-primary">In stock items at (store number)</h3>-->
      <!--<p>The .table-striped class adds zebra-stripes to a table:</p>-->
      <div class="table-responsive">

    <table class="table table-striped"style="text-align:left">

      <thead>
        <tr>
          <th>Vendor ID</th>
          <th>Vendor Name</th>
          <th>Vendor Phone</th>
          <th>Vendor Address</th>
          <th>Vendor City</th>
          <th>Vendor State</th>
          <th>Vendor ZIP</th>




        </tr>
      </thead>
      <tbody>
        <tr>
          <td><?php echo $newID; ?></td>
          <td><?php echo $name; ?></td>
          <td><?php echo $phone; ?></td>
          <td><?php echo $address; ?></td>
          <td><?php echo $city; ?></td>
          <td><?php echo $state; ?></td>
          <td><?php echo $zip; ?></td>
        </tr>


      </tbody>
    </table>
  </div>

    <br><br>

  </div>
</div>
</div>

  </body>
  </html>




  </div>
  <p><strong><a href="vendors.php">Back to Vendor Contacts</a></strong></p>
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
