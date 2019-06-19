<?php
require 'Queries.php';

class D1
{
    
    public $location;
    
    public $setTablePosition = false;
    
    public $qtyRowId;
    
    public $qtyTakeSubmit;
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
if (isset($_POST['pickSubmit'])) {
    $qtyPick = $_POST['qtyMan'];
    
    $query = "UPDATE parts SET qty=qty-$qtyPick";
    //echo $thisPage->qtyRowId;
    //echo $qtyPick;
    //print_r($thisPage->qtyRowId);
    mysqli_query(NewFile::establishConnection(), $query);
}


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
    $thisPage = new D1();
    $query = "SELECT id, partNumber, SUM(qty) AS qty FROM parts WHERE location=CONCAT('D1Shelf', '$j') GROUP BY partNumber ORDER BY qty DESC";
    $result = mysqli_query(NewFile::establishConnection(), $query);
    if ($shelf == "Shelf" . $j) {

        if (mysqli_num_rows($result) > 0) {
            echo "<table class='tableForShelves'>";
            echo "<tbody>";
            echo "<tr>";
            echo "<th>Part Number</th>";
            echo "<th>Quantity</th>";
            echo "<th>Pick Quantity</th>";
            echo "</tr>";

            while ($row = mysqli_fetch_array($result)) {
                
                echo "<tr>";
                echo "<td data-id='$row[partNumber]'>" . $row['partNumber'] . "</td>" . "<td>" . $row['qty'] . "</td>"; 
                echo "<td><form method='post'>";
                
               // echo "<input type='number' name='qtyMan' ><input type='submit' name='pickSubmit' value='Pick'></form>"; 
                echo "</td>";
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
	
	
	<!-- <form action='D1.php' method="post">  

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
		onclick="window.location.href = '../../2550.php';">2550 Layout</button>
</div>

</body>

</html>
