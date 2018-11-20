<?php
    session_start();
    require 'connection.php';
    if(!isset($_SESSION['email'])){
        header('location:index.php');
    }else{
        $user_id=$_GET['idd'];
		$item = "select price from items INNER JOIN users_items on items.id = users_items.item_id WHERE users_items.user_id = {$user_id}";
		$result = mysqli_query($con, $item) or die(mysqli_error($con));
		$n = 0;
		echo $user_id."<br>";
		while($row = mysqli_fetch_array($result)) {
			$k=$row['price'];
			echo "price: ".$k."<br>";
			$n = $n + $k;
			echo $n."<br>";
		}
		
		$user_balanceq = "select * from bank_account bc INNER JOIN users u on bc.account = u.account WHERE u.id = {$user_id}";
		$user_balance = mysqli_query($con, $user_balanceq) or die(mysqli_error($con));
		$balance = 0;
		$accountno = 0;
		while($row = mysqli_fetch_array($user_balance)) {
			$balance = $row['balance'];
			$accountno = $row['account'];
		}
		
		if($balance<$n){
			echo "Not enough balance";
		}
		else {
			$balance = $balance - $n;
			$update = "UPDATE bank_account SET balance = {$balance} WHERE account={$accountno}";
			$updateq = mysqli_query($con, $update) or die(mysqli_error($con));
			echo "updated ".$balance."<br>";
		}
        $confirm_query="delete from users_items where user_id=$user_id";
        $confirm_query_result=mysqli_query($con,$confirm_query) or die(mysqli_error($con));
        
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="img/lifestyleStore.png" />
        <title>Lifestyle Store</title>
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
    </head>
    <body>
        <div>
            <?php
                require 'header.php';
            ?>
            <br>
            <div class="container">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading"></div>
                            <div class="panel-body">
                                <p>Your order is confirmed. Thank you for shopping with us. <a href="products.php">Click here</a> to purchase any other item.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
               <div class="container">
               <center>
                   <p>Copyright &copy Lifestyle Store. All Rights Reserved. | Contact Us: +91 90000 00000</p>
                   <p>This website is developed by Arafatur Rahman & Hasan Abid</p>
               </center>
               </div>
           </footer>
        </div>
    </body>
</html>
