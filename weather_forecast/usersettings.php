<?php
   // Get name from session
   if(isset($_SESSION["username"]))
   {
   $username = $_SESSION["username"];
   //echo "Hello $username";
       
  // Get user's hashed password from the Users table
   $mysqli = new mysqli("localhost", "kmason2019", "yqmY6jJaxx", "kmason2019");
   $sql = "SELECT username, password, zip, theme FROM Users WHERE username='" . $mysqli->real_escape_string($username) . "'";
   $result = $mysqli->query($sql);
   if (!$result) {;
      die;
   }
   else {
      $row = $result->fetch_assoc();
	  $test = $row["zip"];
	if(!isset($_POST["zip"]))
		{
		$_SESSION["zip"] = $row["zip"];
		}
	if (!isset($_GET["theme"]))
	{
	  $_SESSION["theme"] = $row["theme"];
	}

      } 
   }

?>