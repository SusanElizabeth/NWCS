<?php
include('loginredirect.php');

include('nwcsdatabase.php');
$position=101;

$manager='SELECT * FROM EMPLOYEE WHERE EMPLOYEE.POSITION_ID=:POSITION';
$statement= $db->prepare($manager);
$statement->bindValue(':POSITION', $position);
$statement->execute();
$mgr=$statement->fetchAll();
$statement->closeCursor();




$query = "SELECT S.STORE_ID, STORE_PHONE, EMPLOYEE_FNAME, EMPLOYEE_LNAME, STORE_ADDRESS, STORE_CITY, STORE_STATE, STORE_ZIP
FROM STORE S, MANAGEMENT M, EMPLOYEE E
WHERE S.STORE_ID = M.STORE_ID
AND M.EMPLOYEE_ID = E.EMPLOYEE_ID
AND S.STORE_ID!=62
ORDER BY S.STORE_ID";

$statement = $db->prepare($query);
$statement->execute();
$stores = $statement->fetchAll();
$statement->closeCursor();

?>

<!DOCTYPE html>
<html lang="en">

 <head>
   <title>Stores</title>
<meta charset="utf-8">

<!--get bootstrap requirements-->
 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 <link href="css/bootstrap-form-helpers.min.css" rel="stylesheet" media="screen">

<script src="js/bootstrap-formhelpers.min.js"></script>
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
    <h1><span class="label label-primary">Stores Information</h1>
</div>
<div class="panel-group" style="text-align:center">
<div class="panel panel-default">
  <?php echo "<div class=\"panel-heading\" role=\"tab\" id=\"heading".$test."\">";?>
    <h4 class="panel-title" style="font-weight:bold; font-size: 150%"><span class="glyphicon glyphicon-envelope"></span>
        <?php echo 'These are the individual stores of NWCS: ';?>
    </h4>
</div>

<!--panel body-->

<div class="panel-body" style="background-color:#C8F8FF; border:2px solid #FFC656" >






  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 col-md-offset-0">
        <!--<h3><span class="label label-primary">In stock items at (store number)</h3>-->
      <!--<p>The .table-striped class adds zebra-stripes to a table:</p>-->
    <table class="table table-striped"style="text-align:left">

      <thead>
        <tr>
          <th>Store ID</th>
          <th>Store Phone</th>
          <th>Store Manager</th>
          <th>Store Address</th>
          <th>Store City</th>
          <th>Store State</th>
          <th>Store Zip Code</th>


        </tr>
      </thead>
      <tbody>
          <?php foreach ($stores as $s) : ?>
        <tr>
          <td><?php echo $s['STORE_ID']; ?></td>
          <td><?php echo $s['STORE_PHONE']; ?></td>
          <td><?php echo $s['EMPLOYEE_FNAME']." ".$s['EMPLOYEE_LNAME']; ?></td>
          <td><?php echo $s['STORE_ADDRESS']; ?></td>
          <td><?php echo $s['STORE_CITY']; ?></td>
          <td><?php echo $s['STORE_STATE']; ?></td>
          <td><?php echo $s['STORE_ZIP']; ?></td>


        </tr>
          <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
</div>

  </body>
  </html>




  </div>
  <p><strong><a href="contacts.php">Back to the Contacts Menu</a></strong></p>
  <p><strong><a href="menu.php">Back to the Main Menu</a></strong></p>
  <p><strong><a href="logout.php">Click here to logout</a></strong></p>


</div>
</div>
</div>
</div>
<br>
  <?php if ($_SESSION['admin']==true){?>
<div class="row">
<div class="col-md-4 col-md-offset-4">
<div class="panel-group" style="text-align:center">
<div class="panel panel-default">
  <?php echo "<div class=\"panel-heading\" role=\"tab\" id=\"heading\">";?>
    <h4 class="panel-title" style="font-weight:bold; font-size: 150%; ">
      <?php echo 'Or Add a New Store:';?>
    </h4>
  </div>
  <!--panel body-->
  <div class="panel-body" style="background-color:#C8F8FF; border:2px solid #FFC656" >

    <form method="post" name="newstore" action="stores.php" id="newstore">

      <input type="submit" name="newstore" class="btn btn-warning"  value="Add Form">
      <br><br>
      <?php $new=filter_input(INPUT_POST,'newstore');
      if (isset($new)){
        ?>
      </form>
        <form method="post" name="newstore" action="addstore.php" id="newstore" style="text-align:center">
          <div style="text-align:left">
            <!--
          <div class="form-group">
          <label for="storeID"><strong>Store ID: </strong></label>
        <input name="id" type="text" class="form-control" id="storeID" placeholder="Store ID" required>

          </div>
            -->
          <div class="form-group">
        <label for="storePhone"><strong>Store Phone: </strong></label>
        <input name="sphone" type="text" class="input-medium bfh-phone form-control" data-format="ddd-ddd-dddd" id="storePhone" placeholder="Store Phone Number" required>

          </div>
          <div class="form-group">
        <label for="storeAddress"><strong>Store Address: </strong></label>
        <input name="saddress" type="text" class="form-control" maxlength="20" id="storeAddress" placeholder="Store Address" required>

          </div>
          <div class="form-group">
        <label for="storeCity"><strong>Store City: </strong></label>
        <input name="scity" type="text" class="form-control" maxlength="15" id="storeCity" placeholder="Store City" required>

          </div>
          <div class="form-group">
        <label for="storeState"><strong>Store State: </strong></label>
        <select name="sstate" id="storeState" placeholder="Store State" class="form-control bfh-states" data-country="US" required>
        </select>
          </div>
          <div class="form-group">
        <label for="storeZip"><strong>Store Zip Code: </strong></label>
        <input name="szip" type="number" class="form-control" id="storeZip" placeholder="Store Zip Code" required>

          </div>

          <label>Manager:</label>
          <select name="storeManager" class="form-control">
            <?php foreach ($mgr as $m):?>

            <option value="<?php echo $m['EMPLOYEE_ID'];?>"><?php echo $m['EMPLOYEE_LNAME'].", ".$m['EMPLOYEE_FNAME'];?></option>
          <?php endforeach;  ?>
          </select>


          </div>

      <input type="submit" name="newstore" class="btn btn-warning" value="Click Here to Add New Store">
    </form>
    <?php  }}?>
  </div>
  <br><br>
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
