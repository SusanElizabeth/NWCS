<!DOCTYPE html>
<html lang="en">

 <head>
   <title>Query Inventory</title>
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
    <h1><span class="label label-primary">Inventory</h1>
</div>
<div class="panel-group" style="text-align:center">
<div class="panel panel-default">
  <?php echo "<div class=\"panel-heading\" role=\"tab\" id=\"heading".$test."\">";?>
    <h4 class="panel-title" style="font-weight:bold; font-size: 150%">
      <?php echo 'Please enter the following information:';?>
    </h4>
</div>

<!--panel body-->

<div class="panel-body" style="background-color:#C8F8FF; border:2px solid #FFC656" >

  <form method="post" action="queryinvresult.php" id="inventory" style="text-align:center">
      <div style="text-align:left">
    <label>Choose a Category:</label>
    <select name="catID" class="form-control">
      <!--drop down menu-->
      <option value="<?php echo "Category1";?>"><?php echo "Category1";?></option>
      <option value="<?php echo "Category2";?>"><?php echo "Category2";?></option>
      <option value="<?php echo "Category3";?>"><?php echo "Category3";?></option>
      <option value="<?php echo "Category4";?>"><?php echo "Category4";?></option>
      <option value="<?php echo "Category5";?>"><?php echo "Category5";?></option>
    </select>
      <br><br>

      <div class="form-group">
      <label for="prodID"><strong>Product ID: </strong></label>
    <input name="prodID" type="text" class="form-control" id="prodID" placeholder="Product Identification Number">
      </div>
      <div style="text-align:left">
      <div class="form-group">
      <label for="storeID"><strong>Store ID: </strong></label>
    <input name="id" type="text" class="form-control" id="storeID" placeholder="Store Identification Number">
      </div>
      </div>
      </div>
      <br><br>

      <label>&nbsp;</label>
      <input type="submit" class="btn btn-warning" value="Submit">
    </form>
</div>

  <p><strong><a href="inventory.php">Back to the Inventory Menu</a></strong></p>
  <p><strong><a href="menu.php">Back to the Main Menu</a></strong></p>
  <p><strong><a href="logout.php">Click here to logout</a></strong></p>


  </div>
</div>
<?php
echo "The date is ".date("Y-m-d ")."and the time is ".date("h:i:sa "); ?>

  </div>
</div>
</div>

</body>
</html>
