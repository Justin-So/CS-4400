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
         <div class="row">
            <div class="col-md-12">
               <h2>Pending City Officials</h2>
               <div class="table-responsive">
                  <table id="mytable" class="table table-bordred table-striped">
                     <thead>
                        <th></th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Title</th>
                     </thead>
                     <tbody>
                        <tr>
                           <td><input type="checkbox" class="checkthis" /></td>
                           <td>Mohsin</td>
                           <td>Irshad</td>
                           <td>CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan</td>
                           <td>isometric.mohsin@gmail.com</td>
                           <td>Mayor</td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
         <div class="form-group">
            <div class="row">
               <div class="col-sm-6 col-sm-offset-3">
                  <input type="button" name="accept" id="accept" tabindex="4" class="form-control btn btn-primary" value="Accept">
                  <br>
                  <br>
                  <input type="button" name="reject" id="reject" tabindex="4" class="form-control btn btn-primary" value="Reject">
                  <br>
                  <br>
                  <a class="form-control btn btn-primary" href="adminFunction.php">Cancel</a>
               </div>
            </div>
         </div>
      </div>
      <script type="text/javascript" src="../assets/js/jquery-3.2.1.min.js" ></script>
      <script type="text/javascript" src="../assets/js/bootstrap.min.js" ></script>
      <script type="text/javascript" src="../assets/js/main.js" ></script>
   </body>
</html>