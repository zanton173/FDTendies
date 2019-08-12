<?php
include 'NewFile.php';

class Building2600
{

    public $searchBarData;
}

if(isset($_POST['2600Submit'])){
    $partNum26 = $_POST['PartNumber2600'];
    $qty26 = $_POST['qty2600'];
    NewFile::putaway2600($partNum26, $qty26);
}
if(isset($_POST['transferSubmit'])){
    $selectWarehouse = $_POST['Warehouses'];
    $partNumTransfer = $_POST['Part'];
    NewFile::transferParts($selectWarehouse, $partNumTransfer);

}
?>
<html>
<body class="bodyBackground">


<head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<h1 class="centering" style="font-size: 15pt; height: 25px;">Hine
	Inventory Application</h1>
<h2 style="font-size: 10pt">Warehouse 2600</h2><br><br>
<div class='centering'>
<h4>Putaway at 2600</h4>
	<form class="form-inline nowarp justify-content-center" method='post'>

		<input class="form-control" type='text' name='PartNumber2600'
			placeholder='Part Number or Description'>&nbsp; <input class="form-control" type='number'
			name='qty2600' placeholder='Quantity'> &nbsp;<input class="btn btn-success" value="Submit" type='submit'
			name='2600Submit'>
		<br><br></form>
		<h4>Move to Other Location</h4>
		<form class="form-inline nowrap justify-content-center" method="post">
		<select class="form-control" name='Warehouses'>
			
			<option value='2550'>2550</option>
			<option value='2510'>2510</option>
			
		
		</select>
		&nbsp;
		<input class="form-control" type='text' name='Part' placeholder='Part Number'>
		&nbsp;
		<input class="btn btn-success" value="Submit" type='submit' name='transferSubmit'>
	</form><br><br><br>
</div>
<?php
echo "<center>";

$query = "SELECT partNumber, SUM(qty) AS qty FROM parts WHERE location like '2600' GROUP BY partNumber";
$result = mysqli_query(NewFile::establishConnection(), $query);

if (mysqli_num_rows($result) > 0) {
    echo "<table class='tableForShelves'>";
    echo "<tbody>";
    echo "<tr>";
    echo "<th>Part Number</th>";
    echo "<th>Quantity</th>";

    echo "</tr>";

    while ($row = mysqli_fetch_array($result)) {

        echo "<tr>";
        echo "<td>" . $row['partNumber'] . "</td><td>" . $row['qty'] . "</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
}

echo "</center>";
?> 

<br><br>
<div class="centering">
	<button class="btn btn-danger" style="height: 50px;"
		onclick="window.location.href = 'Home.php';">Home Screen</button>
</div>
</body>
</html>