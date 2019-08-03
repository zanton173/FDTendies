<?php
include 'NewFile.php';

class Building2510
{

    public $searchBarData;
}
if (isset($_POST['submitTempDel'])) {
    $tempPartNum = $_POST['tempPartNum'];
    $query = "DELETE FROM parts WHERE partNumber='$tempPartNum' AND location='2510'";
    mysqli_query(NewFile::establishConnection(), $query);
}
?>
<html>
<body class='bodyBackground'>


<head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<h1 class="centering" style="font-size: 15pt; height: 25px;">Hine
	Inventory Application</h1>
<h2 style="font-size: 10pt">Warehouse 2510</h2>
<div class="row">
<form class="form-inline nowrap justify-content-end" method='post'>
	<input class="form-control col-lg-8" name='searchbar' type='text'
		placeholder="Part Number"> &nbsp; <input class="form-control col-lg-3 btn btn-primary" value="Search" type='submit' name='search' />

</form>
</div>
<div style='text-align: center;'>
	<?php
$thisPage = new Building2510();
if (isset($_POST['searchbar'])) {
    if (isset($_POST['search'])) {
        $thisPage->searchBarData = $_POST['searchbar'];
        // $thisPage->searchBarData = preg_replace('(\s)', '', $thisPage->searchBarData);
        $query = "SELECT * FROM parts WHERE partNumber LIKE '%$thisPage->searchBarData%'";
        $result = mysqli_query(NewFile::establishConnection(), $query);
        if (mysqli_num_rows($result) > 0) {
            echo "<table class='tableForShelves'>";
            echo "<tbody>";
            echo "<tr>";
            echo "<th>Part Number</th>" . "<th>Location</th>" . "<th>Quantity</th>";
            echo "</tr>";
            echo "<tr>";
            while ($row = mysqli_fetch_array($result)) {
                echo "<td>" . $row['partNumber'] . "</td>" . '&nbsp;' . "<td>" . $row['location'] . "</td>" . '&nbsp;' . "<td>" . $row['qty'] . "</td>";
                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
        }
    }
}
?></div>
<div class='centering'>

	<table>
		<tr>
			<th colspan='5'>E</th>

		</tr>
		<tr>
			<td><button onclick='window.location.href = "Sections/E/E1.php"'
					class="buttonClass">Section 1</button></td>
			<td><button onclick='window.location.href = "Sections/E/E2.php"'
					class='buttonClass'>Section 2</button></td>
			<td><button onclick='window.location.href = "Sections/E/E3.php"'
					class='buttonClass'>Section 3</button></td>
			<td><button onclick='window.location.href = "Sections/E/E4.php"'
					class='buttonClass'>Section 4</button></td>
			<td><button onclick='window.location.href = "Sections/E/E5.php"'
					class='buttonClass'>Section 5</button></td>
			<td colspan='1' class='classForBlankSpots'>&nbsp;</td>
		</tr>
		<tr>
			<td class='classForBlankSpots' rowspan='2' colspan='6'></td>
			<th colspan='3'>F</th>
		</tr>
		<tr>
			<td><button onclick='window.location.href = "Sections/F/F1.php"'
					class='buttonClass'>Section 1</button></td>
			<td><button onclick='window.location.href = "Sections/F/F2.php"'
					class='buttonClass'>Section 2</button></td>
			<td><button onclick='window.location.href = "Sections/F/F3.php"'
					class='buttonClass'>Section 3</button></td>
		</tr>
		<tr>
			<td style='border: 0;'></td>
			<th colspan='3'>G</th>
		</tr>
		<tr>
			<td style='border: 0;' colspan='1'></td>
			<td><button onclick='window.location.href = "Sections/G/G1.php"'
					class='buttonClass'>Section 1</button></td>
			<td><button onclick='window.location.href = "Sections/G/G2.php"'
					class='buttonClass'>Section 2</button></td>
			<td><button onclick='window.location.href = "Sections/G/G3.php"'
					class='buttonClass'>Section 3</button></td>
		</tr>
		<tr>
			<td class='classForBlankSpots' colspan='6'></td>
			<th colspan='3'>H</th>
		</tr>
		<tr>
			<td style='border: 0;' colspan='6'></td>
			<td><button onclick='window.location.href = "Sections/H/H1.php"'
					class='buttonClass'>Section 1</button></td>
			<td><button onclick='window.location.href = "Sections/H/H2.php"'
					class='buttonClass'>Section 2</button></td>
			<td><button onclick='window.location.href = "Sections/H/H3.php"'
					class='buttonClass'>Section 3</button></td>
		</tr>
		<tr>
			<td style='border: 0;' colspan='3'></td>
			<th>I</th>

		</tr>
		<tr>
			<td style='border: 0;' colspan='3'></td>
			<td><button onclick='window.location.href = "Sections/I/I1.php"'
					class='buttonClass'>Section 1</button></td>

		</tr>
		<tr>
			<td style='border: 0;' colspan='3'></td>
			<td><button onclick='window.location.href = "Sections/I/I2.php"'
					class='buttonClass'>Section 2</button></td>

		</tr>
		<tr>
			<td style='border: 0;' colspan='3'></td>
			<td><button onclick='window.location.href = "Sections/I/I3.php"'
					class='buttonClass'>Section 3</button></td>

		</tr>
	</table>

</div>
<h4>Parts moved from 2600 for Temp Storage</h4>
<div class='centering'>
 <?php

$query = "SELECT location, partNumber, SUM(qty) AS qty FROM parts WHERE location='2510'";
$result = mysqli_query(NewFile::establishConnection(), $query);
if (mysqli_num_rows($result)) {
    echo "<table>";
    echo "<tbody>";
    echo "<tr>";
    echo "<th>Part Number</th>";
    echo "<th>Location</th>";
    echo "<th>Quantity</th>";
    echo "</tr>";
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr><td>$row[partNumber]</td><td>$row[location]</td><td>$row[qty]</td></tr>";
    }
    echo "</tbody>";
    echo "</table>";
    echo "<br>";
}
echo "<div class='centering'>";
echo "<form class='form-inline nowrap justify-content-center' method='post'>";
echo "Delete Temp Parts: &nbsp; <input class='form-control' type='text' name='tempPartNum'>&nbsp;";
echo "<input class='btn btn-primary' value='Submit' type='submit' name='submitTempDel'>";
echo "</form>";
echo "</div>";
echo "<br>";

?> 
</div>
<div class="centering">
	<button class="btn btn-danger" style="height: 50px;"
		onclick="window.location.href = 'Home.php';">Home Screen</button>
</div>
</body>
</html>