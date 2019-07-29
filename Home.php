<?php
include 'NewFile.php';

if (isset($_POST['truncate'])) {
    NewFile::dropTable();
}
if(isset($_POST['deleteLogs'])){
    NewFile::dropRecevingLogs();
}

?>
<html>
<body class="bodyBackground">

<a style='color: gray; font-size: 20pt;' href='Login.php'>Login</a>
<head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<h1 class="centering" style="font-size: 15pt;">Hine Inventory
	Application</h1>
<p class='centering'>Logged in as: <?php echo $_SESSION['Username']?></p>	
<div class="tabs">
	<form action="2510.php">
		<input class="btn btn-outline-secondary" type="submit" value="2510 Warehouse" id='2510' />
	</form>

	<form action="2550.php">
		<input class="btn btn-outline-secondary" type="submit" value="2550 Warehouse" id='2550' />
	</form><br><br>
	<form action="ReceivingLog.php">
		<input class="btn btn-outline-secondary" type="submit" name='' value='Incoming Inspection Log' />
	</form>
	<form action="2600.php">
		<input class="btn btn-outline-secondary" type="submit" value='2600 Warehouse' />
	</form><br><br>
	<div class='centering'><form action="PickLists.php">
		<input class="btn btn-outline-secondary" type="submit" value="Pick Lists">
	</form><br><br></div>
	<form action="Home.php" method="post">
		<input class="btn btn-outline-secondary" type="submit" name="truncate"
			value="Remove all dead parts" />
			
	</form>
	<form action="Home.php" method="post">
		<input class="btn btn-outline-secondary" type="submit" name="deleteLogs"
			value="Remove Bad Logs" />
			
	</form>
</div>
<div style="height: 300px;"></div>
<div class="centering">
	<button style="height: 50px;"
		onclick="window.location.href = 'Home.php';">Home Screen</button>
</div>
</body>
</html>