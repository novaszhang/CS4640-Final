package mypackage;

import java.io.IOException;
import java.io.PrintWriter;

import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;

import java.io.*;
import java.util.*;
import javax.mail.*;
import javax.mail.internet.*;
import javax.activation.*;
/**
 * Servlet implementation class myFirstServlet
 * (no constructor needed)
 */
@WebServlet("/doneFeedback")
public class doneFeedback extends HttpServlet 
{
   /**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
   protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException 
   {
      response.setContentType("text/html");
      PrintWriter out = response.getWriter();
      HttpSession session = request.getSession();
      out.println("<html>");
      out.println("<head>");
      out.println("  <meta charset='UTF-8'>");
      out.println("  <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>");
      out.print(" <meta name='description' content=''><meta name='keywords' content=''>"+
         "<link rel='stylesheet' href='https://getbootstrap.com/dist/css/bootstrap.min.css'>"+
         "<link href='https://getbootstrap.com/docs/4.0/examples/navbars/navbar.css' rel='stylesheet'>"+
         "<link rel='stylesheet' href='CSS/navBar.css'>"+
         "<link rel='stylesheet' href='CSS/carousel.css'>"+
        "<link rel='stylesheet' href='CSS/register.css'>"+
         "</head>");
      out.print(" <nav class='navbar navbar-expand-lg navbar-dark bg-dark' style='margin-bottom:0px;'>"+
    "<a class='navbar-brand' href='index.php'>HealthConnect</a>"+
    "<button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarsExample05' aria-controls='navbarsExample05' aria-expanded='false' aria-label='Toggle navigation'>"+
        "<span class='navbar-toggler-icon'></span>"+
      "</button>"+
    "<div class='collapse navbar-collapse' id='navbarsExample05'>"+
      "<ul class='navbar-nav mr-auto'>"+
      "</ul>"+
      "<button type='button' class='btn btn-outline-light' id='homeBtn' onclick=\"window.location='index.php'\">Go Home</button>"+
    "</div>"+
  "</nav>");
        
        String name= (String)session.getAttribute("name");
        String email=(String)session.getAttribute("email");
        
        if(name.equals("")){
            name="user";
        }
        out.println("<body>");
        out.println("   <div align='center' style='margin:10%'>");
        out.println("       <h2>Thank you, "+name+"! </h2>");
        out.println("       <p'> A confirmation has been sent to your email: "+email+"</p>");
        out.println("   </div>");
        out.println("   <footer class='container' style='text-align:center'>");
        out.println("       <a href=index.php>Return to Home Page</a>");
        out.println("   </footer>");
        out.println("</body>");
        out.println("</html>");
        out.close(); 
   }

   
   /**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
   protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException 
   {
        
   }
    
}