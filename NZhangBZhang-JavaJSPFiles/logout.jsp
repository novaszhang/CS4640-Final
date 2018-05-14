<jsp:useBean id="loginBean" class="mypackage.loginBean" scope="session"/>
<jsp:setProperty name="loginBean" property="name" value="a" />
<jsp:setProperty name="loginBean" property="password" value="b" />
<%
    response.sendRedirect(request.getContextPath()+"/login.php");
%>