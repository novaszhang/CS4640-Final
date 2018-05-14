<html>
    <body>
        hello
    </body>
</html>
<?php

$servername = "172-31-63-183";
$username = getenv('C9_USER');
$password = "";
$database = "test";
$dbport = 3306;

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database, $dbport);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create database
$sql = "CREATE DATABASE myDB";
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}

mysqli_close($conn);
?>