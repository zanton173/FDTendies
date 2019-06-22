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
	<form method='post'>

		<input type='text' name='PartNumber2600'
			placeholder='Part Number or Description'> <input type='number'
			name='qty2600' placeholder='Quantity'> <input type='submit'
			name='2600Submit'>
		<br><br>
		<h4>Move to Other Location</h4>
		<select name='Warehouses'>
			
			<option value='2550'>2550</option>
			<option value='2510'>2510</option>
			
		
		</select>
		&nbsp;
		<input type='text' name='Part' placeholder='Part Number'>
		&nbsp;
		<input type='submit' name='transferSubmit'>
	</form><br><br><br>
</div>
<?php
echo "<center>";

$query = "SELECT partNumber, SUM(qty) AS qty FROM parts WHERE location=2600 ORDER BY qty DESC";
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
        echo "<td>" . $row['partNumber'] . "</td>" . "<td>" . $row['qty'] . "</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
}

echo "</center>";
?> 

<div style='height: 150px;'></div>
<div class="centering">
	<button style="height: 50px;"
		onclick="window.location.href = 'Home.php';">Home Screen</button>
</div>
</body>
</html>