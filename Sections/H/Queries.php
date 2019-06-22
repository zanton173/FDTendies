<?php
include '../../NewFile.php';

class Queries
{
    
    function pickItems($partNum, $qty, $loc)
    {
        $query = "UPDATE parts SET qty=qty - '$qty' WHERE partNumber='$partNum' AND location='$loc'";
        return mysqli_query(NewFile::establishConnection(), $query);
    }
    function moveParts($partNumFrom, $locFrom, $locTo){
        $query = "UPDATE parts SET location='$locTo' WHERE location='$locFrom' AND partNumber='$partNumFrom'";
        return mysqli_query(NewFile::establishConnection(), $query);
    }
    function delParts($partNum, $loc){
        $query = "DELETE FROM parts WHERE partNumber='$partNum' AND location='$loc'";
        return mysqli_query(NewFile::establishConnection(), $query);
    }
    function partNumChange($partOld, $partNew, $loc){
        $query = "UPDATE parts SET partNumber='$partNew' WHERE partNumber='$partOld' AND location='$loc'";
        return mysqli_query(NewFile::establishConnection(), $query);
    }
    function putawayPart($partNumber, $loc, $qty)
    {
        $query = "INSERT INTO parts(partNumber, location, qty) VALUES ('$partNumber', '$loc', '$qty')  ";
        return mysqli_query(NewFile::establishConnection(), $query);
    }
    
}
?>