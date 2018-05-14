<?php
    session_start();
    $patient = $_GET["pat"];
    $servername = getenv('IP');
    $username = getenv('C9_USER');
    $password = "slobodanka";
    $database = "myDB";
    $dbport = 3306;
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database, $dbport);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    $dbquery = "select * from patients where email=\"".$patient."\"";
    $result = mysqli_query($conn, $dbquery);
    if($result != false){
      while($row = mysqli_fetch_array($result)){
        print json_encode($row);
      } 
    }
?>