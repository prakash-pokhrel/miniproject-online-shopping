<?php 
require_once('mysqli_connect.php');
session_start();
$get_action = $_GET['action'];
var_dump($_GET);

switch ($get_action) {
	
	case 'add':

	if(!empty($_POST["quantity"])) {
		
		$sql = "SELECT * FROM tblproduct WHERE code='" . $_GET["code"] . "'";
		$result = mysqli_query($dbc, $sql);
		if($result){

			while($productByCode = mysqli_fetch_array($result)){ 
				
				$itemArray = array($productByCode["code"]=>array('name'=>$productByCode["name"], 'code'=>$productByCode["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode["price"]));

				if(!empty($_SESSION["cart_item"])) {
						
					if(in_array($productByCode["code"],$_SESSION["cart_item"])) {
						
						foreach($_SESSION["cart_item"] as $k => $v) {

							if($productByCode["code"] == $k){	

								$_SESSION["cart_item"][$k]["quantity"] = $_POST["quantity"];

							}
								
						}

					} else $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);

				} else 	$_SESSION["cart_item"] = $itemArray;
			
			}

		}

	}

	break;

	case "remove":
	
	if(!empty($_SESSION["cart_item"])) {
		foreach($_SESSION["cart_item"] as $k => $v) {
			if($_GET["code"] == $k)	unset($_SESSION["cart_item"][$k]);				
			if(empty($_SESSION["cart_item"])) unset($_SESSION["cart_item"]);
		}
	}
	
	break;

	case 'empty':

		unset($_SESSION["cart_item"]);

	break;
}

header('Location:'.$_SERVER['HTTP_REFERER']);		

?>