
<?php
include('loginredirect.php');

include('nwcsdatabase.php');

$STORE='SELECT * FROM STORE';
$statement= $db->prepare($STORE);
$statement->execute();
$STORES = $statement->fetchAll();
$statement->closeCursor();

$date = new DateTime('2000-01-01');
$sDate=$date->format('Y-m-d H:i:s');

?>

<!DOCTYPE html>
<html lang="en">

 <head>
   <title>Register Count Reports</title>
<meta charset="utf-8">

<!--get bootstrap requirements-->
<script src="js/moment.js"></script>
 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 <script src="js/bootstrap-datetimepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/bootstrap-datetimepicker.min.css">
<!--<script src="js/moment-with-locales.js"></script>-->

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
    <h1><span class="label label-primary">Register Count Reporting</h1>
</div>
<div class="panel-group" style="text-align:center">
<div class="panel panel-default">
  <?php echo "<div class=\"panel-heading\" role=\"tab\" id=\"heading".$test."\">";?>
    <h4 class="panel-title" style="font-weight:bold; font-size: 150%"><span class="glyphicon glyphicon-list-alt"></span>
      <?php echo 'Please enter the following information:';?>
    </h4>
</div>

<!--panel body-->

<div class="panel-body" style="background-color:#C8F8FF; border:2px solid #FFC656" >

  <form method="post" action="regcountreportquery.php" id="inventory" style="text-align:center">
    <div style="text-align:left">


    <label>Store ID:</label>
    <select name="storeID" class="form-control">
      <?php foreach ($STORES as $s):?>
      <option value="<?php echo $s['STORE_ID'];?>"><?php echo $s['STORE_ID']." - ".$s['STORE_ADDRESS'];?></option>
    <?php endforeach;  ?>
    </select>



  <label for="bDate"><strong>Beginning Date: </strong></label>
            <div class="form-group">
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' name="bDate" class="form-control" required/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>

        <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker();
            });
        </script>

        <label for="eDate"><strong>Ending Date: </strong></label>
                  <div class="form-group">
                      <div class='input-group date' id='datetimepicker2'>
                          <input type='text' name="eDate" class="form-control" required/>
                          <span class="input-group-addon">
                              <span class="glyphicon glyphicon-calendar"></span>
                          </span>
                      </div>
                  </div>

              <script type="text/javascript">
                  $(function () {
                      $('#datetimepicker2').datetimepicker();
                  });
              </script>

</div>
      <label>&nbsp;</label>
      <input type="submit"class="btn btn-warning" value="Submit">
    </form>

  </div>
  <p><strong><a href="reporting.php">Back to the Reporting Menu</a></strong></p>
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
