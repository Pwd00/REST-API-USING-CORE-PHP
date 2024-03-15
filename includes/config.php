<?php 

$server="localhost";
$username="root";
$password="";
$database= "users";
try{
    $conn=new PDO("mysql:host=$server;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES,FALSE);
    $conn->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, TRUE);

}catch(PDOException $e){
    echo "Error:".$e->getMessage();
}

?> 