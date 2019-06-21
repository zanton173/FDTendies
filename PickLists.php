<?php
include 'NewFile.php';

if (isset($_POST['submitTempDel'])){
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

<h1 class="centering" style="font-size: 15pt; height: 25px;">Hine Inventory
	Application</h1>
	<h2 style="font-size: 10pt">Pick Lists</h2>

<div class="centering">
	<button style="height: 50px;" onclick="window.location.href = 'Home.php';">Home Screen</button>
</div>
</body>
</html>