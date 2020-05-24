<!DOCTYPE html>   <!-- login.php -->
<html lang="en">
	<head>
		<title>Login</title>
		<link href="css/bootstrap.css" rel="stylesheet">
	</head>
  <body>
 
 <div class="container text-center m-5 mx-auto">
<?php
session_start();
// If POST then check submitted username and password
if ($_SERVER["REQUEST_METHOD"] == "POST") {

   // Get values submitted from the form
   $username = $_POST["username"];
   $password = $_POST["password"];
       
  // Get user's hashed password from the Users table
   $mysqli = new mysqli("localhost", "kmason2019", "yqmY6jJaxx", "kmason2019");
   $sql = "SELECT username, password FROM Users WHERE username='" . $mysqli->real_escape_string($username) . "'";
   $result = $mysqli->query($sql);
   if (!$result) {
      die("Error executing query: ($mysqli->errno) $mysqli->error");
   }
   elseif ($result->num_rows == 0) {
      echo "<p>Incorrect username or password.</p>";
   }
   else {
      $row = $result->fetch_assoc();

      // See if submitted password matches the hash stored in the Users table    
      if (password_verify($password, $row["password"])) {
         $_SESSION["username"] = $username;
         header("Location: index.php");
         die;
      } 
      else {
         echo "<p>Incorrect username or password.</p>";
      }
   }
}
?>

    <form method="post" action="login.php">
      <div>
        <label>Username: <input type="text" name="username" autofocus></label>
      </div>
      <div>
        <label>Password: <input type="password" name="password"></label>
      </div>
      <input type="submit" value="Login">
    </form>
</div>
  </body>
</html>