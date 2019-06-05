<?php
include 'NewFile.php';

if (isset($_POST['truncate'])) {
    NewFile::dropTable();
}

?>
<html>
<body class="bodyBackground">


<head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<h1 class="centering" style="font-size: 15pt;">Hine Inventory
	Application</h1>
<div class="tabs">
	<form action="2510.html">
		<input class="input" type="submit" value="2510 Warehouse" id='2510' />
	</form>

	<form action="2550.php">
		<input class="input" type="submit" value="2550 Warehouse" id='2550' />
	</form>
	<form action="Home.php" method="post">
		<input class="input" type="submit" name="truncate"
			value="Remove all dead parts" />
			
	</form>
</div>
<div style="height: 550px;"></div>
<div class="centering">
	<button style="height: 50px;"
		onclick="window.location.href = 'Home.php';">Home Screen</button>
</div>
</body>
</html>