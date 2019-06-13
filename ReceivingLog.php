<?php
include 'NewFile.php';

class ReceivingLog
{

    public $submittedLog = false;

    public $doneParts = false;
}
$thisPage = new ReceivingLog();
/*
 * function addPartsToLog($ref){
 * echo "<td><form method='post'><input type='text' name='partNum' placeholder='Part Number'>" . "(" . "<input type='number' name='partQuantityReceived' placeholder='Quantity'>" . ")" . "<input type='submit' name='commitParts' value='Add'></form>";
 *
 * if(isset($_POST['commitParts'])){
 *
 * $partsAdded = $_POST['partNum'];
 * $quantityAdded = $_POST['partQuantityReceived'];
 * echo $partsAdded . $quantityAdded;
 *
 * $queryCommit = "UPDATE inspectionlogs SET partNumReceived='$partsAdded', partQuantityReceived='$quantityAdded' WHERE hineReference='$ref'";
 *
 * mysqli_query(NewFile::establishConnection(), $queryCommit);
 *
 * }
 * }
 */

if (isset($_POST['submitLog'])) {
    // $thisPage->submittedLog = true;
    header('Location: PartsForm.php');
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


<h1 class='centering' style='font-size: 15pt;'>Hine Inventory
	Application</h1>
<h2>Incoming Inspection Log Sheet</h2>
<form method="post">
	<table>
		<tr>
			<th>Hine PO#</th>
			<th>Supplier Delivery #</th>
			<th>Supplier Name</th>
			<th>Audited By</th>

		</tr>
		<tr>

			<td><input type='text' name='reference' /></td>
			<td><input type='text' name='deliveryNumber' /></td>
			<td><input type='text' name='supplier' /></td>
			<td><input type='text' name='auditor' /></td>

		</tr>
	</table>
	<br>

	<div style="margin: center;">
		<input type='submit' name='submitLog' /> <a href="PartsForm.php">Edit
			Logs</a>
	</div>
	<br> <br>
</form>
<?php
// join test
/*
 * SELECT dateReceived, hineReference, supplierDelivery, supplierName, auditor, partNumReceived, partQuantityReceived FROM
 * inspectionlogs
 * JOIN partsinlog
 * ON
 * inspectionlogs.id = partsinlog.partsId
 * GROUP BY hineReference
 * ORDER BY dateReceived;
 */

// $query = "SELECT dateReceived, hineReference, supplierDelivery, supplierName, auditor, partNumReceived, partQuantityReceived FROM inspectionlogs JOIN ON inspectionlogs. partsinlog GROUP BY hineReference ORDER BY dateReceived";

/*
 * $query = "SELECT dateReceived,
 * hineReference,
 * supplierDelivery,
 * supplierName,
 * auditor,
 * partNumReceived,
 * partQuantityReceived
 * FROM inspectionlogs
 * JOIN partsinlog
 * ON
 * inspectionlogs.id = partsinlog.partsId
 * GROUP BY hineReference
 * ORDER BY dateReceived";
 */

$query = "SELECT partsId,
 dateReceived, 
hineReference, 
supplierDelivery, 
supplierName, 
auditor, 
partNumReceived, 
partQuantityReceived 
FROM inspectionlogs 
JOIN partsinlog 
ON inspectionlogs.id = partsinlog.partsId 
ORDER BY partsId, dateReceived";
$result = mysqli_query(NewFile::establishConnection(), $query);
if (mysqli_num_rows($result) > 0) {

    echo "<table>";
    echo "<tbody>";
    echo "<tr>";
    echo "<th>Date Received</th>";
    echo "<th>Hine PO#</th>";
    echo "<th>Supplier Delivery #</th>";
    echo "<th>Supplier Name</th>";
    echo "<th>Audited By</th>";
    echo "<th>Parts</th>";
    echo "</tr>";

    while ($row = mysqli_fetch_array($result)) {

        echo "<tr>";
        echo "<td>" . $row['dateReceived'] . "</td>" . "<td>" . $row['hineReference'] . "</td>" . "<td>" . $row['supplierDelivery'] . "</td>" . "<td>" . $row['supplierName'] . "</td>" . "<td>" . $row['auditor'] . "</td>";
        echo "<td>";
        
        //echo "<a class='table' href='PartsLogged.php'>Click Here For Details</a>";
        echo "$row[partNumReceived]" . "(" . $row['partQuantityReceived'] . ")" . "<br>";
               
        echo "</td>";
        echo "</tr>";
           }

    echo "</tbody>";
    echo "</table>";
}

?>

<div style='height: 75px;'></div>
<div class="centering">
	<button style="height: 50px;"
		onclick="window.location.href = 'Home.php';">Home Screen</button>

</div>
</body>
</html>