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
@WebServlet("/feedback")
public class feedback extends HttpServlet 
{
   /**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
   protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException 
   {
      response.setContentType("text/html");
      PrintWriter out = response.getWriter();
      //HttpSession session = request.getSession();
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
         
      out.println("<body>");
      out.println("  <form class='form-register' action="+request.getContextPath()+"/feedback"+" method='post'>");
      out.println("     <div class='form-group'>");
      out.println("        <label for='user'>Name (optional):</label>");
      out.println("        <input class='form-control' type='text' name='name'>");
      out.println("     </div>");
      out.println("     <div class='form-group'>");
      out.println("        <label for='email'>Email:</label>");
      out.println("        <input class='form-control' type='text' name='email'>");
      out.println("     </div>");
      out.println("     <div class='form-group'>");
      out.println("        <label for='feedback'>Feedback:</label></br>");
      out.println("        <textarea style='width:100%; height:20%' name='feedback'></textarea></br>");
      out.println("     </div>");
      out.println("     <div class='buttonHolder'>");
      out.println("        <input type='submit' value='Submit Feedback'/>");
      out.println("     </div>");
      out.println("  </form>");
      out.println("</body>");
      out.println("</html>");
      
      //out.close();
   }

   
   /**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
   protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException 
   {
      doGet(request, response);
      PrintWriter out = response.getWriter();
      HttpSession sess = request.getSession();
      // Get system properties
      String to = request.getParameter("email");
      
      // Sender's email ID needs to be mentioned
      String from = "admin@healthconnect.com";
 
      // Assuming you are sending email from localhost
      String host = "localhost";
 
      // Get system properties
      Properties properties = System.getProperties();
 
      // Setup mail server
      properties.setProperty("mail.smtp.host", host);
 
      // Get the default Session object.
      Session session = Session.getDefaultInstance(properties);
      
      // Set response content type
      response.setContentType("text/html");
      
      String name = request.getParameter("name");
      String email = request.getParameter("email");
      String feedback = request.getParameter("feedback");

      try {
         // Create a default MimeMessage object.
         MimeMessage message = new MimeMessage(session);
         
         // Set From: header field of the header.
         message.setFrom(new InternetAddress(from));
         
         // Set To: header field of the header.
         message.addRecipient(Message.RecipientType.TO, new InternetAddress(to));
         
         // Set Subject: header field
         message.setSubject("Thanks for your feedback!");
         
         

         if(name.equals("")){
             name = "user";
         }
         // Now set the actual message
         message.setText("Dear "+name+",\n\nThank you for your feedback! See your input below:\n\n \""+
            feedback+"\"\n\nSincerely,\n\nHealthConnect Team");
         
         // Send message
         Transport.send(message);
         //String title = "Send Email";
         String res = "A confirmation email has been sent to your inbox.";
         String docType ="<!doctype html public \"-//w3c//dtd html 4.0 " + "transitional//en\">\n";
         
         out.println(docType +
            "<html>\n" +
               "<body bgcolor = \"#f0f0f0\">\n" +
                  "<p align = \"center\">" + res + "</p>\n" +
               "</body></html>");
         sess.setAttribute("name",name);
         sess.setAttribute("email",email);
         sess.setAttribute("feedback",feedback);
         response.sendRedirect("doneFeedback");
      } catch (MessagingException mex) {
         mex.printStackTrace();
         out.println("<p align = \"center\"> Message failed to send. Email address invalid! </p>\n");
      }
      out.close();
   }
}
