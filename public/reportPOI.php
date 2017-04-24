<?php

require_once 'connect.php';
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = 'select * from POIReport';
$dataPoints = array();

if($result = mysqli_query($link, $sql)) {
   while ($row = mysqli_fetch_array($result)) 
   {
      $dataPoint = array();
      $dataPoint['location'] = $row['Location_Name'];
      $dataPoint['flagged'] = $row['Flag'];
      $dataPoint['city'] = $row['City'];
      $dataPoint['state'] = $row['State'];
      $dataPoint['amin'] = $row['amin'];
      $dataPoint['amax'] = $row['amax'];
      $dataPoint['aavg'] = $row['aavg'];
      $dataPoint['mmin'] = $row['mmin'];
      $dataPoint['mmax'] = $row['mmax'];
      $dataPoint['mavg'] = $row['mmavg'];
      $dataPoint['count'] = $row['COUNT(*)'];


      array_push($dataPoints, $dataPoint);
   }
}

// print_r($dataPoints);

mysqli_close($link);
// print_r($citys);
// print_r($states);

?>

<!DOCTYPE html>
<html>
   <head>
      <title>POI Report</title>
      <link href="../assets/css/main.css" rel="stylesheet">
      <link href="../assets/css/bootstrap-theme.min.css" rel="stylesheet">
      <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
   </head>
   <body>
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <h2>POI Report</h2>
               <div class="table-responsive">
                  <table id="mytable" class="table table-bordred table-striped">
                     <thead>
                        <th>POI Location</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Mold Min</th>
                        <th>Mold Avg</th>
                        <th>Mold Max</th>
                        <th>AQ Min</th>
                        <th>AQ Avg</th>
                        <th>AQ Max</th>
                        <th># of data points</th>
                        <th>Flagged?</th>
                     </thead>
                     <tbody>
                           <?php foreach($dataPoints as $dp) { ?>
                           <tr>
                              <td><?php echo $dp['location']; ?></td>
                              <td><?php echo $dp['city']; ?></td>
                              <td><?php echo $dp['state']; ?></td>
                              <td><?php echo $dp['mmin']; ?></td>
                              <td><?php echo $dp['mavg']; ?></td>
                              <td><?php echo $dp['mmax']; ?></td>
                              <td><?php echo $dp['amin']; ?></td>
                              <td><?php echo $dp['aavg']; ?></td>
                              <td><?php echo $dp['amax']; ?></td>
                              <td><?php echo $dp['count']; ?></td>
                              <td><?php echo $dp['flagged']; ?></td>
                           </tr>
                           <?php } ?>
                     </tbody>
                  </table>
                  <title>Filter By:</title>
                  <div class="form-group row">
                              <div class="col-sm-4">
                                 <input type="submit" name="moldmin" id="moldmin" tabindex="4" class="form-control btn btn-primary" value="Mold Min">
                              </div>
                              <div class="col-sm-4">
                                 <input type="submit" name="moldavg" id="moldavg" tabindex="4" class="form-control btn btn-primary" value="Mold Avg">
                              </div>
                              <div class="col-sm-4">
                                 <input type="submit" name="moldmax" id="moldmax" tabindex="4" class="form-control btn btn-primary" value="Reset Mold Max">
                              </div>
                              <div class="col-sm-4">
                                 <input type="submit" name="amin" id="amin" tabindex="4" class="form-control btn btn-primary" value="AQ Min">
                              </div>
                              <div class="col-sm-4">
                                 <input type="submit" name="aavg" id="aavg" tabindex="4" class="form-control btn btn-primary" value="AQ Avg">
                              </div>
                              <div class="col-sm-4">
                                 <input type="submit" name="amax" id="amax" tabindex="4" class="form-control btn btn-primary" value="AQ Max">
                              </div>
                              <div class="col-sm-4">
                                 <input type="submit" name="dp" id="dp" tabindex="4" class="form-control btn btn-primary" value="# of DataPoints">
                              </div>
                              <div class="col-sm-4">
                                 <input type="submit" name="flag" id="flag" tabindex="4" class="form-control btn btn-primary" value="Flagged?">
                              </div>
                           </div>
               </div>
            </div>
         </div>
         <div class="form-group">
            <div class="row">
               <div class="col-sm-6 col-sm-offset-3">
                  <a class="form-control btn btn-primary" href="cityOfficialFunction.php">Back</a>
               </div>
            </div>
         </div>
      </div>
      <script type="text/javascript" src="../assets/js/jquery-3.2.1.min.js" ></script>
      <script type="text/javascript" src="../assets/js/bootstrap.min.js" ></script>
      <script type="text/javascript" src="../assets/js/main.js" ></script>
   </body>
</html>