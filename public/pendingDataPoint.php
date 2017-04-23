<?php

require_once 'connect.php';
// $link = mysqli_connect("localhost", "cs4400_74", "e_zTUL5w", "cs4400_74");
// // $link = mysqli_connect("localhost", "root", "", "cs4400_74");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = 'select * from DATA_POINT where Accepted is NULL';
$dataPoints = array();
// $location = array();
// $type = array();
// $value = array();
// $timeDate = array();

if($result = mysqli_query($link, $sql)) {
   while ($row = mysqli_fetch_array($result)) 
   {
      $dataPoint = array();
      $dataPoint['location'] = $row['Location_Name'];
      $dataPoint['type'] = $row['Type'];
      $dataPoint['value'] = $row['DataValue'];
      $dataPoint['time'] = $row['DateTime'];

      array_push($dataPoints, $dataPoint);

      // array_push($location, $row['Location_Name']);
      // array_push($type, $row['Type']);
      // array_push($value, $row['DataValue']);
      // array_push($timeDate, $row['DateTime']);
   }
}


// print_r($location);
// print_r($type);
// print_r($value);
// print_r($timeDate);

mysqli_close($link);
// print_r($citys);
// print_r($states);

?>

<!DOCTYPE html>
<html>
   <head>
      <title>Pending Data Point</title>
      <link href="../assets/css/main.css" rel="stylesheet">
      <link href="../assets/css/bootstrap-theme.min.css" rel="stylesheet">
      <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
   </head>
   <body>
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <h2>Pending data points</h2>
               <div class="table-responsive">
                  <table id="mytable" class="table table-bordred table-striped">
                     <thead>
                        <th></th>
                        <th>POI location</th>
                        <th>Data type</th>
                        <th>Data value</th>
                        <th>Time and date of data reading</th>
                     </thead>
                     <tbody>
                     <?php foreach($dataPoints as $dp) { ?>
                        <tr>
                           <td><input name="accept" value="<?php echo $dp['time']; ?>" type="checkbox" class="checkthis" /></td>
                           <td><?php echo $dp['location']; ?></td>
                           <td><?php echo $dp['type']; ?></td>
                           <td><?php echo $dp['value']; ?></td>
                           <td><?php echo $dp['time']; ?></td>
                        </tr>
                        <?php } ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
         <div class="form-group">
            <div class="row">
               <div class="col-sm-6 col-sm-offset-3">
                  <input type="submit" name="accept" id="accept" tabindex="4" class="form-control btn btn-primary" value="Accept">
                  <br>
                  <br>
                  <input type="submit" name="reject" id="reject" tabindex="4" class="form-control btn btn-primary" value="Reject">
                  <br>
                  <br>
                  <a class="form-control btn btn-primary" href="adminFunction.php">Back</a>
               </div>
            </div>
         </div>
      </div>
      <script type="text/javascript" src="../assets/js/jquery-3.2.1.min.js" ></script>
      <script type="text/javascript" src="../assets/js/bootstrap.min.js" ></script>
      <script type="text/javascript" src="../assets/js/main.js" ></script>
   </body>
</html>