<?php
include '../../NewFile.php';

class Queries
{

    function putawayPart($partNumber, $loc, $qty)
    {
        $query = "INSERT INTO parts(partNumber, location, qty) VALUES ('$partNumber', '$loc', '$qty');";
        
        return mysqli_query(NewFile::establishConnection(), $query);
    }

    function pickItems($partNum, $qty)
    {
        $query = "UPDATE parts SET qty=qty - '$qty' WHERE partNumber='$partNum'";
        
        return mysqli_query(NewFile::establishConnection(), $query);
    }

    public static function pullData($field, $field2, $field3, $loc, $qtyTaken)
    {
        $query = "SELECT * FROM parts WHERE location='$loc'";
        $result = mysqli_query(NewFile::establishConnection(), $query);
        
         if (mysqli_num_rows($result) > 0) {

            echo "<table style='width: 300px;'>";
            echo "<tbody>";
            echo "<tr><th colspan=4>Pick Item</th></tr>";
            echo "<tr>";
            echo "<th>Part Number</th>";
            echo "<th>Lines Used</th>";
            echo "<th>Quantity</th>";
            echo "<th>Pick Quantity</th>";
            //echo "<th>Submit Pick</th>";
            echo "</tr>";
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $row[$field] . "</td>";
                echo "<br>";
                echo "<td>" . $row[$field2] . "</td>";
                echo "<td>" . $row[$field3] . "</td>";
                echo "<td>" . "<input name='$qtyTaken' type='number' placeholder='Quantity Taken' />";
                ?><form method='post'><button style='width: 150px; height: 25; font-size: 12pt;' name='<?php $_POST['picked']?>' type='button' >Submit Picks</button></form>
                <?php echo "</tr>";
                
            }
            
            echo "</tbody>";
            echo "</table>";
            
        
        
        // mysqli_close(NewFile::establishConnection());
        }
      
    }
}
?>