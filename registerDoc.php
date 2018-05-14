<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <!--<link rel="stylesheet" href="https://getbootstrap.com/dist/css/bootstrap.min.css" />-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link href="https://getbootstrap.com/docs/4.0/examples/navbars/navbar.css" rel="stylesheet">
  <link rel="stylesheet" href="CSS/navBar.css">
  <link rel="stylesheet" href="CSS/register.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">HealthConnect</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

    <div class="collapse navbar-collapse" id="navbarsExample05">
      <ul class="navbar-nav mr-auto">
      </ul>
      <button type="button" class="btn btn-outline-light" id="loginBtn" onclick="window.location='login.php'">Log In</button>
      <button type="button" class="btn btn-outline-light" id="regisBtn" data-toggle="modal" data-target="#regmodal">Register</button>
    </div>
  </nav>
  <div class="container">
    <div class="modal fade" id="regmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Register as...</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
          </div>
          <div class="modal-body">
            <button type="button" class="btn btn-default" id="modBtn" onclick="window.location='registerPat.php'">Patient</button>
            <button type="button" class="btn btn-default" id="modBtn" onclick="window.location='registerDoc.php'">Doctor</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <form class="form-register" onsubmit="return validateForm()" method="post">
    <h2 class="regText">Register as Doctor</h2>
    <p class="regText" id="alert">All fields except Institution are required.</p>
    <div class="form-group">
      <label for="firstname">First Name:</label>
      <input class="form-control" type="text" name="firstname" id="firstname"></input>
      <p class="errorMessage" id="firstnameError"></p>
 
    </div>
    <div class="form-group">
      <label for="lastname">Last Name:</label>
      <input class="form-control" type="text" name="lastname" id="lastname"></input>
      <p class="errorMessage" id="lastnameError"></p>

    </div>
    <div class="form-group">
      <label for="mail">Email:</label>
      <input class="form-control" type="text" name="mail" id="mail"></input>
      <p class="errorMessage" id="mailError"></p>
    </div>
    <div class="form-group">
      <label for="pw">Password:</label>
      <input class="form-control" type="password" name="pw" id="pw"></input>
      <p class="errorMessage" id="pwError"></p>
    </div>
    <div class="form-group">
      <label for="confpw">Confirm Password:</label>
      <input class="form-control" type="password" name="confpw" id="confpw"></input>
      <p class="errorMessage" id="confpwError"></p>
    </div>
    <div class="form-group">
      <label for="inst">Institution:</label>
      <input class="form-control" type="input" name="inst" id="inst"></input>
    </div>
    <div class="form-group">
      <label for="spec">Specialty:</label>
      <select class="form-control" name="specialty" id="specialty">
        <option value="general">General</option>
        <option value="psychiatry">Psychiatry</option>
        <option value="surgery">Surgery</option>
        <option value="oncology">Oncology</option>
      </select>
    </div>
    <div class="form-group">
      <label for="birthday">Birthday (MM/DD/YYYY):</label>
      <input class="form-control" type="text" name="birthday" id="birthday"></input>
      <p class="errorMessage" id="birthdayError"></p>
    </div>
    <div class="form-group">
      <label for="phone">Phone:</label>
      <input class="form-control" type="text" name="phone" id="phone"></input>
      <p class="errorMessage" id="phoneError"></p>
    </div>
    <div class="buttonHolder">
      <input type="submit" class="btn btn-secondary" value="Register">
    </div>
  </form>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>
  window.jQuery || document.write('<script src="https://getbootstrap.com/assets/js/vendor/jquery-slim.min.js"><\/script>')
</script>
<!--<script src="https://getbootstrap.com/assets/js/vendor/popper.min.js"></script>
<script src="https://getbootstrap.com/dist/js/bootstrap.min.js"></script>-->
<script src="Scripts/validateRegDoc.js"></script>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</html>

<?php
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $servername = getenv('IP');
    $dbusername = getenv('C9_USER');
    $dbpassword = "slobodanka";
    $database = "myDB";
    $dbport = 3306;
    $conn = mysqli_connect($servername, $dbusername, $dbpassword, $database, $dbport);
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    
    $email = $_POST["mail"];
    
    $dbquery = "select * from doctors where email=\"".$email."\"";
    $result = mysqli_query($conn, $dbquery);
    if($result->numrows == 0){
      $addquery = "insert into doctors values ('".$_POST["firstname"]."', '".$_POST["lastname"]."','".
        $email."','".md5($_POST["pw"])."','".$_POST["birthday"]."','".$_POST["phone"]."','".$_POST["inst"]."','".$_POST["specialty"]."')";
      $addresult = mysqli_query($conn, $addquery);
      if(!$addresult){
        echo "Registration failed! Try again later.";
      }
      else{
        echo "Registration successful!";
      }
    }
    else{
      echo "Email already registered!";
    }
  }
?>
