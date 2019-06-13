<?php
require 'Queries.php';

class E5
{
    
    public $location;
    
    public $setTablePosition = false;
    
    public $qtyPicked;
    
    public $qtyTakeSubmit;
}

$DoThings = new Queries();
$thisPage = new E5();

if (isset($_POST['submitPut'])) {
    $partNum = $_POST['partNum'];
    $partNum = preg_replace('(\s)', '', $partNum);
    $qty = $_POST['quantity'];
    $shelfNum = $_POST['shelfNum'];
    $thisPage->location = "E5" . $shelfNum;
    $DoThings->putawayPart($partNum, $thisPage->location, $qty);
} elseif (isset($_POST['submitPick'])) {
    
    $shelfNum = $_POST['shelfNumSubtract'];
    $thisPage->location = "E5" . $shelfNum;
    $thisPage->setTablePosition = true;
} elseif (isset($_POST['partNumberDropDown'])) {}

?>
<html>
<body class="bodyBackground">


<head>
<link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
</head>
<h1 class="centering" style="font-size: 15pt; height: 25px">Hine
	Inventory Application</h1>

<div style="height: 15px; text-align: center;">
	<h4>Putaway Item</h4>
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
    
    $query = "SELECT partNumber, SUM(qty) AS qty FROM parts WHERE location=CONCAT('E5Shelf', '$j') GROUP BY partNumber ORDER BY qty DESC";
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
	
	
	<!-- <form action='E5.php' method="post">  

	<!--<select style='margin: center' name="shelfNumSubtract"> 
	<!--	<option style="width: 100px;" value='Shelf4'>Shelf 4 Top Shelf</option> 
	<!--	<option style="width: 100px;" value='Shelf3'>Shelf 3</option>
	<!--	<option style="width: 100px;" value='Shelf2'>Shelf 2</option> 
	<!--	<option style="width: 100px;" value='Shelf1'>Shelf 1 Bottom Shelf</option> 
	<!--</select>
	
	
	<input type='submit' name='submitPick' placeholder='submit'> 
	<!--   <?php /* if($thisPage->setTablePosition){Queries::pullData('partNumber', 'linesUsed', 'qty', $thisPage->location, 'qtyPicked');} */?> 

	<!--</form> -->

</div>
<div style="height: 25px;"></div>
<div class="centering">
	<button style="height: 50px;"
		onclick="window.location.href = '../../Home.php';">Home Screen</button>
	<button style="height: 50px;"
		onclick="window.location.href = '../../2510.php';">2510 Layout</button>
</div>

</body>

</html>
