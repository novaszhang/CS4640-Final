<?php
    session_start();
    $patToRem = $_POST["patToRem"];
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
    
    $dbquery = "delete from relation where patemail='".$patToRem."' and docemail='".$doctor."'";
    $result = mysqli_query($conn, $dbquery);
    
    header('Location: profileDoc.php#!/patList');
?>