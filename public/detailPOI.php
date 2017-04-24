<?php
   require_once 'connect.php';
   // $link = mysqli_connect("localhost", "cs4400_74", "e_zTUL5w", "cs4400_74");
   // // $link = mysqli_connect("localhost", "root", "", "cs4400_74");
    
   // Check connection
   if($link === false){
       die("ERROR: Could not connect. " . mysqli_connect_error());
   }
   
   
   
   $type = 'select DISTINCT TYPE from DATA_POINT';
   $data_type = array();
   if($result = mysqli_query($link, $type)) {
   while ($row = mysqli_fetch_array($result)) 
      {
    array_push($data_type, $row['TYPE']);
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
    // echo $sql;
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
   
   }
   
   mysqli_close($link);
   // print_r($citys);
   // print_r($states);
   
   ?>
<!DOCTYPE html>
<html>
   <head>
      <title>POI Detail</title>
      <link href="../assets/css/main.css" rel="stylesheet">
      <link href="../assets/css/bootstrap-theme.min.css" rel="stylesheet">
      <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
   </head>
   <body>
      <div class="container">
         <div class="row">
            <div class="col-md-6 col-md-offset-3">
               <h1 class="center-text">POI Detail</h1>
               <div class="panel-body">
                  <div class="row">
                     <div class="col-lg-12">
                        <form id="login-form" action="" method="post" role="form" style="display: block;">
                           <div class="form-group row">
                              <label class="col-2 col-form-label">Data type</label>
                              <div class="col-10">
                                 <select name="type" class="form-control">
                                 <?php foreach($data_type as $c) {
                                    echo '<option>' . $c . '</option>';
                                    } ?>
                                 </select>
                              </div>
                           </div>
                           <div class="form-group row">
                              <div class="col-10">
                                 <input type="minData" name="minData" id="minData" tabindex="1" class="form-control" placeholder="Enter Minimum Data Value" value="">
                              </div>
                              <br>
                              <div class="col-10">
                                 <input type="maxData" name="maxData" id="maxData" tabindex="1" class="form-control" placeholder="Enter Maximum Data Value" value="">
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
                        <hr>
                        <div class="table-responsive">
                           <table id="mytable" class="table table-bordred table-striped">
                              <thead>
                                 <th>Data type</th>
                                 <th>Data value</th>
                                 <th>Time and date of data reading</th>
                              </thead>
                              <tbody>
                                 <tr>
                                    <td>Mohsin</td>
                                    <td>Irshad</td>
                                    <td>isometric.mohsin@gmail.com</td>
                                 </tr>
                              </tbody>
                           </table>
                           <div class="clearfix"></div>
                        </div>
                     </div>
                  </div>
                  <div class="form-group row">
                     <div class="col-sm-6">
                        <a class="form-control btn btn-primary" href="viewPOI.php">Back</a>
                     </div>
                     <div class="col-sm-6">
                        <a href="#" class="form-control btn btn-primary">Flag</a>
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