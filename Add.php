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
    die("Connection failed: " . $conn->connect_error);
	}
?>

<!doctype html>
<html>
<head>
<title>sign up</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- latest compiled and minified CSS -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <!-- jquery library -->
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
        <!-- Latest compiled and minified javascript -->
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <!-- External CSS -->
        <link rel="stylesheet" href="css/style.css" type="text/css">
<style>
ul {
	margin-top: 10px;
    list-style-type: none;
    padding: 0;
    overflow: hidden;
    background-color: #333333;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 23.5px;
    text-decoration: none;
	font-size:24px;
	padding-top:35px;
}

li a:hover {
    background-color: #111111;
}

div.menu{
	padding: 2px;
    color: white;
    background-color: black;
    text-align:Center;
}

input{
	width:100%;
	padding:10px 12px;
	margin:auto;
	display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
	
}

b{font-size:22px}

button.log{
	width:100%; padding:15px; font-size:20px; background-color:#4CAF50; color:#F7F3F3
	}
	
button.cancel{
	padding:10px;
	background-color:#F80211;
	color:#F9F7F7;
}

select{
	padding:10px 12px;
	color:#000000;
	width:60%;
}

select:invalid { color:#000000; }

option{
	color:#000000;
}

</style>

<body>
<?php include('header.php'); ?>
<div style="height:7px; background-color:transparent;" class="menu"></div>
<form action="add product.php" style="width:50%; margin:auto; background-color:#f1f1f1;border:10px solid #f1f1f1" method="post">
  <h1 style="font-size:36px; color:#000DFF; text-align:center"> Add a Product</h1>    
    
	<label><b>Name of the Product</b></label> <br>
    
    <input type="text" name="name" placeholder="" required><br><br>
    
    <label><b>Price</b></label> <br>
    
    <input type="int" name="price" placeholder="" required><br><br>
<br>
    
    <label><b>Description</b></label> <br><br>
    
    <input type="text" name="Des" placeholder="" required><br><br><br>
    
        
    <label><b>Image Link</b></label> <br><br>
    
    <input type="text" name="Image" placeholder="The name of the file" required><br><br><br>
    
    <button type="submit" class="log">Submit</button><br><br>
    
    <button type="button" class="cancel"><a href="home.php" style="color:white;text-decoration:none">Cancel</a></button><br><br>
   
   
        
</form>

<br><br><br>
<div style="background-color:#000000; height:3px"></div>

</form>


</body>
</html>
