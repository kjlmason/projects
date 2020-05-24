<!DOCTYPE html>
<html>
  <head>
    <title>Guess a Number</title>
	
	<link href="css/bootstrap.css" rel="stylesheet">
  </head>
<body class="bg-dark border-light text-light">

<div class="container text-center m-5 mx-auto border rounded">

	<form method="post" action="index.php">
		<h1 class="p-4">I'm thinking of a number between 1 and 10.</h1>
		<p>Your guess? <input type="number" name="num" min="1" max="10" autofocus></p>
		<input type="submit" value="Guess">
	</form>

	<div class="text-primary p-4 font-weight-bold">  
		<?php include "guess.php";?>
	</div>

</div>
</body>
</html>