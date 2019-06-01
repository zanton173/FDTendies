<?php include 'Queries.php'; 

$DoThings = new Queries();
if(isset($_POST['submit'])){
    
    $partNum = $_POST['partNum'];
    $linesUsed = $_POST['lines'];
    $qty = $_POST['quantity'];
    
    $DoThings->insertNewPart($partNum, $linesUsed, $qty);
}


?>
<html>
<body class="bodyBackground">
<head>
<link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
</head>
<h1 class="centering" style="font-size: 15pt;">Hine Inventory
	Application</h1>

<div style="height: 550px;">
<h4 style='text-align: center;'>Putaway Item</h4>
<form action='B8.php' method="post">
	<input type='text' name='partNum' placeholder='Part Number'>
	<input type='text' name='lines' placeholder='Lines Used In'>
	<input type='text' name='quantity' placeholder='Quantity'>
	<input type='submit' name='submit' placeholder='submit'>
</form>
	
	
</div>

<div class="centering">
	<button style="height: 50px;"
		onclick="window.location.href = '../../Home.html';">Home
		Screen</button>
</div>
</body>
</html>
