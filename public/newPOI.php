<?php

require_once 'connect.php';
// $link = mysqli_connect("localhost", "cs4400_74", "e_zTUL5w", "cs4400_74");
// // $link = mysqli_connect("localhost", "root", "", "cs4400_74");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = 'select DISTINCT CITY from CITYSTATE';
$city = array();
if($result = mysqli_query($link, $sql)) {
  while ($row = mysqli_fetch_array($result)) 
  {
    // $citys = $row['City'];
    array_push($city, $row['CITY']);
    // $states = $row['State'];
  }
}

$sql2 = 'select DISTINCT STATE from CITYSTATE';
$state = array();
if($result = mysqli_query($link, $sql2)) {
  while ($row = mysqli_fetch_array($result)) 
  {
    // $citys = $row['City'];
    array_push($state, $row['STATE']);
    // $states = $row['State'];
  }
}


mysqli_close($link);
// print_r($citys);
// print_r($states);

?>

<!DOCTYPE html>
<html>
   <head>
      <title>New Location</title>
      <link href="../assets/css/main.css" rel="stylesheet">
      <link href="../assets/css/bootstrap-theme.min.css" rel="stylesheet">
      <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
   </head>
   <body>
      <div class="container">
         <div class="row">
            <div class="col-md-6 col-md-offset-3">
               <div class="panel-body">
                  <div class="row">
                     <div class="col-lg-12">
                        <h1 class="center-text">Add a New Location </h1>
                        <form id="login-form" action="createNewLocation.php" method="post" role="form" style="display: block;">
                           <div class="form-group">
                              <input type="text" name="locationName" id="locationName" tabindex="1" class="form-control" placeholder="POI Location Name" value="">
                           </div>
                           <label>City</label>
                           <select name="city" class="form-control">
                              <?php foreach($city as $c) {
                              echo '<option>' . $c . '</option>';
                              } ?>
                           </select>
                           <label>State</label>
                           <select name="state" class="form-control">
                              <?php foreach($state as $c) {
                              echo '<option>' . $c . '</option>';
                              } ?>
                           </select>
                           <div class="form-group">
                              <br>
                              <input type="text" name="zipCode" id="zipCode" tabindex="1" class="form-control" placeholder="ZipCode" value="">
                           </div>
                           <div class="form-group">
                              <div class="row">
                                 <div class="col-sm-6 col-sm-offset-3">
                                    <a class="form-control btn btn-primary" href="newDataPoint.php">Back</a>
                                    <br>
                                    <br>
                                    <input type="submit" name="submit" id="submit" tabindex="4" class="form-control btn btn-primary" value="Submit">
                                 </div>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <script type="text/javascript" src="../assets/js/jquery-3.2.1.min.js" ></script>
      <script type="text/javascript" src="../assets/js/bootstrap.min.js" ></script>
      <script type="text/javascript" src="../assets/js/main.js" ></script>
   </body>
</html>