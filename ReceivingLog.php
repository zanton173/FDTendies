<?php
include 'NewFile.php';

class ReceivingLog{
    
    public $submittedLog = false;
  
}

$thisPage = new ReceivingLog();
if (isset($_POST['submitLog'])) {
    
    $refInput = $_POST['reference'];
    $deliveryNumInput = $_POST['deliveryNumber'];
    $supplierInput = $_POST['supplier'];
    $auditorInput = $_POST['auditor'];
    NewFile::createLogEntry($refInput, $deliveryNumInput, $supplierInput, $auditorInput);
}


?>

<html>

<body class='bodyBackground'>

<head>
	<link rel='stylesheet' type='text/css' href='css/bootstrap.css'>
</head>


<h1 class='centering' style='font-size: 15pt;'>Hine Inventory Application</h1>
<h2>Incoming Inspection Log Sheet</h2>
<form method="post">
<table>
<tr>
<th>Hine PO#</th>
<th>Supplier Delivery #</th>
<th>Supplier Name</th>
<th>Audited By</th>
<th>Issues/Comments</th>
</tr>
<tr>
 
<td><input type='text' name='reference' /></td>
<td><input type='text' name='deliveryNumber' /></td>
<td><input type='text' name='supplier' /></td>
<td><input type='text' name='auditor' /></td>
<td><input type='text' name='parts' /></td>
</tr>
</table><br>

<div style="margin: center;"><input type='submit' name='submitLog' /></div><br><br>
</form>





<table>

<?php 
$query = "SELECT dateReceived, hineReference, supplierDelivery, supplierName, auditor FROM inspectionlogs";
$result = mysqli_query(NewFile::establishConnection(), $query);

    if(mysqli_num_rows($result) > 0){
        echo "<tbody>";
        echo "<tr>";
        echo "<th>Date Received</th>";
        echo "<th>Hine PO#</th>";
        echo "<th>Supplier Delivery #</th>";
        echo "<th>Supplier Name</th>";
        echo "<th>Audited By</th>";
        echo "</tr>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['dateReceived'] . "</td>" . "<td>" . $row['hineReference']. "</td>" .  "<td>" . $row['supplierDelivery'] ."</td>" ."<td>" . $row['supplierName'] ."</td>" . "<td>" . $row['auditor'] ."</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    }



?>





</table>

<div style='height:300px;' ></div>
<div class="centering">
	<button style="height: 50px;"
		onclick="window.location.href = 'Home.php';">Home Screen</button>
		
</div>
</body>
</html>