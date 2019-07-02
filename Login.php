<?php 
include 'NewFile.php';
class Login
{
    
}

if (isset($_POST['LoginSubmit'])){
    $loginUsr = $_POST['LoginUser'];
    $loginPass = $_POST['LoginPass'];
    NewFile::login($loginUsr, $loginPass);
    
}

?>
<html>
<body class='bodyBackground'>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<h1 class="centering" style="font-size: 15pt;">Hine Inventory
	Application</h1>
<div class='centering'>

	<form method='post' id='LoginForm'>
		Username:
		<input type='text' name='LoginUser'><br><br>
		Password:
		<input type="password" name='LoginPass'><br><br>
		<input type='submit' name='LoginSubmit'>
	</form>

</div>
<div style="height: 75px;"></div>


	

</body>

</html>
