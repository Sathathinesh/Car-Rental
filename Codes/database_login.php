
<?php
	
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title> Login Form in HTML5 and CSS3</title>
	<link rel="stylesheet" a href="css\style.css">
	<?php include"navbar.php";?>
</head>
<body>
	<div class="container1">
	<div class="container1 img">
	<img src="img/car.jpg"/>
	<h1>Database Login</h1>
		<?php
			if(isset($_POST["login"]))
			{
				
				$db = new mysqli("localhost","{$_POST["name"]}","{$_POST["pass"]}","CAR_RENTAL_SYSTEM");
					
					if($db)
					{
						$_SESSION["db_id"]=$_POST["name"];
						$_SESSION["db_pass"]=$_POST["pass"];
						
						echo "<script>window.open('admin.php','_self');</script>";
					}
					else
					{
						echo "<div class='error'>Invalid Username or Password</div>";
					}
			}
		?>
		<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					<div class="form-input">
					<input type="text" name="name" required class="input" placeholder="User Name">
					</div>
					<div class="form-input">
					<input type="password" name="pass" required class="input" placeholder="Password"><br>
					</div>
					<button type="submit" class="btn-login" name="login">Login Here</button>
				</form>
	</div>
		</div>
</body>
</html>