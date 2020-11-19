<div class="navbar">

			<ul class="list">
				<b style="color:white;float:left;line-height:50px;margin-left:15px;font-family:Cooper Black;">
				Car Rental System</b>
			<?php
				
				if(isset($_SESSION["id"]))
				{
					echo'
				
						<li><a href="home.php">Home</a></li>
				
				<li><a href="logout.php">Log out</a></li>
				
					';
				}
				else if(isset($_SESSION["db_id"]))
				{
					echo'
						<li><a href="add_car.php">Add car</a></li>
						<li><a href="update_car.php">Update car</a></li>
						<li><a href="delete_car.php">Delete car</a></li>
						<li><a href="add_driver.php">Add driver</a></li>
						<li><a href="update_driver.php">Update driver</a></li>
						<li><a href="delete_driver.php">Delete driver</a></li>
						<li><a href="admin.php">Admin Home</a></li
						<li><a href="logout.php">Log out</a></li>
				
					';
				}
				else
				{
				echo'
					<li><a href="database_login.php">Database Login</a></li>
					<li><a href="index.php">Login</a></li>
					<li><a href="Signup.php">Signup</a></li>';
				}
				
				
			?>
				
			</ul>
		</div>
		