<?php 
include 'NewFile.php';

class ToDoWork{
    
}
?>
<html>
<body class="bodyBackground">
<div class="container-fluid">
<a class="btn btn-secondary mx-3 my-3 col-lg-1" href='Login.php'>Login</a>
</div>
<head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<h1 class="centering" style="font-size: 25pt;">Hine Inventory
	Application</h1>
<p class='centering'>Logged in as: <?php echo $_SESSION['Username']?></p>
<div class="centering">
<?php 

$query = "SELECT partNumber, problemDesc, location FROM parts WHERE todowork=true";
$result = mysqli_query(NewFile::establishConnection(), $query);
if (mysqli_num_rows($result)) {
    echo "<table>";
    echo "<tbody>";
    echo "<tr>";
    echo "<th>Part Number</th>";
    echo "<th>Problem</th>";
    echo "<th>Location</th>";
    echo "</tr>";
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr><td>$row[partNumber]</td><td>$row[problemDesc]</td><td>$row[location]</td></tr>";
    }
    echo "</tbody>";
    echo "</table>";
    echo "<br>";
}

?>
</div>
<div class="centering">
	<button class="btn btn-danger" style="height: 50px;"
		onclick="window.location.href = 'Home.php';">Home Screen</button>
</div>
</body>
</html>
