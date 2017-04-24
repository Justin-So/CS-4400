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

   $datas = array();

   if (!empty($_POST)) {
       $type = $_POST['type'];
       $minData = (int)$_POST['minData'];
       $maxData = (int)$_POST['maxData'];
       $dateFrom = $_POST['dataReadingDatetimeFrom'];
       $dateTo = $_POST['dataReadingDatetimeTo'];
      
       $sql = "select DateTime, DataValue, Type, Location_Name from DATA_POINT where Type='$type' and DataValue >= $minData and DataValue <= $maxData and DateTime >= '$dateFrom' and DateTime <= '$dateTo' ORDER BY DateTime";
       // echo $sql;

      if($result = mysqli_query($link, $sql)) {
        while ($row = mysqli_fetch_array($result)) 
        {
         $data = array();
         $data['Type'] = $row['Type'];
         $data['DataValue'] = $row['DataValue'];
         $data['DateTime'] = $row['DateTime'];
         $data['location'] = $row['Location_Name'];
         
          array_push($datas, $data);
        }
      }
   
   }
   
   mysqli_close($link);
   
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
                                 <input type="submit" name="apply" id="apply" tabindex="4" class="form-control btn btn-primary" value="Apply Filter">
                              </div>
                              <div class="col-sm-6">
                                 <input type="submit" name="reset" id="filter" tabindex="4" class="form-control btn btn-primary" value="Reset Filter">
                              </div>
                           </div>
                        </form>
                        <hr>
                        <form action="flag.php" method="post" role="form">
                           <div class="table-responsive">
                           <table id="mytable" class="table table-bordred table-striped">
                              <thead>
                                 <th></th>
                                 <th>Data type</th>
                                 <th>Data value</th>
                                 <th>Time and date of data reading</th>
                              </thead>
                              <tbody>
                              <?php foreach($datas as $d) { ?>
                                 <tr>
                                    <td><input name="selectedValue[]" value="<?php echo $d['location']; ?>" type="checkbox" class="checkthis" /></td>
                                    <td><?php echo $d['Type']; ?></td>
                                    <td><?php echo $d['DataValue'] ?></td>
                                    <td><?php echo $d['DateTime'] ?></td>
                                 </tr>
                              <?php } ?>
                              </tbody>
                           </table>
                           <div class="clearfix"></div>
                        </div>
                        <div class="form-group row">
                           <div class="col-sm-6">
                              <a class="form-control btn btn-primary" href="viewPOI.php">Back</a>
                           </div>
                           <div class="col-sm-6">
                              <input type="submit" name="flag" id="flag" tabindex="4" class="form-control btn btn-primary" value="flag">
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