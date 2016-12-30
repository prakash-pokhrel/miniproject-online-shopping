<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Demo Shopping Cart - Assignment</title>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php">Spot-a-Shop</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="shopping_list.php">Shopping Lists</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="view_cart.php">
          	<span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart: 
          	<span>
	          	<?php if(isset($_SESSION["cart_item"])){
	          		echo count($_SESSION["cart_item"]);
	          		} else echo 0; 
	          	?>
	        </span>
        </a></li>
        
      </ul>
    </div>
  </div>
</nav>
<div class="container"><br>