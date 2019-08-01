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
<div class="row">

	<form class="d-block justify-content-center" method='post' id='LoginForm'>
	<div class="form-group">
		<input class="form-control col-lg-12" type='text' name='LoginUser' placeholder="Username">
		</div>
		<div class="form-group">
		<input class="form-control col-lg-12" type="password" name='LoginPass' placeholder="Password">
		</div>
		<input class="btn btn-primary" value="Login" type='submit' name='LoginSubmit'>
	</form>

</div>
<div style="height: 75px;"></div>


	

</body>

</html>
