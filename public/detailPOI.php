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
                                 <select class="form-control">
                                    <option >A</option>
                                    <option >B</option>
                                    <option >C</option>
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
                                 <a href="#" class="form-control btn btn-primary">Back</a>
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
