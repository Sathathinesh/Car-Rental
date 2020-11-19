<?php
	include "database.php";
	
	session_start();
	if(!isset($_SESSION["id"]))
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
				
				
				
?>
<style>
table, th, td {
  
  padding: 50px;
  background-color: url("/graphics/background-fabric.jpg");
}
table {
  border-spacing: 20px;
}

.flip-card {
  background-color #00FFFF;
  width: 300px;
  height: 300px;
  perspective: 1000px;
}

.flip-card-inner {
  position: relative;
  width: 100%;
  height: 100%;
  text-align: center;
  transition: transform 0.6s;
  transform-style: preserve-3d;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
}

.flip-card:hover .flip-card-inner {
  transform: rotateY(180deg);
}

.flip-card-front, .flip-card-back {
  position: absolute;
  width: 100%;
  height: 100%;
  backface-visibility: hidden;
}

.flip-card-front {
  background-color: #00FFFF;
  color: black;
}

.flip-card-back {
  background-color: url("/graphics/background-fabric.jpg");
  color: blue;
  transform: rotateY(180deg);
}
.zoom {
  
  
  transition: transform .2s;
 
}

.zoom:hover {
  -ms-transform: scale(1.5); /* IE 9 */
  -webkit-transform: scale(1.5); /* Safari 3-8 */
  transform: scale(1.5); 
}
</style>
<table >
						
						<?php
							$s="select * from car where availability='available'";
							$res=$db->query($s);
							if($res->num_rows>0)
							{
								$i=0;
								while($r=$res->fetch_assoc())
								{
									$i++;
									echo"
									<th style='background-color:grey;'>
									
                                       
                                        
										<div class='zoom'>
                                      <h1>Vehicle No: {$r["no_plate"]} </h1></div> <br>
                                      <div class='zoom'> <p>Vehicle model:{$r["model"]}</p></div> <br>
                                     
									  <div class='zoom'><p>Hire rate</p>
	                                   <p>{$r["hire_rate"]}</p></div><br>
									   <div class='zoom'>
									   <a href='driver.php?car_id={$r["id"]}&customer_id={$_SESSION["id"]}'>Next :Select driver </a>
									   
                                         </div>
                                        
                                        
									</th>";
									
									if($i%3==0){
										echo"<tr></tr>";
									}
								}
							}
							else
							{
								echo "No Record Found";
							}
						
						?>
						
					</table>
</body>
</html>