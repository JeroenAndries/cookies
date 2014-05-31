<?php 
	require_once("html.php");
	
	$user_name ="";
	if (isset($_POST['user_name'])) {
		$user_name = $_POST['user_name'];
		setcookie("user_name", $user_name);
	} 

	if(isset($_COOKIE["user_name"])){
 
		$user_name = $_COOKIE["user_name"];
	}
	

if(isset($_POST['delete']))
{	$user_name ="";
	setcookie("user_name", '',time() - 3600);

}

	
$content = new Div(

				
				new Heading("hallo ". $user_name).
			new Form(
				new Heading("gelieve een naam in te tikken", 2, array("class" => "form-signin-heading")) .
				new Input("user_name", "text", array("class" => "form-control", "placeholder" => "Name")) .
				new Button("Sign in", array("class" => "btn btn-lg btn-primary btn-block", "type" => "submit")).
				new Button("delete", array("class" => "btn btn-lg btn-primary btn-block", "type" => "submit"))
				, array("class" => "form-signin", "method" => "post")

			), array("class" => "container")
		);	
 ?>

 <!DOCTYPE html>
<html>
<head>
	<title>Oefening PHP op POST en GET</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/signup.css">
</head>
<body>
	<?= $content ?>
</body>
</html>