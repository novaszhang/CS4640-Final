<?php
    session_start();
    $patToAdd = $_POST["patToAdd"];
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
    
    $dbcheck = "select * from relation where patemail='".$patToAdd."' and docemail='".$doctor."'";
    $dbpatcheck = "select * from patients where email='".$patToAdd."'";
    $dbquery = "insert into relation values ('".$patToAdd."', '".$doctor."')";
    $result = mysqli_query($conn, $dbcheck);
    $result2 = mysqli_query($conn, $dbpatcheck);
    if(mysqli_num_rows($result) > 0){
        echo "Already connected with patient!";
    }
    else if(mysqli_num_rows($result2) == 0){
        echo "Patient does not exist!";
    }
    else{
        $result3 = mysqli_query($conn, $dbquery);
        echo "Successfully connected with patient!";
    }
    header('Location: profileDoc.php#!/patList');
?>