<?php 

require_once('mysqli_connect.php');
$sql = "SELECT * FROM tblproduct ORDER BY id ASC";
$result = mysqli_query($dbc, $sql);
if($result){

	while($product_array = mysqli_fetch_array($result)){ ?>

		<div class="item-item">
			<form method="post" action="index.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
				<div class="item-image"><img src="<?php echo $product_array["image"]; ?>"></div>
				<div><strong><?php echo $product_array["name"]; ?></strong></div>
				<div class="item-price"><?php echo $product_array["price"]; ?></div>
				<div><input type="text" name="quantity" value="1" size="2" /><input type="submit" value="Add to cart" class="btnAddAction" /></div>
			</form>
		</div>


	<?php	} ?>

<?php } ?>