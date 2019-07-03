<!-- // File for random home queries -->
<?php
session_start();

class NewFile
{
  
    
    public static function establishConnection()
    {
      
       
        //$hostname = "192.168.1.179";
        $hostname = "localhost";
        
        
        $dbusername = $_SESSION['Username'];
        $dbpass = $_SESSION['Password'];
        $dbname = "hine";
        $connect = mysqli_connect($hostname, $dbusername, $dbpass, $dbname);

        return $connect;
    }
    public static function login($usr, $pass){
        if ($usr == 'root' AND $pass == ''){
            $_SESSION['Username'] = $usr;
            $_SESSION['Password'] = $pass;
            header('Location: Home.php');         
        }elseif($usr == 'Guest' AND $pass == 'ReadOnly123'){
            $_SESSION['Username'] = $usr;
            $_SESSION['Password'] = $pass;
            header('Location: Home.php'); 
        }else{
        
            echo "<center style='color: red;'>Wrong username or password!</center>";
            
            session_abort();
        }
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
    public static function putaway2600($partNum, $qty){
        $query = "INSERT INTO parts(partNumber, qty, location) VALUES ('$partNum', '$qty', '2600')";
        return mysqli_query(NewFile::establishConnection(), $query);
    }
    public static function transferParts($loc, $partNum){
        $query = "UPDATE parts SET location='$loc' WHERE location='2600' AND partNumber='$partNum'";
        return mysqli_query(NewFile::establishConnection(), $query);
    }
    
}
;
?>



