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
                <form id="login-form" action="" method="post" role="form" style="display: block;">

                  <div class="form-group row">
                    <label class="col-2 col-form-label">POI Location Name</label>
                    <div class="col-10">
                      <input type="text" class="form-control" placeholder="Username">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-2 col-form-label">Time and date of data reading</label>
                    <div class="col-10">
                      <input type="datetime-local" name="dataReadingDatetime">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-2 col-form-label">Data type</label>
                    <div class="col-10">
                      <select class="form-control">
                        <option >A</option>
                        <option >B</option>
                        <option >C</option>
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
