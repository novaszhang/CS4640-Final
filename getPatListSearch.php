<?php
    session_start();
    $stringmatch = $_GET["search"];
    $doctor = $_SESSION['user'];
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
    $response = "";
    //$dbquery = "select firstname, lastname from patients p where p.email in (select patemail from relation where docemail='".$doctor."') and (concat(firstname, ' ', lastname) like '".$stringmatch."%'  or concat(lastname, ' ', firstname) like '".$stringmatch."%')";
    $dbquery = "select note, date from notes where docemail='".$_SESSION['user']."' and note like '%".$stringmatch."%' order by date asc";
    $result = mysqli_query($conn, $dbquery);
    $notearray = array();
    if($result != false){
      while($row = mysqli_fetch_array($result)){
        //$response = $response."<a href=''>".$row["firstname"]." ".$row["lastname"]."</a></br>";
        //$response = $response."<p>".$row["note"]."</p></br>";
        $notearray[$row["note"]] = $row["date"];
      } 
    }
    $response = json_encode($notearray);
    if ($response == ""){
        $response = "No suggestions.";
    }
    echo $response;
?>