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
<%@ page language="java"%>
<%@ page import="java.util.*"%>
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
        <button type="button" class="btn btn-outline-light" id="loginBtn" onclick="window.location.href='login.jsp'">Log In</button>
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
              <button type="button" class="btn btn-default" id="modBtn" onclick="window.location='registerPat.html'">Patient</button>
              <button type="button" class="btn btn-default" id="modBtn" onclick="window.location='registerDoc.html'">Doctor</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div style="padding-top:5%">
    <form class="form-signin" action="login.jsp" method="post">
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
  <%!String emailBean = "";%>
  <%!String pwBean="";%>
  <%!HashMap<String, String> dbpat = new HashMap<String, String>(); %>
  <%!HashMap<String, String> dbdoc = new HashMap<String, String>();%>
  <jsp:useBean id="loginBean" class="mypackage.loginBean" scope="session"/>
  <% 
    String email = request.getParameter("inputEmail");
    String pw = request.getParameter("inputPassword");
    String client = request.getParameter("client");
    dbpat.put("bill@gmail.com", "billpw");
    dbpat.put("jeffrey@gmail.com", "jeffreypw");
    dbdoc.put("nova@aol.com", "novapw");
    if(request.getMethod().equals("POST")){
      //Verify
      if(client.equals("pat")){
        if(dbpat.keySet().contains(email) && dbpat.get(email).equals(pw)){
          emailBean=email;
          pwBean=pw;
        }
      }
      else if(client.equals("doc")){
        if(dbdoc.keySet().contains(email) && dbdoc.get(email).equals(pw)){
          emailBean=email;
          pwBean=pw;
        }
      }
    }
    
  %>
  <jsp:setProperty name="loginBean" property="name" value='<%= emailBean %>' />
  <jsp:setProperty name="loginBean" property="password" value='<%= pwBean %>' />
  <%
    out.println(emailBean);
    out.println(pwBean);
    if(!emailBean.isEmpty() && !pwBean.isEmpty()){
      out.println("hello");
      
      response.sendRedirect(request.getContextPath()+"/profile.jsp");
    }
  %>
  
</body>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>
  window.jQuery || document.write('<script src="https://getbootstrap.com/assets/js/vendor/jquery-slim.min.js"><\/script>')
</script>
<script src="https://getbootstrap.com/assets/js/vendor/popper.min.js"></script>
<script src="https://getbootstrap.com/dist/js/bootstrap.min.js"></script>

</html>