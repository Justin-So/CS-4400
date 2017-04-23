<?php
   require_once 'connect.php';
   // $link = mysqli_connect("localhost", "cs4400_74", "e_zTUL5w", "cs4400_74");
   // // $link = mysqli_connect("localhost", "root", "", "cs4400_74");
    
   // Check connection
   if($link === false){
       die("ERROR: Could not connect. " . mysqli_connect_error());
   }
   
   $sqllocation = 'select DISTINCT Location_Name from POI';
   $sqlcity = 'select DISTINCT City from POI';
   $sqlstate = 'select DISTINCT State from POI';

   $location = array();
   $citys = array();
   $states = array();
   if($result = mysqli_query($link, $sqllocation)) {
     while ($row = mysqli_fetch_array($result)) 
     {
       array_push($location, $row['Location_Name']);
     }
   }
   if($result = mysqli_query($link, $sqlcity)) {
     while ($row = mysqli_fetch_array($result)) 
     {
       array_push($citys, $row['City']);
     }
   }
   if($result = mysqli_query($link, $sqlstate)) {
     while ($row = mysqli_fetch_array($result)) 
     {
       array_push($states, $row['State']);
     }
   }

   if (isset($_POST)) {
    $loc = $_POST['location'];
    $cit = $_POST['city'];
    $st = $_POST['state'];
    $zip = $_POST['zipcode'];
    $flagged = $_POST['flagged'];
    $dateFrom = $_POST['dataReadingDatetimeFrom'];
    $dateTo = $_POST['dataReadingDatetimeTo'];
    echo $flagged;

    $sql = "select * from POI where Location_Name = '$loc' and City = '$cit' and State = '$st' and Zip_Code = '$zip' and Flag = '$flagged' and Date_Flagged >= '$dateFrom' and Date_Flagged <= '$dateTo'";
    echo $sql;

   }
   
   mysqli_close($link);
   // print_r($citys);
   // print_r($states);
   
   ?>
<!DOCTYPE html>
<html>
   <head>
      <title>View POIs</title>
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
                        <h1 class="center-text">View POIs </h1>
                        <form id="login-form" action="" method="post" role="form" style="display: block;">
                           <div class="form-group row">
                              <label class="col-2 col-form-label">POI Location Name</label>
                              <div class="col-10">
                                 <select name="location" class="form-control">
                                 <?php foreach($location as $s) {
                                    echo '<option>' . $s . '</option>';
                                    } ?>
                                 </select>
                              </div>
                           </div>
                           <div class="form-group row">
                              <label class="col-2 col-form-label">City</label>
                              <div class="col-10">
                                 <select name="city" class="form-control">
                                 <?php foreach($citys as $s) {
                                    echo '<option>' . $s . '</option>';
                                    } ?>
                                 </select>
                              </div>
                           </div>
                           <div class="form-group row">
                              <label class="col-2 col-form-label">State</label>
                              <div class="col-10">
                                 <select name="state" class="form-control">
                                 <?php foreach($states as $s) {
                                    echo '<option>' . $s . '</option>';
                                    } ?>
                                 </select>
                              </div>
                           </div>
                           <div class="form-group row">
                              <label class="col-2 col-form-label">Zip Code</label>
                              <div class="col-10">
                                 <input type="text" class="form-control" name="zipcode">
                              </div>
                           </div>
                           <div class="form-group row">
                              <label class="col-2 col-form-label">Flagged</label>
                              <div class="col-10">
                                 <input type="checkbox" name="flagged" value="">
                              </div>
                           </div>
                           <div class="form-group row">
                              <label class="col-2 col-form-label">Date flagged</label>
                              <div class="col-10">
                                 <input type="date" name="dataReadingDatetimeFrom">
                                 to
                                 <input type="date" name="dataReadingDatetimeTo">
                              </div>
                           </div>
                           <div class="form-group row">
                              <div class="col-sm-6">
                                 <a href="#" class="form-control btn btn-primary">Apply Filter</a>
                              </div>
                              <div class="col-sm-6">
                                 <a href="#" class="form-control btn btn-primary">Reset Filter</a>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <hr>
         <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
               <div class="table-responsive">
                  <table id="mytable" class="table table-bordred table-striped">
                     <thead>
                        <th>Location name</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Zip code</th>
                        <th>Flagged?</th>
                        <th>Date Flagged</th>
                     </thead>
                     <tbody>
                        <tr>
                           <td>Blah balh</td>
                           <td>Mohsin</td>
                           <td>Irshad</td>
                           <td>30024</td>
                           <td>isometric.mohsin@gmail.com</td>
                           <td>isometric.mohsin@gmail.com</td>
                        </tr>
                     </tbody>
                  </table>
               </div>
               <a class="form-control btn btn-primary" href="cityOfficialFunction.php">Back</a>
            </div>
         </div>
      </div>
      <script type="text/javascript" src="../assets/js/jquery-3.2.1.min.js" ></script>
      <script type="text/javascript" src="../assets/js/bootstrap.min.js" ></script>
      <script type="text/javascript" src="../assets/js/main.js" ></script>
   </body>
</html>