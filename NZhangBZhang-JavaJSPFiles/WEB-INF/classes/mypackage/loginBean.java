package mypackage;

//all beans must be in package

public class loginBean
{
   private String name;
   private String password;
 
   public loginBean()
   {    	   
      name="";
      password="";
   }
 
   // property "name"
   // naming convention: "get" followed by parameter's name that starts with an upper case
   public String getName() 
   {
      return name;
   }

   // property "name"
   // naming convention: "set" followed by parameter's name that starts with an upper case   
   public void setName(String nm)
   {
      this.name = nm; 
   }
 
   // property "email"
   public String getPassword()
   {
      return password;
   }
 
   public void setPassword(String pw)
   {
      this.password = pw;
   }
}