<?php include('header.php'); ?>
<?php session_start(); ?>
<?php require_once('mysqli_connect.php'); ?>
<h3>List of items in the cart:</h3>
<?php ?>

	<div class="table-responsive">
		
		<table class="table table-bordered table-condensed table-striped">
			
			<thead>
				<tr>
					<th>S.No.</th>
					<th>Item</th>
					<th>Code</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Total</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			<?php 
			$i=0;
			$sum = array();
			foreach ($_SESSION["cart_item"] as $key => $value) {
			$i++; 
			$sum[$i] = $_SESSION["cart_item"][$key]["price"] * $_SESSION["cart_item"][$key]["quantity"]
			?>

				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $_SESSION["cart_item"][$key]["name"]; ?></td>
					<td><?php echo $_SESSION["cart_item"][$key]["code"]; ?></td>
					<td><?php echo $_SESSION["cart_item"][$key]["price"]; ?></td>
					<td><?php echo $_SESSION["cart_item"][$key]["quantity"]; ?></td>
					<td><?php echo  $sum[$i]; ?></td>
					<td><a href="add_to_cart.php?action=remove&code=<?php echo $_SESSION["cart_item"][$key]["code"]; ?>">Remove Item</a></td>
				</tr>
			<?php } ?>

				<tr>

					<td colspan="5">Total</td>
					<td colspan="2"><?php echo array_sum($sum); ?></td>
				
				</tr>
			</tbody>

		</table>

	</div>
	<a href="index.php">Continue Shopping</a>

<?php include'footer.php'; ?>