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
	<div class="container">
	<img src="img/car.jpg"/>
		<?php
			if(isset($_POST["signup"]))
			{
				$sql="insert into customer(name,address,P_no,NIC_no,username,password) values('{$_POST["name"]}','{$_POST["address"]}','{$_POST["p_no"]}','{$_POST["nic_no"]}','{$_POST["uname"]}','{$_POST["pass"]}')";
					$res=$db->query($sql);
					if($res)
					{
                        echo "<div class='success'>Insert Success..</div>";
                    }
                    else
                    {
                        echo "<div class='error'>Insert Failed..</div>";
                    }
			}
		?>
		<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					<div class="form-input">
					<input type="text" name="name" required class="input" placeholder="Name">
                    </div>
                    <div class="form-input">
                    <input type="text" name="address" required class="input" placeholder="Address">
                     </div>
                     <div class="form-input">
                    <input type="text" name="p_no" required class="input" placeholder="Phone_No">
                    </div>
                    <div class="form-input">
                    <input type="text" name="nic_no" required class="input" placeholder="NIC_No">
                     </div>
                     <div class="form-input">
                    <input type="text" name="uname" required class="input" placeholder="User Name">
                    </div>
                    <div class="form-input">
					<input type="password" name="pass" required class="input" placeholder="Password">
                    </div>
					<button type="submit" class="btn-login" name="signup">SignUp </button>
				</form>
	</div>
</body>
</html>