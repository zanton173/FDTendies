<?php
include '../../NewFile.php';

class Queries
{
    
    function putawayPart($partNumber, $loc, $qty)
    {
        $query = "INSERT INTO parts(partNumber, location, qty) VALUES ('$partNumber', '$loc', '$qty');";
        
        return mysqli_query(NewFile::establishConnection(), $query);
    }
    
}
?>