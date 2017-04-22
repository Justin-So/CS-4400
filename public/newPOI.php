<!DOCTYPE html>
<html>
   <head>
      <title>New Location</title>
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
                        <h1 class="center-text">Add a New Location </h1>
                        <form id="login-form" action="" method="post" role="form" style="display: block;">
                           <div class="form-group">
                              <input type="text" name="locationName" id="locationName" tabindex="1" class="form-control" placeholder="POI Location Name" value="">
                           </div>
                           <label>City</label>
                           <select class="form-control">
                              <option >A</option >
                              <option >B</option>
                              <option >C</option >
                           </select>
                           <label>State</label>
                           <select class="form-control">
                              <option >A</option >
                              <option >B</option>
                              <option >C</option >
                           </select>
                           <div class="form-group">
                              <br>
                              <input type="text" name="zipCode" id="zipCode" tabindex="1" class="form-control" placeholder="ZipCode" value="">
                           </div>
                           <div class="form-group">
                              <div class="row">
                                 <div class="col-sm-6 col-sm-offset-3">
                                    <input type="button" name="back" id="back" tabindex="4" class="form-control btn btn-primary" value="Back">
                                    <br>
                                    <br>
                                    <input type="button" name="submit" id="submit" tabindex="4" class="form-control btn btn-primary" value="Submit">
                                 </div>
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