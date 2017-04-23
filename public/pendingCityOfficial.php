<?php

require_once 'connect.php';
// $link = mysqli_connect("localhost", "cs4400_74", "e_zTUL5w", "cs4400_74");
// // $link = mysqli_connect("localhost", "root", "", "cs4400_74");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = 'select * from CITY_OFFICIAL where Approved is NULL';
$dataPoints = array();

if($result = mysqli_query($link, $sql)) {
   while ($row = mysqli_fetch_array($result)) 
   {
      $dataPoint = array();
      $dataPoint['username'] = $row['Username'];
      $dataPoint['city'] = $row['City'];
      $dataPoint['state'] = $row['State'];
      $dataPoint['title'] = $row['Title'];

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
      <title>Pending City Official</title>
      <link href="../assets/css/main.css" rel="stylesheet">
      <link href="../assets/css/bootstrap-theme.min.css" rel="stylesheet">
      <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
   </head>
   <body>
      <div class="container">
         <form method="post" action="updateCityOfficial.php">
            <div class="row">
               <div class="col-md-12">
                  <h2>Pending City Officials</h2>
                  <div class="table-responsive">
                     <table id="mytable" class="table table-bordred table-striped">
                        <thead>
                           <th></th>
                           <th>Username</th>
                           <th>City</th>
                           <th>State</th>
                           <th>Title</th>
                        </thead>
                        <tbody>
                           <?php foreach($dataPoints as $dp) { ?>
                              <tr>
                                 <td><input name="selectedValue[]" value="<?php echo $dp['username']; ?>" type="checkbox" class="checkthis" /></td>
                                 <td><?php echo $dp['username']; ?></td>
                                 <td><?php echo $dp['city']; ?></td>
                                 <td><?php echo $dp['state']; ?></td>
                                 <td><?php echo $dp['title']; ?></td>
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
                     <input type="submit" name="accept" id="accept" tabindex="4" class="form-control btn btn-primary" value="accept">
                     <br>
                     <br>
                     <input type="submit" name="reject" id="reject" tabindex="4" class="form-control btn btn-primary" value="reject">
                     <br>
                     <br>
                     <a class="form-control btn btn-primary" href="adminFunction.php">Back</a>
                  </div>
               </div>
            </div>
         </form>
      </div>
      <script type="text/javascript" src="../assets/js/jquery-3.2.1.min.js" ></script>
      <script type="text/javascript" src="../assets/js/bootstrap.min.js" ></script>
      <script type="text/javascript" src="../assets/js/main.js" ></script>
   </body>
</html>