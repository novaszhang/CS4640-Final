<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <!--<link rel="stylesheet" href="https://getbootstrap.com/dist/css/bootstrap.min.css">-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="CSS/navBar.css">
  <link rel="stylesheet" href="CSS/signin.css">
  <link href="https://getbootstrap.com/docs/4.0/examples/navbars/navbar.css" rel="stylesheet">
</head>

<body class="text-center" style="height: 90%">
  <?php
    //Redirect if necessary
    session_start();
    
    if(isset($_SESSION['usertype'])&&isset($_SESSION['user'])){
      $type = $_SESSION['usertype'];
      if($type==='patient')
        header("Location:profilePat.php");
      elseif($type==='doctor')
        header("Location:profileDoc.php");
    }
      
    
  ?>
  <div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="index.php">HealthConnect</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample05">
        <ul class="navbar-nav mr-auto">
        </ul>
        <button type="button" class="btn btn-outline-light" id="loginBtn" onclick="window.location.href='login.php'">Log In</button>
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
  </div>
  <div style="padding-top:5%">
    <form class="form-signin" action="login.php" method="post">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="text" id="inputEmail" name="inputEmail" class="form-control" placeholder="Email address" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" name="remember" value="remember-me"> Remember me
        </label>
      </div>
      <table style="width:100%">
        <tr>
          <td><button class="btn btn-lg btn-primary btn-block" type="submit" name="client" value="pat">Patient</button></td>
          <td><button class="btn btn-lg btn-primary btn-block" type="submit" name="client" value="doc">Doctor</button></td>

        </tr>
      </table>

      
    </form>
    
    
  </div>
</body>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>
  window.jQuery || document.write('<script src="https://getbootstrap.com/assets/js/vendor/jquery-slim.min.js"><\/script>')
</script>
<!--<script src="https://getbootstrap.com/assets/js/vendor/popper.min.js"></script>
<script src="https://getbootstrap.com/dist/js/bootstrap.min.js"></script>-->
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</html>
<?php
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //Fake databases for users; convert later
    $servername = getenv('IP');
    //$dbusername = getenv('C9_USER');
    $dbusername = "root";
    $dbpassword = "slobodanka";
    $database = "myDB";
    $dbport = 3306;
    
    $conn = mysqli_connect($servername, $dbusername, $dbpassword, $database, $dbport);
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    $patusers = array(
        "bill@gmail.com" => "billpw",
        "nova@gmail.com" => "novapw",
        "jeffrey@aol.com" => "jeffreypw");
    
    $docusers = array(
        "doctor@doctor.com" => "doctorpw",
        "doctor2@doctor2.com" => "doctor2pw");
    
    function validEmail($email){
        $valEmail = preg_match('/[a-zA-Z0-9.!#%&’*+]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*/', $email);
        return $valEmail;
    }
    
    $email = $_POST["inputEmail"];
    $password = $_POST["inputPassword"];

    $valEmail = validEmail($email);
    if(!$valEmail){
      echo "<p style='color:red'> Email is not in an appropriate format. </p>";
    }
    
    $option = $_POST["client"];
    if($option === "pat"){
        //Do patient validation
        $dbquery = "select * from patients where email=\"".$email."\"";
        //echo $dbquery;
        $continue = false;
        $result = mysqli_query($conn, $dbquery);
        if($result != false){
          $row = mysqli_fetch_array($result);
          $continue = ($row["password"] === md5($password));
        }
        if($valEmail && $continue){ //replace with db later
            echo "Valid email users thingy hello";
            session_start();
            $_SESSION['user'] = $email;
            $_SESSION['usertype'] = 'patient';
            header("Location:profilePat.php");
            echo "<script> window.location.replace('profilePat.php') </script>";
        }else{
            echo "<p style='color:red'> Invalid Username and/or Password <p>";
        }
    }
    else if($option == "doc"){
        //Do doctor validation
        $dbquery = "select * from doctors where email=\"".$email."\"";
        //echo $dbquery;
        $continue = false;
        $result = mysqli_query($conn, $dbquery);
        if($result != false){
          $row = mysqli_fetch_array($result);
          $continue = ($row["password"] === md5($password));
        }
        if($valEmail && $continue){ //replace with db later
            //echo "Valid email users thingy hello why";
            session_start();
            $_SESSION['user'] = $email;
            $_SESSION['usertype'] = 'doctor';
            header("Location:profileDoc.php");
            //echo "done";
            echo "<script> window.location.replace('profileDoc.php') </script>";
        }else{
            echo "<p style='color:red'> Invalid Username and/or Password <p>";
        }
    }
  }
?>

