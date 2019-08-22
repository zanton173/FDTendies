<?php
include '../../Queries.php';

class D1
{

    public $action = [
        'pick',
        'move',
        'delete',
        'change',
        'work'
    ];
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

if (isset($_POST['SubmitPicks'])) {
    $partNumPicked = $_POST['PartNumPick'];
    $quantPicked = $_POST['QuantityPick'];
    $locPicked = $_POST['LocationPick'];
    $DoThings->pickItems($partNumPicked, $quantPicked, $locPicked);
}
if (isset($_POST['SubmitMove'])) {
    $partNumFromMove = $_POST['PartNumFromMove'];
    $locFromMove = $_POST['LocationFromMove'];
    $locToMove = $_POST['LocationToMove'];
    $DoThings->moveParts($partNumFromMove, $locFromMove, $locToMove);
}
if (isset($_POST['SubmitDelete'])) {
    $partDel = $_POST['PartNumDelete'];
    $locDel = $_POST['LocationDelete'];

    $DoThings->delParts($partDel, $locDel);
}
if (isset($_POST['SubmitChange'])) {
    $partNumOld = $_POST['PartNumToChange'];
    $partNumNew = $_POST['NewPartNum'];
    $located = $_POST['PartLocation'];
    $DoThings->partNumChange($partNumOld, $partNumNew, $located);
}
if (isset($_POST['SubmitWork'])) {
    $partNumToWork = $_POST['PartNumToWork'];
    $problem = $_POST['problem'];
    $DoThings->partNumberWorkOn($partNumToWork, $problem);
}

if (isset($_POST['selectedAction'])) {
    $action = $_POST['selectAction'];
    echo $action;
}

?>
<html>
<body class="bodyBackground">


<head>
<link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
</head>
<h1 class="centering" style="font-size: 15pt; height: 25px">Hine
	Inventory Application</h1>
<h2 style='color: blue; font-size: 17pt;'>D1</h2>
<div class='centering'>
	<h4>Pick Parts</h4>
	<div class="row">
		<form class="form-inline nowrap justify-content-center" method='post'>

			<input class="form-control" type='text' name='PartNumPick'
				placeholder='Part Number'>&nbsp; <input class="form-control"
				type='number' name='QuantityPick' placeholder='Quantity'>&nbsp; <input
				class="form-control" type='text' name='LocationPick'
				placeholder='Location'>&nbsp; <input class="btn btn-primary"
				value="Submit" type='submit' name='SubmitPicks'>

		</form>
	</div>
	<h4>Move Parts</h4>
	<div class="row">
		<form class="form-inline nowrap justify-content-center" method='post'>

			<input class="form-control" type='text' name='PartNumFromMove'
				placeholder='Part Number to Move'>&nbsp; <input class="form-control"
				type='text' name='LocationFromMove' placeholder='Moving From'>&nbsp;

			<input class="form-control" type='text' name='LocationToMove'
				placeholder='Moving to'>&nbsp; <input class="btn btn-primary"
				value="Submit" type='submit' name='SubmitMove'>

		</form>
	</div>
	<h4>Delete Parts</h4>
	<div class="row">
		<form class="form-inline nowrap justify-content-center" method='post'>

			<input class="form-control" type='text' name='PartNumDelete'
				placeholder='Part Number'>&nbsp; <input class="form-control"
				type='text' name='LocationDelete' placeholder='Location'>&nbsp; <input
				class="btn btn-primary" value="Submit" type='submit'
				name='SubmitDelete'>

		</form>
	</div>
	<h4>Change Part Number</h4>
	<div class="row">
		<form class="form-inline nowrap justify-content-center" method='post'>

			<input class="form-control" type='text' name='PartNumToChange'
				placeholder='Old Part Number'>&nbsp; <input class="form-control"
				type='text' name='NewPartNum' placeholder='New Part Number'>&nbsp; <input
				class="form-control" type='text' name='PartLocation'
				placeholder='Location'>&nbsp; <input class="btn btn-primary"
				value="Submit" type='submit' name='SubmitChange'>

		</form>
	</div>


