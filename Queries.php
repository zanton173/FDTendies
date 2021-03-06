<?php
include 'NewFile.php';

class Queries
{
    
    function pickItems($partNum, $qty, $loc)
    {
        $partNum = strtoupper($partNum);
        $query = "UPDATE parts SET qty=qty - '$qty' WHERE partNumber='$partNum' AND location='$loc'";
        return mysqli_query(NewFile::establishConnection(), $query);
    }
    function moveParts($partNumFrom, $locFrom, $locTo){
        $partNumFrom = strtoupper($partNumFrom);
        $query = "UPDATE parts SET location='$locTo' WHERE location='$locFrom' AND partNumber='$partNumFrom'";
        return mysqli_query(NewFile::establishConnection(), $query);
    }
    function delParts($partNum, $loc){
        $partNum = strtoupper($partNum);
        $query = "DELETE FROM parts WHERE partNumber='$partNum' AND location='$loc'";
        return mysqli_query(NewFile::establishConnection(), $query);
    }
    function partNumChange($partOld, $partNew, $loc){
        $partOld = strtoupper($partOld);
        $partNew = strtoupper($partNew);
        $query = "UPDATE parts SET partNumber='$partNew' WHERE partNumber='$partOld' AND location='$loc'";
        return mysqli_query(NewFile::establishConnection(), $query);
    }
    function putawayPart($partNumber, $loc, $qty)
    {
        $partNumber = strtoupper($partNumber);
        $query = "INSERT INTO parts(partNumber, location, qty) VALUES ('$partNumber', '$loc', '$qty') ";
        return mysqli_query(NewFile::establishConnection(), $query);
    }
    function partNumberWorkOn($partNum, $problem){
        $partNumber = strtoupper($partNum);
        $query = "UPDATE parts SET todowork=true, problemDesc='$problem' WHERE partNumber='$partNumber'";
        return mysqli_query(NewFile::establishConnection(), $query);
    }
}
?>