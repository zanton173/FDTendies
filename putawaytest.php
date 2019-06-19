<?php
include 'NewFile.php';

class PutawayTest
{
    public $putawayPartNumber;
    public $putawayQuantity;
    public $shelfLoc;
}

$thisPage = new PutawayTest();
?>


<html>
<body class='bodyBackground'>

<head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<div style='height: 150px;'></div>
<div style='text-align: center;'>
<form method='post'>
	<input type='text' name='partNumber' placeholder='Part Number For Loc B8'>
	<input type="number" name='qty' placeholder='Quantity'>
	<select
			name="shelfNum">
			<option style="width: 100px;" value='Shelf4'>Shelf 4 Top Shelf</option>
			<option style="width: 100px;" value='Shelf3'>Shelf 3</option>
			<option style="width: 100px;" value='Shelf2'>Shelf 2</option>
			<option style="width: 100px;" value='Shelf1'>Shelf 1 Bottom Shelf</option>
		</select> 
	<input type='submit' name='submit'> 
</form>
</div>
<div style='text-align: center;'><?php
if (isset($_POST['submit'])){
    $thisPage->putawayPartNumber = $_POST['partNumber'];
    $thisPage->putawayQuantity = $_POST['qty'];
    $thisPage->shelfLoc = $_POST['shelfNum'];
    $query = "UPDATE location SET locName=CONCAT(locName, '$thisPage->shelfLoc'), qtyInLoc='$thisPage->putawayQuantity', partsInLoc='$thisPage->putawayPartNumber'";
    mysqli_query(NewFile::establishConnection(), $query);
}
?></div>
<?php
echo "<center>";

function printTable($shelf, $j)
{
    
    $query = "SELECT partsInLoc, qtyInLoc FROM location WHERE locName=CONCAT(locName, '$shelf')";
    $result = mysqli_query(NewFile::establishConnection(), $query);
    if ($shelf == "Shelf" . $j) {

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
    }
}
for ($i = 4; $i > 0; $i--) {
    $shelfNumberPrint = "Shelf" . $i;
    echo "<h5 style='text-decoration: underline; font-weight: bold;'>$shelfNumberPrint</h5>";

    printTable($shelfNumberPrint, $i);
}
echo "</center>";

?> 
<div style='height: 200px;'></div>
<div class="centering">
	<button style="height: 50px;"
		onclick="window.location.href = 'HomeSecond.php';">Home Screen</button>
</div>
</body>
</html>