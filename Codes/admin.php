<?php
	
	session_start();
	if(!isset($_SESSION["db_id"]))
	{
		echo"<script>window.open('index.php?mes=Access Denied...','_self');</script>";
		
	}
?>




<html>
<head>

	<title> Login Form in HTML5 and CSS3</title>
	<link rel="stylesheet" a href="css\style.css">
	<?php include"navbar.php";?>

<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}
th{
    background-color: #4CAF50;
    border: 1px solid #dddddd;
  text-align: center;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
tr:nth-child(odd){background-color: #669999}
</style>
</head>
<body>
<br><br>
<?php 
    $db = new mysqli("localhost","{$_SESSION["db_id"]}","{$_SESSION["db_pass"]}","CAR_RENTAL_SYSTEM");
    if(isset($_POST["search1"])){
        $sql="SELECT * FROM car where id={$_POST["id"]}";
        $res=$db->query($sql);
        if (mysqli_num_rows($res) > 0) {
            
            echo "<table>";
               echo "<tr>";
                 echo   "<th>ID</th>";
                 echo   "<th>Hire rate</th>";
                   echo "<th>No Plate</th>";
                    echo "<th>Model</th>";
						echo "<th>Availability</th>";
                echo "</tr>";
                while($row = mysqli_fetch_array($res)){
                echo "<tr>";
                echo "<td>" .$row["id"]. "</td>";
                    echo "<td>".$row["hire_rate"]."</td>";
                  echo  "<td>".$row["no_plate"]."</td>";
                   echo "<td>".$row["model"]."</td>";
				   echo "<td>".$row["availability"]."</td>";
                echo "</tr>";
        }
              echo  "</table>";               
    }else{
        echo "No records matching your query were found.";
    }
	}
	if(isset($_POST["search2"])){
        $sql="SELECT * FROM driver where id={$_POST["id"]}";
        $res=$db->query($sql);
        if (mysqli_num_rows($res) > 0) {
            
            echo "<table>";
               echo "<tr>";
                 echo   "<th>ID</th>";
                 echo   "<th>Name</th>";
                   echo "<th>Nic No</th>";
                    echo "<th>Address</th>";
						echo "<th>Phone No</th>";
						echo "<th>Availability</th>";
                echo "</tr>";
                while($row = mysqli_fetch_array($res)){
                echo "<tr>";
                echo "<td>" .$row["id"]. "</td>";
                    echo "<td>".$row["name"]."</td>";
                  echo  "<td>".$row["NIC_no"]."</td>";
                   echo "<td>".$row["address"]."</td>";
				   echo "<td>".$row["P_No"]."</td>";
				   echo "<td>".$row["available"]."</td>";
                echo "</tr>";
        
		echo  "</table>";  }    }         
    else{
        echo "No records matching your query were found.";
		}
		}
	if(isset($_POST["search3"])){
        $sql="SELECT * FROM bookings";
        $res=$db->query($sql);
        if (mysqli_num_rows($res) > 0) {
            
            echo "<table>";
               echo "<tr>";
                 echo   "<th>ID</th>";
                 echo   "<th>Customer id</th>";
                   echo "<th>Car id</th>";
                    echo "<th>Driver id</th>";
						echo "<th>Req date</th>";
						echo "<th>Req time</th>";
						echo "<th>Pickup location</th>";
						echo "<th>Drop location</th>";
                echo "</tr>";
                while($row = mysqli_fetch_array($res)){
                echo "<tr>";
                echo "<td>" .$row["id"]. "</td>";
                    echo "<td>".$row["customer_id"]."</td>";
                  echo  "<td>".$row["car_id"]."</td>";
                   echo "<td>".$row["driver_id"]."</td>";
				   echo "<td>".$row["req_date"]."</td>";
				   echo "<td>".$row["req_time"]."</td>";
				   echo "<td>".$row["pickup_loc"]."</td>";
				   echo "<td>".$row["drop_loc"]."</td>";
                echo "</tr>";
        }
              echo  "</table>";               
    }else{
        echo "No records matching your query were found.";
    }
	}
    ?>
	<table><td>
	<div class="container">
	
		<h1>View Cars</h1>
				<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					<div class="form-input">
                    <input type="text" name="id" required class="input" placeholder="Enter car id here">
                    </div>
					<button type="submit" class="btn-login" name="search1">Search Car </button>
				</form>
				</div></td><td>
				<div class="container"> 
		<h1>View Drivers</h1>
				<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					<div class="form-input">
                    <input type="text" name="id" required class="input" placeholder="Enter driver id here">
                    </div>
					<button type="submit" class="btn-login" name="search2">Search driver </button>
				</form>
				</div></td>
				<td>
				<div class="container"> 
		<h1>View Bookings</h1>
				<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
					
					<button type="submit" class="btn-login" name="search3">View bookings </button>
				</form>
				</div></td>
				
				</table>
				
</body>
</html>