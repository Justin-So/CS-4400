<?php

$link = mysqli_connect("localhost", "cs4400_74", "e_zTUL5w", "cs4400_74");
// $link = mysqli_connect("localhost", "root", "", "cs4400_74");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = 'select * from POI';
$location_name = array();
if($result = mysqli_query($link, $sql)) {
  while ($row = mysqli_fetch_array($result)) 
  {
    // $citys = $row['City'];
    array_push($location_name, $row['Location_Name']);
    // $states = $row['State'];
  }
}


$type = 'select * from DATA_POINT';
$data_type = array();
if($result = mysqli_query($link, $type)) {
  while ($row = mysqli_fetch_array($result)) 
  {
    array_push($data_type, $row['Type']);
  }
}

mysqli_close($link);
// print_r($citys);
// print_r($states);

?>

<!DOCTYPE html>
<html>
	<head>
		<title>New Data Point</title>
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
                <form id="login-form" action="submitDataPoint.php" method="post" role="form" style="display: block;">

                  <div class="form-group row">
                    <label>Location Name</label>
                    <select name="location_name" class="form-control">
                      <?php foreach($location_name as $c) {
                        echo '<option>' . $c . '</option>';
                        } ?>
                    </select>
                  </div>
                  <a class="form-control btn btn-primary" href="pendingCityOfficial.php">Add a New Location</a>
                  <br>
                  <br>

                  <div class="form-group row">
                    <label class="col-2 col-form-label">Time and date of data reading</label>
                    <div class="col-10">
                      <input type="datetime-local" name="dataReadingDatetime">
                    </div>
                  </div>

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
                    <label class="col-2 col-form-label">Data Value</label>
                    <div class="col-10">
                      <input type="text" class="form-control" name="dataValue">
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-sm-6">
                      <!-- <input id="backButton" class="form-control btn btn-primary" value="Back"> -->
                      <a href="#" class="form-control btn btn-primary">Back</a>

                    </div>
                    <div class="col-sm-6">
                      <input type="submit" id="submitButton" class="form-control btn btn-success" value="Submit">
                    </div>
                  </div>
                  <!-- <div class="form-group">
                    <input type="datetime-local" name="bday">
                  </div> -->
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
