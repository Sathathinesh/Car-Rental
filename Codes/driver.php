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
							$s="select * from driver where available='available'";
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
                                      <h1>Name: {$r["name"]} </h1></div> <br>
                                      <div class='zoom'> <p>NIC no:{$r["NIC_no"]}</p></div> <br>
                                     <div class='zoom'> <p>Phone no:{$r["P_No"]}</p></div> <br>
									  <div class='zoom'><p>Address</p>
	                                   <p>{$r["address"]}</p></div><br>
									   <div class='zoom'>
									   <a href='booking.php?driver_id={$r["id"]}&car_id={$_GET["car_id"]}'>Next :Select driver </a>
									   
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