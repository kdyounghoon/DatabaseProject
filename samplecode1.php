<?php

$servername = getenv('IP');
$username = getenv('C9_user');
$password = "";
$database = "c9";
#dbport = 3306;

$conn = new mysqli($servername, $username, $password, $database, $dbport);
if($conn->connect_error){
    die("Connection failed: ". $conn->connect_error);
    
}

$sql = "INSERT INTO dep (dept_no, dept_name) VALUES (1, 'dataset')";

if($conn->query($sql) == TRUE){
    echo"New recrod created successfully";
}else {
    echo "Error:" . $sql . "<br>". $conn->error;
}

$conn->close();

?>