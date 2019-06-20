<!-- // File for random home queries -->
<?php

class NewFile
{
   
    
    public static function establishConnection()
    {

        // $hostname = "192.168.1.179";
        // $dbusername = "testHine";
        // $dbpass = "HineInventory";
        // $dbname = "hine";
        $hostname = "localhost";
        // USE THESE DATABASE VARIABLES TO LOGIN
        $dbusername = "root";
        $dbpass = "";
        $dbname = "hine";

        $connect = mysqli_connect($hostname, $dbusername, $dbpass, $dbname);

        return $connect;
    }

    public static function dropTable()
    {
        $query = "DELETE FROM parts WHERE partNumber=''";
        mysqli_query(NewFile::establishConnection(), $query);
    }

    public static function dropRecevingLogs()
    {
        $query = "DELETE FROM inspectionlogs WHERE hineReference='' OR supplierDelivery='' OR supplierName=''";
        mysqli_query(NewFile::establishConnection(), $query);
    }

    public static function createLogEntry($ref, $deliveryNum, $supplierName, $auditor)
    {
        $query = "INSERT INTO inspectionlogs(dateReceived, hineReference, supplierDelivery, supplierName, auditor) VALUES (CURRENT_DATE(), '$ref', '$deliveryNum', '$supplierName', '$auditor')";
        mysqli_query(NewFile::establishConnection(), $query);
    }

    
}
;
?>



