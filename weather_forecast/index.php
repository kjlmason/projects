<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Weather API</title>
		<meta name="author" content="Kyle J. L. Mason">
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.css" rel="stylesheet">
	</head>
	
<?php
	session_start();
	$DarkTheme= "bg-dark border-light text-light";
	$LightTheme="bg-light border-dark text-dark";
	$ColorTheme="bg-primary border-secondary text-light";
	$usedTheme=$LightTheme;
	$theme = "";
	
	include "usersettings.php";
	
	if (isset($_GET["theme"]) && isset($_SESSION["theme"]))
	{
		if($_GET["theme"]=="color"){
			$theme = "color";}
		else if($_GET["theme"]=="dark"){
			$theme = "dark";}
		else if($_GET["theme"]=="light"){
			$theme = "light";}
			
		$sql = "UPDATE Users SET theme='".$theme."' WHERE username = '".$username."'";
		$result = $mysqli->query($sql);
		if (!$result) 
		{
			die;
		}
		
		$_SESSION["theme"] = $theme;
			
	}
	else if(isset($_GET["theme"]))
	{
		if($_GET["theme"]=="color"){
			$usedTheme = $ColorTheme;
			setcookie("theme", $ColorTheme);}
		else if($_GET["theme"]=="dark"){
			$usedTheme = $DarkTheme;
			setcookie("theme", $DarkTheme);}
		else if($_GET["theme"]=="light"){
			$usedTheme = $LightTheme;
			setcookie("theme", $LightTheme);}
	}
		
	if (isset($_SESSION["theme"]))
		{
			if($_SESSION["theme"] == "color")
			{
				$usedTheme = $ColorTheme;
			}
			else if($_SESSION["theme"] == "dark")
			{
				$usedTheme = $DarkTheme;
			}
			else if($_SESSION["theme"] == "light")
			{
				$usedTheme = $LightTheme;
			}
		}
	else if (isset($_COOKIE["theme"]))
		{$usedTheme = $_COOKIE["theme"];}
	
	echo "<body class=\"$usedTheme\" >";


	
	
?>
  
<div class="container text-center m-5 mx-auto border rounded">

	<div class="p-4">
		<?php
		if (isset($_SESSION["username"]))
		{
			$username = $_SESSION["username"];
			echo "<p>Hello, $username!</p>";
		}
		?> 
		
		<img class="img-fluid" width="100" height="100" src="img/globe.png" alt="earth">
		<?php include "weather.php"; ?>
	</div>

	<form method="post" action="index.php">
		<p>Enter your ZIP Code</p>
		<input type="number" name="zip">
		<input class="btn-outline" type="submit" value="Submit">
	</form>
  
	<div class="p-4">
		<p>Pick a Theme:</p>
		<a href="?theme=dark">Dark</a>
		<a href="?theme=light">Light</a>
		<a href="?theme=color">Color</a>
	</div>
	
	<div class="text-right">
		<a href="https://lamp.cse.fau.edu/~kmason2019/p7/create_account.php">Register</a>
		<a href="https://lamp.cse.fau.edu/~kmason2019/p7/login.php">Login</a>
	</div>
</div>

  </body>
</html>