<?php 
include 'NewFile.php';

class PartsForm{
    
    public $hineRef;
    
}
   
$partsFormObj = new PartsForm();

if (isset($_POST['commitParts'])){
    
    $partNum = $_POST['partNum'];
    $quantityReceived = $_POST['qtyReceived'];
    $partsFormObj->hineRef = $_POST['hineRefDropDown'];
   
    $query = "INSERT INTO partsinlog(partNumReceived, partQuantityReceived, partsId) VALUES('$partNum', '$quantityReceived', '$partsFormObj->hineRef')";
    mysqli_query(NewFile::establishConnection(), $query);
}

?>



<html>
<head>
<link rel='stylesheet' type='text/css' href='css/bootstrap.css'>

</head>
<body class='bodyBackground'>


<h1>Log Parts in Shipment</h1>
<div style='margin: 0' class='centering'>
<?php 

    $query = "SELECT id, hineReference FROM inspectionlogs";
    $result = mysqli_query(NewFile::establishConnection(), $query);
    echo "<form method='post'>";
    echo "<select name='hineRefDropDown'>";
    if (mysqli_num_rows($result)){
        
        while($row = mysqli_fetch_array($result)){
            
            echo "&nbsp;";
            echo "<option value=$row[id]>"  . $row['hineReference'] . "</option>";
        }
       echo "</form>"; 
    }
    echo "</select>"; 
    

?>
&nbsp;


<form method='post'>

  <input type='text' name='partNum' placeholder='Part Number'>
  <input type='number' name='qtyReceived' placeholder='Quantity'>
  <input type='submit' name='commitParts' value='Add'>


</form>
</div>
<div style='height: 50px;'></div>
<div class="centering">
	<button style="height: 50px;"
		onclick="window.location.href = 'Home.php';">Home Screen</button>
		<button style='height: 50px;' onclick='window.location.href = "ReceivingLog.php";'>Logs
			
		</button>

</div>

</body>
</html>