<?php include('header.php'); ?>
<?php require_once('mysqli_connect.php'); ?>
<div class="panel panel-default">
  	<div class="panel-heading"><h4><center>Items in cart</center></h4></div>
  	<div class="panel-body">
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
			if(isset($_SESSION["cart_item"])) {

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
						<td><?php echo  number_format($sum[$i],2); ?></td>
						<td><a style="color: #FF0000" href="add_to_cart.php?action=remove&code=<?php echo $_SESSION["cart_item"][$key]["code"]; ?>">Remove Item</a></td>
					</tr>
				<?php } ?>

					<tr>

						<td colspan="5">Total</td>
						<td><b><?php echo number_format(array_sum($sum), 2); ?></b></td>
						<td><b><a style="color: #FF0000" href="add_to_cart.php?action=empty">Empty My Cart</a></b></td>
					
					</tr>


			<?php }else{ ?>

				<tr>
					
					<td colspan="7">No items in the cart</td>

				</tr>


			<?php } ?>
			
			</tbody>

		</table>

	</div>
	</div>
</div>
	<a href="index.php"><button class="btn btn-primary">Continue Shopping</button></a>

<?php include'footer.php'; ?>