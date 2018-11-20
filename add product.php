<?php
ob_start();
session_start();
?>

<?php

	$db_host='localhost';
	$db_User='project';
	$db_pass='12345678';
	$db_name='store';

	$con=mysqli_connect($db_host,$db_User,$db_pass,$db_name);
	
	if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
	}

	$sql= "SELECT name FROM items WHERE name='$_POST[name]'";
	$result = $con->query($sql);
	
	if ($result->num_rows > 0){ ?>
    
	<h1 style="text-align:center; color:#FF0000">	
	<?php	
		echo "Record already exists";
		header("Refresh: .5; URL=admin.php");
	 ?> 
		
      <?php  }
	
	else{
	$sql = "INSERT INTO `items`(`name`,`price`,`Image`,`Description`) VALUES ('$_POST[name]','$_POST[price]','$_POST[Image]','$_POST[Des]')";
		$result = $con->query($sql);
		echo "Item Added Successfully";
		header("Refresh: .5; URL=products.php");

	}
?>
	</h1>
