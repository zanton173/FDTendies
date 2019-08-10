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
<div class="container-fluid">
<a class="btn btn-secondary mx-3 my-3 col-lg-1" href='Login.php'>Login</a>
</div>
<head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<h1 class="centering" style="font-size: 25pt;">Hine Inventory
	Application</h1>
<p class='centering'>Logged in as: <?php echo $_SESSION['Username']?></p>	
<div class="container">
<div class="tabs">
	<form action="2510.php">
		<input class="btn btn-success btn-lg" type="submit" value="2510 Warehouse" id='2510' />
	</form>

	<form action="2550.php">
		<input class="btn btn-success btn-lg btn-lg" type="submit" value="2550 Warehouse" id='2550' />
	</form><br><br>
	<form action="ReceivingLog.php">
		<input class="btn btn-success btn-lg" type="submit" name='' value='Incoming Inspection Log' />
	</form>
	<form action="2600.php">
		<input class="btn btn-success btn-lg" type="submit" value='2600 Warehouse' />
	</form><br><br>
	<div class='centering'><form action="PickLists.php">
		<input class="btn btn-success btn-lg" type="submit" value="Pick Lists">
	</form><br><br></div>
	<form action="Home.php" method="post">
		<input class="btn btn-success btn-lg" type="submit" name="truncate"
			value="Remove all dead parts" />
			
	</form>
	<form action="Home.php" method="post">
		<input class="btn btn-success btn-lg" type="submit" name="deleteLogs"
			value="Remove Bad Logs" />
			
	</form><br><br>
	<form action="ToDoWork.php" method="post">
		<input class="btn btn-success btn-lg" type="submit" value="TO DO">
	</form>
	</div>
</div>
<br><br>
<div class="centering">
	<button class="btn btn-danger" style="height: 50px;"
		onclick="window.location.href = 'Home.php';">Home Screen</button>
</div>
</body>
</html>