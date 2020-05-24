<!DOCTYPE html>   <!-- create_account.php -->
<html lang="en">
	<head>
		<title>Create Account</title>
		<link href="css/bootstrap.css" rel="stylesheet">
	</head>
  
  <body>
  
 <div class="container text-center m-5 mx-auto">
<?php

// If POST then create account
if ($_SERVER["REQUEST_METHOD"] == "POST") {

   // Get values submitted from the form
   $username = $_POST["username"];
   $password = $_POST["password"];
       
   // Hash the password
   $passwordHash = password_hash($password, PASSWORD_BCRYPT);

   // Insert username and password hash into Users table
   $mysqli = new mysqli("localhost", "kmason2019", "yqmY6jJaxx", "kmason2019");
   $sql = "INSERT INTO Users VALUES ('" . $mysqli->real_escape_string($username) . "', '$passwordHash','','')";
   if ($mysqli->query($sql)) {
      echo "<p>Your account has been created.</p>",
             "<p><a href='login.php'>Login</a></p></html>";
      die;
   }
   elseif ($mysqli->errno == 1062) {
      echo "<p>The username <strong>$username</strong> already exists.",
         "Please choose another.</p>";
   }
   else {
      die("Error ($mysqli->errno) $mysqli->error");
   }         
}
?>

    <form method="post" action="create_account.php">
      <div>
        <label>Username: <input type="text" name="username" autofocus></label>
      </div>
      <div>
        <label>Password: <input type="password" name="password"></label>
      </div>
      <input type="submit" value="Create Account">
    </form>

</div>
  </body>
</html>