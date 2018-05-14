<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <link rel="stylesheet" href="https://getbootstrap.com/dist/css/bootstrap.min.css">
  <link href="https://getbootstrap.com/docs/4.0/examples/navbars/navbar.css" rel="stylesheet">
  <link rel="stylesheet" href="CSS/navBar.css">
  <link rel="stylesheet" href="CSS/carousel.css">
</head>

<body>
  <?php
  //Create variables for button toggle
    session_start();
    
    $patlog = false;
    $doclog = false;
    
    if(isset($_SESSION['user']) && isset($_SESSION['usertype'])){
      //$user = $_SESSION['user'];
      $type = $_SESSION['usertype'];
      if($type === 'patient'){
        $patlog = true;
      }
      else if($type === 'doctor'){
        $doclog = true;
      }
    }
    
  ?>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="margin-bottom:0px;">
    <a class="navbar-brand" href="index.php">HealthConnect</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    <div class="collapse navbar-collapse" id="navbarsExample05">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="feedback">Feedback <span class="sr-only">(current)</span></a>
          </li>
      </ul>
      <button type="button" class="btn btn-outline-light" id="loginBtn" onclick="window.location='login.php'" <?php if($patlog || $doclog){echo "hidden";}?>>Log In</button>
      <button type="button" class="btn btn-outline-light" id="regisBtn" data-toggle="modal" data-target="#regmodal" <?php if($patlog || $doclog){echo "hidden";}?>>Register</button>
      <button type="button" class="btn btn-outline-light" id="profBtn" style="right-margin:5px" onclick="window.location='profileDoc.php'" <?php if(!$doclog){echo "hidden";}?>> My Profile </button>
      <button type="button" class="btn btn-outline-light" id="profBtn" style="right-margin:5px" onclick="window.location='profilePat.php'" <?php if(!$patlog){echo "hidden";}?>> My Profile </button>
      <button type="button" class="btn btn-outline-light" id="logoutBtn" onclick="window.location='logout.php'" <?php if(!($patlog || $doclog)){echo "hidden";}?>> Log Out </button>
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
            <button type="button" class="btn btn-default" id="modBtn" onclick="window.location='registerPat.html'">Patient</button>
            <button type="button" class="btn btn-default" id="modBtn" onclick="window.location='registerDoc.html'">Doctor</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="4000">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="Images/docSenior.jpg" alt="First slide">
        <div class="carousel-caption d-none d-md-block">
          <h1>MyHealth</h1>
          <p>Filler text</p>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="Images/docThumb.jpg" alt="Second slide">
        <div class="carousel-caption d-none d-md-block">
          <h1>MyHealth</h1>
          <p>Filler text</p>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="Images/x-ray.jpg" alt="Third slide">
        <div class="carousel-caption d-none d-md-block">
          <h1>MyHealth</h1>
          <p>Filler text</p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  </div>
  <div class="container marketing">

        <!-- Three columns of text below the carousel -->
        <div style="text-align:center">
          <h1 id="webtitle">MyHealth</h1>
          <p style="font-size:14pt">MyHealth is an application which allows patients and doctors to easily access medical records and interact with one another.</p>
        </div><!-- /.row -->


        <!-- START THE FEATURETTES -->

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading">Easy Access to Personal Records</h2>
            <p class="lead">As a patient, MyHealth gives you the tools to take 
            control of your health by being able to instanteously view your records. 
            It has never been easier to be informed!</p>
          </div>
          <div class="col-md-5">
            <!--<img class="featurette-image img-fluid mx-auto" src="Images/medical-records.jpg" alt="Generic placeholder image">-->
         
           <img style="width: 400px; height: 400px;" class="featurette-image img-fluid mx-auto" src="Images/medical-records.jpg" alt="500x500"  
           data-holder-rendered="true">
         
          </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading">Keep Track of Ongoing Treatments</h2>
            <p class="lead">Doctors can prescribe medication and treatments to each of their patients through our online interface, making it easier for both the patient and doctor to stay organized.</p>
          </div>
          <div class="col-md-5 order-md-1">
            <img class="featurette-image img-fluid mx-auto" src="Images/medicine.jpeg" alt="500x500" style="width: 500px; height: 500px;" data-holder-rendered="true">
          </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading">Make Connections</h2>
            <p class="lead">Our universal interface allows doctors to make connections with and keep track of all of their patients and allows patients to make connections with all of their doctors to cover all of their medical needs.</p>
          </div>
          <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" src="Images/care.jpg" alt="500x500" style="width: 500px; height: 500px;" data-holder-rendered="true">
          </div>
        </div>
        
         <hr class="featurette-divider">

        <div class="row featurette">
          <table align="center" cellpadding="6">
          <tr>
            <td><button class="btn btn-lg btn-outline-primary" onclick="window.location='login.php'" style="left-margin:5px" <?php if($patlog || $doclog){echo "hidden";}?>>Log In</button></td>
            <td><button class="btn btn-lg btn-outline-primary" data-toggle="modal" data-target="#regmodal" style="left-margin:5px" <?php if($patlog || $doclog){echo "hidden";}?>>Register</button></td>
            <td><button class="btn btn-lg btn-outline-primary" onclick="window.location='feedback'" style="left-margin:5px">Feedback</button></td>
          </tr>
        </table>
        </div>

    

        <!-- /END THE FEATURETTES -->

      </div><!-- /.container -->


      <!-- FOOTER -->
      <footer class="container" style="text-align:center">
        <p class="float-right"><a href="#">Back to top</a></p>
  
      </footer>

</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>
  window.jQuery || document.write('<script src="https://getbootstrap.com/assets/js/vendor/jquery-slim.min.js"><\/script>')
</script>
<script src="https://getbootstrap.com/assets/js/vendor/popper.min.js"></script>
<script src="https://getbootstrap.com/dist/js/bootstrap.min.js"></script>
<script>
  document.getElementById('webtitle').style.fontSize="50px";
</script>

</html>
