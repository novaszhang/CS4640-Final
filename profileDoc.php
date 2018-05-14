<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <!--<link rel="stylesheet" href="https://getbootstrap.com/dist/css/bootstrap.min.css">-->
  <link rel="stylesheet" href="CSS/navBar.css">
  <link rel="stylesheet" href="CSS/signin.css">
  <link href="https://getbootstrap.com/docs/4.0/examples/navbars/navbar.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-route.js"></script>
</head>

<body class="text-center" style="height: 90%" ng-app="myApp">
  <div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="margin:0px">
      <a class="navbar-brand" href="index.php">HealthConnect</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample05">
        <ul class="navbar-nav mr-auto">
        </ul>
        <button type="button" class="btn btn-outline-light" id="logoutBtn" onclick="window.location='logout.php'">Log Out</button>
      </div>
    </nav>
  <?php
    session_start();
    if(isset($_SESSION['user']) and isset($_SESSION['usertype']) and $_SESSION['usertype'] === 'doctor'){
      //echo $_SESSION['user']." is logged in.";
    }
    else{
      echo "Please log in!";
    }
    
    $servername = getenv('IP');
    $username = getenv('C9_USER');
    $username = "root";
    $password = "slobodanka";
    $database = "myDB";
    $dbport = 3306;
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database, $dbport);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    $dbquery = "select * from patients p where p.email in (select patemail from relation where docemail='".$_SESSION['user']."')";
    $result = mysqli_query($conn, $dbquery);
    $patemaillist = array();
    $patnamelist = array();
    if($result != false){
      while($row = mysqli_fetch_array($result)){
        array_push($patemaillist, $row["email"]);
        array_push($patnamelist, ["first"=>$row["firstname"], "last"=>$row["lastname"], "email"=>$row["email"]]);
      } 
    }
    
    $dbquery2 = "select firstname, lastname from doctors where email='".$_SESSION['user']."'";
    $result2 = mysqli_query($conn, $dbquery2);
    $docname = "";
    if ($result2 != false){
      $row = mysqli_fetch_array($result2);
      $docname = $row["firstname"]." ".$row["lastname"];
    }
    sort($patnamelist);
  ?>
  <script>
    var patemaillist = <?php echo json_encode($patemaillist);?>;
    var patnamelist = <?php echo json_encode($patnamelist);?>;
  </script>
  </div>
<div class="jumbotron" style="background: url(Images/background.jpg); border-radius:0px; padding-bottom: 1rem;margin-bottom:0px;background-color:#93dbff">
        <div class="container" style="padding-top: 0.5rem; padding-left:3rem;text-align:left">
         <!-- <img src="images/profpic.jpg" class="rounded-circle" style="width: 90px; length: 90px; float: left; margin-right: 0.6cm;">-->
          <h1 style="margin-left: 0.6cm; margin-top: 0.1cm;color:white" class="display-3">Hi, <?php echo $docname; ?></h1>
        </div>
      </div>
  <div class="container-fluid" style="margin-top:0px;">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
               <br>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="#!dash">
                  <span data-feather="home"></span>
                  Notes <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#!patList">
                  <span data-feather="file"></span>
                  Patients
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="appointments"></span>
                  Appointments
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="prescriptions"></span>
                  Prescriptions
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="bar-chart-2"></span>
                  Reports
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="layers"></span>
                  Edit Profile
                </a>
              </li>
            </ul>

            <!--<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Patients</span>
              <a class="d-flex align-items-center text-muted" href="#">
                <span data-feather="plus-circle"></span>
              </a>
            </h6>
            <ul class="nav flex-column mb-2">
              <li class="nav-item">
                <a class="nav-link" href="#!pat1">
                  <span data-feather="file-text"></span>
                  Patient
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Last quarter
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Social engagement
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="file-text"></span>
                  Year-end sale
                </a>
              </li>
            </ul>-->
          </div>
        </nav>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <!--<a href="#!/doc">Doctor</a>
          <a href="#!/doc1">Doctor1</a>
          <a href="#!/doc2">Doctor2</a>-->
          <div ng-view>
          </div>
          <script>
            var useremail = "<?php echo $_SESSION['user'];?>";
          </script>
          <script src="Scripts/routeProfileDoc.js"></script>
          <script src="Scripts/livesearch.js"></script>
          <canvas class="my-4" id="myChart" width="900" height="380"></canvas>

          
        </main>
      </div>
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

<script src="Scripts/livesearch.js"></script>
