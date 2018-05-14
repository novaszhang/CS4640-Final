<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <link rel="stylesheet" href="https://getbootstrap.com/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="CSS/navBar.css">
  <link rel="stylesheet" href="CSS/signin.css">
  <link href="https://getbootstrap.com/docs/4.0/examples/navbars/navbar.css" rel="stylesheet">
</head>

<body class="text-center" style="height: 90%">
  <div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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
        <button type="button" class="btn btn-outline-light" id="logoutBtn" onclick="window.location='logout.jsp'">Log Out</button>
      </div>
    </nav>
    <jsp:useBean id="loginBean" class="mypackage.loginBean" scope="session"/>
    Hello <jsp:getProperty name="loginBean" property="name"/>! <br>
    Password: <jsp:getProperty name="loginBean" property="password"/>
    
  </div>
</body>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>
  window.jQuery || document.write('<script src="https://getbootstrap.com/assets/js/vendor/jquery-slim.min.js"><\/script>')
</script>
<script src="https://getbootstrap.com/assets/js/vendor/popper.min.js"></script>
<script src="https://getbootstrap.com/dist/js/bootstrap.min.js"></script>

</html>