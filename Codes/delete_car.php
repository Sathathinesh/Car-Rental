
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
		
				
			if(isset($_POST["delete"]))
			{	$sql1="set autocommit=0";
				$sql2="start transaction";
				$sql3="Delete from car Where id={$_POST["id"]}";
				$sql4="commit";
				$sql5="rollback";	
					$res1=$db->query($sql1);
					$res2=$db->query($sql2);
					$res3=$db->query($sql3);
					
					
					if($res3)
					{
                        echo "<div class='success'>Delete Success..</div>";
						$db->query($sql4);
                    }
                    else
                    {
                        echo "<div class='error'>Delete Failed..</div>";
						$db->query($sql5);
                    }
			}
		?>
		
		<div class="container">
		<h1>Delete Car</h1>
		<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					<div class="form-input">
                    <input type="text" name="id" required class="input" placeholder="Enter car id here">
                    </div>
					
                    
					<button type="submit" class="btn-login" name="delete">Delete Car </button>
				</form>
				</div>
	</div>
</body>
</html>