<?php

include 'NewFile.php';


if (isset($_POST['submitLogin'])){
    
    
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    
    if ($user == NewFile::$dbusername && $pass == NewFile::$dbpass){
        NewFile::establishConnection();
        header("Location: Home.php");
    }else{
        echo "<h2 style='text-align: center;'>Bad Username or Password</h2>";
    }
}

?>


<html>
<body class='bodyBackground'>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>

	<h1>Login</h1>


	<div class='centering'>
		
		<form method='post'>
			<input type='text' placeholder='Username' name='user'><br><br>
			<input type="password" placeholder='Password' name='pass'><br><br>
			<input type='submit' value='Login' name='submitLogin'>
		</form>
	
	
	</div>

</body>
</html>