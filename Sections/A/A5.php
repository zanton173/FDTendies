<?php
require 'Queries.php';

class A5
{
    
    public $location;
    
    public $setTablePosition = false;
    
    public $qtyPicked;
    
    public $qtyTakeSubmit;
}

$DoThings = new Queries();
$thisPage = new A5();

if (isset($_POST['submitPut'])) {
    $partNum = $_POST['partNum'];
    $linesUsed = $_POST['lines'];
    $qty = $_POST['quantity'];
    $shelfNum = $_POST['shelfNum'];
    $thisPage->location = "A5" . $shelfNum;
    $DoThings->putawayPart($partNum, $linesUsed, $thisPage->location, $qty);
} elseif (isset($_POST['submitPick'])) {
    
    $shelfNum = $_POST['shelfNumSubtract'];
    $thisPage->location = "A5" . $shelfNum;
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

<div style="height: 15px;">
	<h4>Putaway Item</h4>
	<form method="post">

		<input type='text' name='partNum' placeholder='Part Number'> <input
			type='text' name='lines' placeholder='Lines Used In'> <input
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
$shelfNumber = "Shelf4";
echo "<h5 style='text-decoration: underline; font-weight: bold;'>$shelfNumber</h5>";


$query = "SELECT partNumber, linesUsed, qty FROM parts WHERE location='A5Shelf4'";
$result = mysqli_query(NewFile::establishConnection(), $query);
if ($shelfNumber == "Shelf4") {
  
    if(mysqli_num_rows($result) > 0){
        echo "<table class='tableForShelves'>";
        echo "<tbody>";
        echo "<tr>";
        echo "<th>Part Number</th>";
        echo "<th>Lines Used</th>";
        echo "<th>Quantity</th>";
        echo "</tr>";
       
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['partNumber'] . "</td>" . "<td>" . $row['linesUsed']. "</td>" .  "<td>" . $row['qty'] ."</td>" ;
            echo "</tr>";
        }
         
        echo "</tbody>";
        echo "</table>";
    }
 
}
?><?php

$shelfNumber = "Shelf3";
echo "<h5 style='text-decoration: underline; font-weight: bold;'>$shelfNumber</h5>";

$query = "SELECT partNumber, linesUsed, qty FROM parts WHERE location='A5Shelf3'";
$result = mysqli_query(NewFile::establishConnection(), $query);
if ($shelfNumber == "Shelf3") {
    
    if(mysqli_num_rows($result) > 0){
        echo "<table class='tableForShelves'>";
        echo "<tbody>";
        echo "<tr>";
        echo "<th>Part Number</th>";
        echo "<th>Lines Used</th>";
        echo "<th>Quantity</th>";
        echo "</tr>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['partNumber'] . "</td>" . "<td>" . $row['linesUsed']. "</td>" .  "<td>" . $row['qty'] ."</td>" ;
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    }
}

?>
	<?php
$shelfNumber = "Shelf2";
echo "<h5 style='text-decoration: underline; font-weight: bold;'>$shelfNumber</h5>";
$query = "SELECT partNumber, linesUsed, qty FROM parts WHERE location='A5Shelf2'";
$result = mysqli_query(NewFile::establishConnection(), $query);
if ($shelfNumber == "Shelf2") {
    if(mysqli_num_rows($result) > 0){
        echo "<table class='tableForShelves'>";
        echo "<tbody>";
        echo "<tr>";
        echo "<th>Part Number</th>";
        echo "<th>Lines Used</th>";
        echo "<th>Quantity</th>";
        echo "</tr>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['partNumber'] . "</td>" . "<td>" . $row['linesUsed']. "</td>" .  "<td>" . $row['qty'] ."</td>" ;
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    }
}

?>
	<?php
$shelfNumber = "Shelf1";
echo "<h5 style='text-decoration: underline; font-weight: bold;'>$shelfNumber</h5>";

$query = "SELECT partNumber, linesUsed, qty FROM parts WHERE location='A5Shelf1'";
$result = mysqli_query(NewFile::establishConnection(), $query);
if ($shelfNumber == "Shelf1") {
    if(mysqli_num_rows($result) > 0){
        echo "<table class='tableForShelves'>";
        echo "<tbody>";
        echo "<tr>";
        echo "<th>Part Number</th>";
        echo "<th>Lines Used</th>";
        echo "<th>Quantity</th>";
        echo "</tr>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['partNumber'] . "</td>" . "<td>" . $row['linesUsed']. "</td>" .  "<td>" . $row['qty'] ."</td>" ;
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    }
}
echo "</center";
?>
	
	
	<!-- <form action='A5.php' method="post">  

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
		onclick="window.location.href = '../../2550.html';">2550 Layout</button>
</div>

</body>

</html>
