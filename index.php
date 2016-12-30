<?php 
session_start();
include 'header.php'; ?>

	<div class="cart-list" style="border-bottom: 2px dotted green">
		
		<center><h3>Shopping Cart</h3></center>
		Number of items: <?php echo count($_SESSION["cart_item"]); ?><br>
		<a href="view_cart.php">View Cart</a>

	</div>

	<center><h3>List of Products</h3></center>

<?php
require_once('mysqli_connect.php');
$sql = "SELECT * FROM tblproduct ORDER BY id ASC";
$result = mysqli_query($dbc, $sql);
if($result){

	while($product_array = mysqli_fetch_array($result)){ ?>
		<div class="item-product">
			<form method="post" action="add_to_cart.php?action=add&code=<?php echo $product_array["code"]; ?>">
				<div class="item-image"><img src="<?php echo $product_array["image"]; ?>"></div>
				<div><strong><?php echo $product_array["name"]; ?></strong></div>
				<div class="item-price"><?php echo $product_array["price"]; ?></div>
				<div><input type="text" name="quantity" value="1" size="2" /><input type="submit" value="Add to cart" class="btnAddAction" /></div>
			</form>
		</div>


	<?php	} ?>

<?php } ?>

<?php include 'footer.php'; ?>