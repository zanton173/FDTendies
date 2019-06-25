<?php
include '../../Queries.php';
class D1
{
     
}

$DoThings = new Queries();
$thisPage = new D1();

if (isset($_POST['submitPut'])) {
    $partNum = $_POST['partNum'];
    $partNum = preg_replace('(\s)', '', $partNum);
    $qty = $_POST['quantity'];
    $shelfNum = $_POST['shelfNum'];
    $thisPage->location = "D1" . $shelfNum;
    $DoThings->putawayPart($partNum, $thisPage->location, $qty);
}

if(isset($_POST['SubmitPicks'])){
    $partNumPicked = $_POST['PartNumPick'];
    $quantPicked = $_POST['QuantityPick'];
    $locPicked = $_POST['LocationPick'];
    $DoThings->pickItems($partNumPicked, $quantPicked, $locPicked);
    
}
if(isset($_POST['SubmitMove'])){
    $partNumFromMove = $_POST['PartNumFromMove'];
    $locFromMove = $_POST['LocationFromMove'];
    $locToMove = $_POST['LocationToMove'];
    $DoThings->moveParts($partNumFromMove, $locFromMove, $locToMove);
}
if(isset($_POST['SubmitDelete'])){
    $partDel = $_POST['PartNumDelete'];
    $locDel = $_POST['LocationDelete'];
    
    $DoThings->delParts($partDel, $locDel);
}
if(isset($_POST['SubmitChange'])){
    $partNumOld = $_POST['PartNumToChange'];
    $partNumNew = $_POST['NewPartNum'];
    $located = $_POST['PartLocation'];
    $DoThings->partNumChange($partNumOld, $partNumNew, $located);
}
?>
<html>
<body class="bodyBackground">


<head>
<link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
</head>
<h1 class="centering" style="font-size: 15pt; height: 25px">Hine
	Inventory Application</h1><h2 style='color: blue; font-size: 17pt;'>D1</h2>
<div class='centering'>
<h4>Pick Parts</h4>
<form method='post'>

	<input type='text' name='PartNumPick' placeholder='Part Number'>&nbsp;
	<input type='number' name='QuantityPick' placeholder='Quantity'>&nbsp;
	<input type='text' name='LocationPick' placeholder='Location'>&nbsp;
	<input type='submit' name='SubmitPicks'>

</form><br><br>
<h4>Move Parts</h4>
<form method='post'>

	<input type='text' name='PartNumFromMove' placeholder='Part Number to Move'>&nbsp;
	<input type='text' name='LocationFromMove' placeholder='Moving From'>&nbsp;
	
	<input type='text' name='LocationToMove' placeholder='Moving to'>&nbsp;
	<input type='submit' name='SubmitMove'>

</form><br><br>
<h4>Delete Parts</h4>
<form method='post'>

	<input type='text' name='PartNumDelete' placeholder='Part Number'>&nbsp;
		<input type='text' name='LocationDelete' placeholder='Location'>&nbsp;
	<input type='submit' name='SubmitDelete'>

</form><br><br>
<h4>Change Part Number</h4>
<form method='post'>

	<input type='text' name='PartNumToChange' placeholder='Old Part Number'>&nbsp;
	<input type='text' name='NewPartNum' placeholder='New Part Number'>&nbsp;
	<input type='text' name='PartLocation' placeholder='Location'>&nbsp;
	<input type='submit' name='SubmitChange'>

</form><br><br>
</div>
<div style="height: 15px; text-align: center;">
	<h4>Putaway Parts</h4>
	<form method="post">

		<input type='text' name='partNum' placeholder='Part Number'> <input
			type='text' name='quantity' placeholder='Quantity'> <select
			name="shelfNum">
			<option style="width: 100px;" value='Shelf4'>Shelf 4 Top Shelf</option>
			<option style="width: 100px;" value='Shelf3'>Shelf 3</option>
			<option style="width: 100px;" value='Shelf2'>Shelf 2</option>
			<option style="width: 100px;" value='Shelf1'>Shelf 1 Bottom Shelf</option>
		</select> <input type='submit' name='submitPut' placeholder='submit'>
	</form>

</div>

<div style="height: 75px;"></div>

<div>
	<h4>Items on Shelves</h4>
	
	<?php
echo "<center>";

function printTable($shelf, $j)
{
    $query = "SELECT id, partNumber, SUM(qty) AS qty FROM parts WHERE location=CONCAT('D1Shelf', '$j') GROUP BY partNumber ORDER BY partNumber DESC";
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
                echo "<td data-id='$row[partNumber]'>" . $row['partNumber'] . "</td>" . "<td>" . $row['qty'] . "</td>";
                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
        }
    }
}
for ($i = 4; $i > 0; $i --) {
    $shelfNumberPrint = "Shelf" . $i;
    echo "<h5 style='text-decoration: underline; font-weight: bold;'>$shelfNumberPrint</h5>";

    printTable($shelfNumberPrint, $i);
}
echo "</center>";
?> 

</div>

<div class="centering">
	<button style="height: 50px;"
		onclick="window.location.href = '../../Home.php';">Home Screen</button>
	<button style="height: 50px;"
		onclick="window.location.href = '../../2550.php';">2550 Layout</button>

</div>

</body>

</html>
