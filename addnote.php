<?php
    session_start();
    $note = $_POST["newNote"];
    $date = date("Y-m-d");
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
    
    $dbquery = "insert into notes values ('".$doctor."', '".$note."', '".$date."')";
    
    $result = mysqli_query($conn, $dbquery);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>