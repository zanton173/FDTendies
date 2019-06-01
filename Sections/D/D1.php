<?php include 'Queries.php';

$DoThings = new Queries();

if(isset($_POST['submit4'])){
    $partNum = $_POST['partNum4'];
    $linesUsed = $_POST['lines4'];
    $qty = $_POST['quantity4'];
    
    $DoThings->putawayPart($partNum, $linesUsed, 'D1Shelf4', $qty);
}elseif(isset($_POST['submit3'])){
    $partNum = $_POST['partNum3'];
    $linesUsed = $_POST['lines3'];
    $qty = $_POST['quantity3'];
    
    $DoThings->putawayPart($partNum, $linesUsed, 'D1Shelf3', $qty);
    
}elseif(isset($_POST['submit2'])){
    $partNum = $_POST['partNum2'];
    $linesUsed = $_POST['lines2'];
    $qty = $_POST['quantity2'];
    
    $DoThings->putawayPart($partNum, $linesUsed, 'D1Shelf2', $qty);
    
}elseif(isset($_POST['submit1'])){
    $partNum = $_POST['partNum1'];
    $linesUsed = $_POST['lines1'];
    $qty = $_POST['quantity1'];
    
    $DoThings->putawayPart($partNum, $linesUsed, 'D1Shelf1', $qty);
    
}else{
    
    
}

?>
<html>
<body class="bodyBackground">
<head>
<link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
</head>
<h1 class="centering" style="font-size: 15pt; height: 25px">Hine Inventory
	Application</h1>

<div style="height: 150px;">
<h4>Putaway Item Shelf 4 (Top Shelf)</h4>
<form method="post">
	<input type='text' name='partNum4' placeholder='Part Number'>
	<input type='text' name='lines4' placeholder='Lines Used In'>
	<input type='text' name='quantity4' placeholder='Quantity'>
	<input type='submit' name='submit4' placeholder='submit'>
</form>
</div>

<div style="height: 150px;">
<h4>Putaway Item Shelf 3</h4>
<form method="post">
	<input type='text' name='partNum3' placeholder='Part Number'>
	<input type='text' name='lines3' placeholder='Lines Used In'>
	<input type='text' name='quantity3' placeholder='Quantity'>
	<input type='submit' name='submit3' placeholder='submit'>
</form>
</div>
<div style="height: 150px;">
<h4>Putaway Item Shelf 2</h4>
<form method="post">
	<input type='text' name='partNum2' placeholder='Part Number'>
	<input type='text' name='lines2' placeholder='Lines Used In'>
	<input type='text' name='quantity2' placeholder='Quantity'>
	<input type='submit' name='submit2' placeholder='submit'>
</form>
</div>
<div style="height: 75px;">
<h4>Putaway Item Shelf 1 (Floor)</h4>
<form method="post">
	<input type='text' name='partNum1' placeholder='Part Number'>
	<input type='text' name='lines1' placeholder='Lines Used In'>
	<input type='text' name='quantity1' placeholder='Quantity'>
	<input type='submit' name='submit1' placeholder='submit'>
</form>
</div>

<div class="centering">
	<button style="height: 50px;"
		onclick="window.location.href = '../../Home.php';">Home
		Screen</button>
		<button style="height: 50px;"
		onclick="window.location.href = '../../2550.html';">2550 Layout</button>
</div>
</body>
</html>