	<h4>Putaway Parts</h4>
	<div class="row">
		<form class="form-inline nowrap justify-content-center" method="post">

			<input class="form-control" type='text' name='partNum'
				placeholder='Part Number'>&nbsp; <input class="form-control"
				type='text' name='quantity' placeholder='Quantity'> &nbsp;<select
				class="form-control" name="shelfNum">
				<option style="width: 100px;" value='Shelf4'>Shelf 4 Top Shelf</option>
				<option style="width: 100px;" value='Shelf3'>Shelf 3</option>
				<option style="width: 100px;" value='Shelf2'>Shelf 2</option>
				<option style="width: 100px;" value='Shelf1'>Shelf 1 Bottom Shelf</option>
			</select> &nbsp; <input class="btn btn-primary" value="Submit"
				type='submit' name='submitPut' placeholder='submit'>
		</form>


	</div>
	<div style="height: 15px; text-align: center;">
		
		<h4>Submit for Work</h4>
		<div class="row">
			<form class="form-inline nowrap justify-content-center" method="post">

				<input class="form-control" type='text' name='PartNumToWork'
					placeholder='Part Number'>&nbsp; <input class="form-control"
					type="text" name="problem" placeholder="Issue With Part">&nbsp; <input
					class="btn btn-primary" value="Submit" type='submit'
					name='SubmitWork' placeholder='submit'>
			</form>

		</div>
	</div>
</div>
<div style="height: 75px;"></div>
<h4>Select Action</h4>
<form method="post" action="D1.php">

			<table class="tableForShelves">
				<tr>
					<th>Action</th>
					<th>Submit</th>
				</tr>

				<tr>
					<td><select name="selectAction">
							<option value="pick">Pick</option>
							<option value="move">Move</option>
							<option value="delete">Delete</option>
							<option value="change">Change</option>
							<option value="work">Work</option>

					</select></td>
					<td><input class="btn btn-primary" type="submit"
						name="selectedAction" value="submit"></td>
				</tr>
			</table>

		</form>
<h4>Items on Shelves</h4>
	
	<?php

function printTable($shelf, $j)
{
    $sectionObj = new D1();
    $query = "SELECT id, partNumber, SUM(qty) AS qty FROM parts WHERE location=CONCAT('D1Shelf', '$j') GROUP BY partNumber ORDER BY partNumber DESC";
    $result = mysqli_query(NewFile::establishConnection(), $query);
    if ($shelf == "Shelf" . $j) {

        if (mysqli_num_rows($result) > 0) {
            // echo "<form method='post' action='D1.php'>";
            echo "<table class='tableForShelves'>";
            echo "<tbody>";
            echo "<tr>";
            echo "<th>Part Number</th>";
            echo "<th>Quantity</th>";
            echo "<th>Select</th>";

            echo "</tr>";

            while ($row = mysqli_fetch_array($result)) {

                echo "<tr>";
                echo "<td>" . $row['partNumber'] . "</td>" . "<td>" . $row['qty'] . "</td>";
                
                /*
                 * echo "<td><select name='selectAction'>";
                 * foreach ($sectionObj->action as $action){
                 * echo "<option value=$action>" . $action . "</option>";
                 * }
                 * echo "</select></td>";
                 * echo "<td><input class='btn btn-primary' type='submit' name='selectedAction' value='submit'></td>";
                 */

                echo "</tr>";
            }
            // echo "</form>";
            echo "</tbody>";
            echo "</table>";
        }
    }
}
?>

<?php
for ($i = 4; $i > 0; $i --) {
    $shelfNumberPrint = "Shelf" . $i;
    echo "<h5 style='text-decoration: underline; font-weight: bold;'>$shelfNumberPrint</h5>";

    printTable($shelfNumberPrint, $i);
}

?> 

<div class="centering">
	<button class="btn btn-danger" style="height: 50px;"
		onclick="window.location.href = '../../Home.php';">Home Screen</button>
	<button class="btn btn-success" style="height: 50px;"
		onclick="window.location.href = '../../2550.php';">2550 Layout</button>

</div>

</body>

</html>
