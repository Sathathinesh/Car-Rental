<?php
	include "database.php";
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
	<h1>User Login</h1>
		<?php
			if(isset($_POST["login"]))
			{
				$sql="select * from customer where username='{$_POST["name"]}' and password='{$_POST["pass"]}'";
					$res=$db->query($sql);
					if($res->num_rows>0)
					{
						$ro=$res->fetch_assoc();
						$_SESSION["id"]=$ro["id"];
						$_SESSION["name"]=$ro["name"];
						echo "<script>window.open('home.php','_self');</script>";
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