<!doctype html>
<?php
    session_start();
    require 'connection.php'; ?>
<html>
<head>
<meta charset="utf-8">
<title>delete</title>
</head>

<body>
<?php
$item_id = $_GET['item_id'];
$user_products_query="delete from items where id='$item_id'";
    $user_products_result=mysqli_query($con,$user_products_query) or die(mysqli_error($con));
header("location: products.php");
?>

</body>
</html>