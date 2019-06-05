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
        $dbusername = "root";
        $dbpass = "";
        $dbname = "hine";

        $connect = mysqli_connect($hostname, $dbusername, $dbpass, $dbname);

        return $connect;
    }

    
    public static function dropTable()
    {
        $query = "DELETE FROM parts WHERE partNumber='' OR linesUsed='' OR location='' OR partNumber='gay' OR linesUsed='gay'";
        mysqli_query(NewFile::establishConnection(), $query);
        
    }
}
;
?>


