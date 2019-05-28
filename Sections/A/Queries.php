<?php
//$connection = new mysqli('localhost', 'root', '', 'test');

// if (! $connection) {
//     die("Connection failed");
// }

class insertInto{
    function insertPartNumber($partNumber){
        $sql = "INSERT INTO parts(partNumber) VALUES($partNumber)";
    }
        
    }


?>