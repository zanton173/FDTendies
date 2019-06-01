<?php
class Queries{


function insertNewPart($partNumber, $linesUsed, $qty){
    $hostname = "localhost";
    $dbusername = "root";
    $dbpass = "";
    $dbname = "hine";

    $connect = mysqli_connect($hostname, $dbusername, $dbpass, $dbname);
    if (!$connect) {
        die("connection failed");
    } else {echo "function in use";}
    $query = "INSERT INTO parts(partNumber, linesUsed, qty) VALUES ('$partNumber', '$linesUsed', '$qty')";
    //$query = "SELECT * FROM parts";
    $result = mysqli_query($connect, $query);
    
    if (!$result) {
        echo "query failed";
    } else {
        echo "Query worked";
    }
}

}

?>