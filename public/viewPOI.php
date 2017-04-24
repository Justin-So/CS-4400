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
   $pois = array();
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
// echo '<pre>';
// print_r($_POST);
   if (!empty($_POST)) {
    $loc = $_POST['location'];
    $cit = $_POST['city'];
    $st = $_POST['state'];
    $zip = $_POST['zipcode'];
    $flagged = isset($_POST['flagged']) ? $_POST['flagged'] : "0";
    // if (array_key_exists('flagged', $_POST)) {
    //   echo 'hh';
    //   $flagged = "1";
    // } else {
    //   echo 'gg';
    //   $flagged = "0";
    // }
    // echo $flagged;
    $dateFrom = $_POST['dataReadingDatetimeFrom'];
    $dateTo = $_POST['dataReadingDatetimeTo'];
    // echo $flagged;
    // if ($flagged != "1") {
    //   $flagged = "0";
    // }

    $sql = "select * from POI where Location_Name = '$loc' and City = '$cit' and State = '$st' and Zip_Code = '$zip' and Flag = $flagged and Date_Flagged >= '$dateFrom' and Date_Flagged <= '$dateTo'";

    if($result = mysqli_query($link, $sql)) {
     while ($row = mysqli_fetch_array($result)) 
     {
      $poi = array();
      $poi['location'] = $row['Location_Name'];
      $poi['state'] = $row['State'];
      $poi['city'] = $row['City'];
      $poi['zip'] = $row['Zip_Code'];
      $poi['flag'] = $row['Flag'];
      $poi['dateFlagged'] = $row['Date_Flagged'];
      
       array_push($pois, $poi);
     }
   }
   print_r($poi);
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
                                 <input type="checkbox" name="flagged" value="1">
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
                                 <input type="submit" name="apply" id="apply" tabindex="4" class="form-control btn btn-primary" value="Apply Filter">
                              </div>
                              <div class="col-sm-6">
                                 <input type="submit" name="reset" id="reset" tabindex="4" class="form-control btn btn-primary" value="Reset Filter">
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
                     <?php
                     if (empty($pois)) {
                      echo "no data";
                     } else {
                      foreach($pois as $p) {
                       ?>
                        <tr>
                           <td><?php echo $p['location']; ?></td>
                           <td><?php echo $p['city']; ?></td>
                           <td><?php echo $p['state']; ?></td>
                           <td><?php echo $p['zip']; ?></td>
                           <td><?php echo $p['flag']; ?></td>
                           <td><?php echo $p['dateFlagged']; ?></td>
                        </tr>
                      <?php }
                      } ?>
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