
<?php
	
	session_start();
	if(!isset($_SESSION["db_id"]))
	{
		echo"<script>window.open('index.php?mes=Access Denied...','_self');</script>";
		
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title> Login Form in HTML5 and CSS3</title>
	<link rel="stylesheet" a href="css\style.css">
	<?php include"navbar.php";?>
</head>
<body>
<?php
	$db= new mysqli("localhost","{$_SESSION["db_id"]}","{$_SESSION["db_pass"]}","CAR_RENTAL_SYSTEM");		
		
				
			if(isset($_POST["addcar"]))
			{	$sql1="set autocommit=0";
				$sql2="start transaction";
				$sql3="insert into car(hire_rate,no_plate,model,availability) values('{$_POST["hire"]}','{$_POST["no"]}','{$_POST["model"]}','{$_POST["available"]}')";
				$sql4="commit";
				$sql5="rollback";	
					$res1=$db->query($sql1);
					$res2=$db->query($sql2);
					$res3=$db->query($sql3);
					
					
					if($res3)
					{
                        echo "<div class='success'>Insert Success..</div>";
						$db->query($sql4);
                    }
                    else
                    {
                        echo "<div class='error'>Insert Failed..</div>";
						$db->query($sql5);
                    }
			}
		?>
		
		<div class="container">
		<h1>Add Car</h1>
		<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					<div class="form-input">
                    <input type="text" name="model" required class="input" placeholder="Model">
                    </div>
					 <div class="form-input">
                    <input type="text" name="no" required class="input" placeholder="No">
                     </div>
					<div class="form-input">
					<input type="text" name="hire" required class="input" placeholder="Hire Rate">
                    </div>
                   
                     
                    <div class="form-input">
                    <input type="text" name="available" required class="input" placeholder="Availability">
                     </div>
                    
					<button type="submit" class="btn-login" name="addcar">Add Car </button>
				</form>
				</div>
	</div>
</body>
</html>