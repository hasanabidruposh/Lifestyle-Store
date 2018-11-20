<?php
    session_start();
    require 'check_if_added.php';
	require 'connection.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="img/lifestyleStore.png" />
        <title>Shopper's World</title>
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
            <div class="container">
                <div class="jumbotron">
                    <h1>Welcome to our Shopper's World!</h1>
                    <p>We have the best cameras, watches and shirts for you. No need to hunt around, we have all in one place.</p>
                </div>
            </div>
            <div class="container">
                <div class="row">
                   <?php
	$sql = "SELECT * FROM `items`";
	
	$result = mysqli_query($con, $sql);
while($row = mysqli_fetch_assoc($result)){
	$item_id=$row["id"];	
	
	//echo $id." ".$row['Image']."<br>";
	?>
                    <div class="col-md-3 col-sm-6">
                        <div class="thumbnail">
                            <a href="cart.php">
                                <img src="img/<?php echo $row['Image']; ?>">
                            </a>
                            <center>
                                <div class="caption">
                                    <h3><?php echo $row['name']; ?></h3>
                                    <p>Price: BDT <?php echo $row['price']."/-"; ?> </p>
                                    
                                <?php   	if(isset($_SESSION['id'])) {
									$id = $_SESSION['id'];
				
								} ?>
                                    
                                    <?php
										if($id == 4){
										?>
										<p><a href="delete.php?item_id=<?php echo $item_id; ?>" role="button" class="btn btn-primary btn-block">Delete item</a></p>
										<?php
									}
									else{
										if(!isset($_SESSION['email'])){  ?>
                                        <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                                        <?php
                                        }
                                        else{
                                            if(check_if_added_to_cart($item_id)){
                                                echo '<a href="#" class=btn btn-block btn-success disabled>Added to cart</a>';
                                            }else{
                                                ?>
                                                <a href="cart_add.php?id=<?php echo $item_id; ?>" class="btn btn-block btn-primary" name="add" value="add" class="btn btn-block btr-primary">Add to cart</a>
                                                <?php
                                            }
                                        }}
                                        ?>
                                    
                                </div>
                            </center>
                        </div>
                    </div>
                    <?php } ?>
</div>
                <div class="row"> </div>
                <div class="row"> </div>
            </div>
            <br><br><br><br><br><br><br><br>
           <footer class="footer">
               <div class="container">
               <center>
                   <p>Copyright &copy Shopper's World. All Rights Reserved. | Contact Us: +01521223374</p>
                   <p>This website is developed by Arafatur Rahman</p>
               </center>
               </div>
           </footer>
        </div>
    </body>
</html>
