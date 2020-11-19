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
		if(!$_GET["car_id"]==null&&!$_GET["driver_id"]==null){
		$_SESSION["car"]=$_GET["car_id"];
		$_SESSION["driver"]=$_GET["driver_id"];}
			if(isset($_POST["book"]))
			{	
				$sql="insert into bookings(customer_id,car_id,driver_id,req_date,req_time,pickup_loc,drop_loc) 
			values('{$_SESSION["id"]}','{$_SESSION["car"]}','{$_SESSION["driver"]}','{$_POST["req_date"]}','{$_POST["req_time"]}','{$_POST["pickup"]}','{$_POST["drop"]}')";
					$res=$db->query($sql);
					$sql2="update car set availability='Not available' where id={$_SESSION["car"]}";
					$sql3="update driver set available='Not available' where id={$_SESSION["driver"]}";
					$res=$db->query($sql2);
					$res=$db->query($sql3);
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
		<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
					<div class="form-input">
					<input type="date" name="req_date">
                    </div>
					<div class="form-input">
					<input type="time" name="req_time">
                    </div>
                    <div class="form-input">
                    <input type="text" name="pickup" required class="input" placeholder="Pickup loc">
                     </div>
					 <div class="form-input">
                    <input type="text" name="drop" required class="input" placeholder="Drop loc">
                     </div>
                     
					<button type="submit" class="btn-login" name="book">Book Car </button>
				</form>
	</div>
</body>
</html>