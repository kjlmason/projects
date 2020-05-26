<?php
	session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Guess a Number</title>
	<meta name="description" content="Guess the Number!">
	<meta name="keywords" content="">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
  </head>
  
<body class="bg-dark border-light text-light" style="background:transparent url('image/bg1.png') no-repeat fixed left top /cover;">

<div class="container text-center m-5 mx-auto text-dark">
	<h1 class="py-5">I'm thinking of a number between 1 and 100.</h1>

	<div class="form-group">
		<form method="post" action="index.php">
			<label for="num">Your guess?</label>
			<input class="form-control d-inline-block" type="number" id="num" name="num" min="1" max="100" value="1" style="width:100px" autofocus></br>
			<div class="py-3"><input class="btn btn-dark" type="submit" value="Submit!"></div>
		</form>
	</div>

	<div class="text-primary py-4 font-weight-bold">  
		<?php
		include "guess.php";
		?>
	</div>

</div>
</body>
</html>