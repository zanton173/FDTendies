<?php
include 'NewFile.php';

if (isset($_POST['submitTempDel'])) {
    $tempPartNum = $_POST['tempPartNum'];
    $query = "DELETE FROM parts WHERE partNumber='$tempPartNum' AND location='2510'";
    mysqli_query(NewFile::establishConnection(), $query);
}

function createListTable()
{
    $sql = "SELECT name, listparts.listPartNum, listparts.listQty FROM picklist JOIN listparts ON listparts.picklistId = picklist.id";
    $result = mysqli_query(NewFile::establishConnection(), $sql);
    if (mysqli_num_rows($result) > 0) {
        
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['listPartNum'] . "</td>";
            echo "<td>" . $row['listQty'] . "</td>";
            echo "<td><input type='checkbox'></td>";
            echo "</tr>";
        }
    }
}

if(isset($_POST['submitDropPickList'])){
    $sql = "DELETE FROM listparts";
    mysqli_query(NewFile::establishConnection(), $sql);
}

?>
<html>
<body class='bodyBackground'>


<head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>

<h1 class="centering" style="font-size: 15pt; height: 25px;">Hine
	Inventory Application</h1>
<h2 style="font-size: 10pt">Pick Lists</h2>

<div class='centering'>

<table>
<tbody>
<tr>
<th>Name</th>
<th>Part Number</th>
<th>Quantity</th>
<th>Picked</th>
</tr>

<?php createListTable(); ?>

</tbody>

</table>

</div><br><br>
<?php echo "<center>";

echo "<form method='post'><input type='submit' name='submitDropPickList' value='Delete All Lists'></form>";
    
echo "</center><br><br>";?>

<div class="centering">
	<button style="height: 50px;"
		onclick="window.location.href = 'Home.php';">Home Screen</button>
</div>
</body>
</html>
        