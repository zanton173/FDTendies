<?php
class Queries{
    
    
    function putawayPart($partNumber, $linesUsed, $loc, $qty){
       
         $hostname = "192.168.1.179";
         $dbusername = "testHine";
         $dbpass = "HineInventory";
         $dbname = "hine";
        
        /* $hostname = "localhost";
        $dbusername = "root";
        $dbpass = "";
        $dbname = "hine"; */
        
        $connect = mysqli_connect($hostname, $dbusername, $dbpass, $dbname);
        if (!$connect) {
            die("connection failed");
        } else {}
        $query = "INSERT INTO parts(partNumber, linesUsed, location, qty) VALUES ('$partNumber', '$linesUsed', '$loc', '$qty')";
        //$query = "SELECT * FROM parts";
        $result = mysqli_query($connect, $query);
        
        if (!$result) {
            echo "query failed";
        } else {
            
        }
    }
    
}

?>