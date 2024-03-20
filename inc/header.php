<?php

include 'lib/Session.php';
Session::init();

include 'lib/Database.php';
include 'helpers/Formate.php';
spl_autoload_register(function ($class) {
	include_once "classess/" . $class . ".php";
});

$db = new Database();
$fm = new Format();
$pd = new Product();
$cat = new Category();
$ct = new Cart();
$cmr = new Customer();
?>

<?php
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE HTML>
<html lang="en-US">

<head>
	<title>TechnoSphere</title>
	<meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- <link rel="stylesheet" href="../css/style.css"> -->
	<link href="css/newstyle.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/menu.css" rel="stylesheet" media="all" />
	<link href="css/tougle.css" rel="stylesheet" media="all" />
	<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
	<script src="js/jquerymain.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
	<script src="js/script.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="js/nav.js"></script>
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript" src="js/nav-hover.js"></script>
	<script type="text/javascript">
		$(document).ready(function($) {
			$('#dc_mega-menu-orange').dcMegaMenu({
				rowItems: '4',
				speed: 'fast',
				effect: 'fade'
			});
		});
	</script>
	<style>
		.sticky {
			position: fixed;
			top: 0;
			width: 100%;
			z-index: 10000;
		}

		.sticky+.content {
			padding-top: 102px;
		}
	</style>
</head>

<body>
	<div class="header py-3">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-3"><a href="index.php"> <span class="text-warning fs-2 text-uppercase">Techno</span><span class="text-success text-uppercase">Sphere</span></a></div>
				<div class="col-lg-5">
					<form class="d-flex rounded-pill" role="search" method="get" action="search.php">
						<input class="form-control me-2 " type="search" placeholder="Search" aria-label="Search" name="search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search for Products';}">
						<button class="btn btn-dark " type="submit" value="SEARCH"><i class="fa fa-search" aria-hidden="true"></i></button>
					</form>
				</div>
				<div class="col-lg-3">
					<a href="cart.php" class="text-decoration-none text-black fs-5" title="View my shopping cart" rel="nofollow">
						<i class="fa fa-shopping-cart text-dark fs-4" aria-hidden="true"></i>
						<span class="no_product fs-6 px-3 bg-dark text-white p-2">

							<?php
							$getData = $ct->checkCartTable();
							if ($getData) {
								$sum = Session::get("sum");
								$qty = Session::get("qty");
								echo "Rs. " . $sum . " &nbsp; &nbsp; qty: " . $qty;
							} else {
								echo "0";
							}

							?>
						</span>
					</a>
				</div>
				<div class="col-lg-1">
					<?php
					$login = Session::get("cuslogin");
					if ($login == false) {  ?>
						<a href="login.php" class="text-dark"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
					<?php } else { ?>
						<a class="text-black" href="?cid=<?php Session::get('cmrId') ?>"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
					<?php }
					?>
				</div>
			</div>
		</div>

		<?php
		if (isset($_GET['cid'])) {
			$cmrId = Session::get("cmrId");
			$delData = $ct->delCustomerCart();
			$delComp = $pd->delCompareData($cmrId);
			Session::destroy();
		}
		?>
	</div>

	<div class="menu" id="myHeader">
		<ul id="dc_mega-menu-orange" style="text-transform: uppercase;" class="dc_mm-orange">
			<div class="topnav bg-dark" id="myTopnav">
				<div class="container">
					<a href="index.php">Home</a>
					<a href="topbrands.php">Brands</a>
					<?php
					$chkCart = $ct->checkCartTable();
					if ($chkCart) { ?>
						<a href="cart.php">Cart</a>
						<a href="payment.php">Payment</a>
					<?php } ?>

					<?php
					$cmrId = Session::get("cmrId");
					$chkOrder = $ct->checkOrder($cmrId);
					if ($chkOrder) { ?>
						<a href="orderdetails.php">Order</a>
					<?php } ?>
					<?php
					$login = Session::get("cuslogin");
					if ($login == true) { ?>
						<a href="profile.php">Profile</a>
					<?php } ?>
					<a href="contact.php">Contact</a>
					<a href="javascript:void(0);" class="icon" onclick="myFunction1()">
						<i class="fa fa-bars"></i>
					</a>
				</div>
			</div>
			<div class="clear"></div>
		</ul>
	</div>

	<script>
		window.onscroll = function() {
			myFunction()
		};

		var header = document.getElementById("myHeader");
		var sticky = header.offsetTop;

		function myFunction() {
			if (window.pageYOffset > sticky) {
				header.classList.add("sticky");
			} else {
				header.classList.remove("sticky");
			}
		}
	</script>
	<script type="text/javascript" src="js/toggle.js"></script>