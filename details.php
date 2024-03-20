<?php include 'inc/header.php'; ?>
<?php
if (isset($_GET['proid'])) {
	$id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['proid']);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
	$login = Session::get("cuslogin");
	if ($login == false) {
		header("Location:login.php?proid=$id");
	} else {
		$quantity = $_POST['quantity'];
		$addCart = $ct->addToCart($quantity, $id);
	}
}
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['compare'])) {
	$productId = $_POST['productId'];
	$insertCom = $pd->insertCompareData($productId, $cmrId);
}
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['wlist'])) {
	$saveWlist = $pd->saveWishListData($id, $cmrId);
}

?>

<style>
	.mybutton {
		width: 100px;
		float: left;
		margin-right: 50px;
	}
</style>

<div class="main">
	<div class="content">
		<div class="section group">
			<div class="cont-desc span_1_of_2">

				<?php
				$getPd = $pd->getSingleProduct($id);
				if ($getPd) {
					while ($result = $getPd->fetch_assoc()) {

				?>
						<div class="grid images_3_of_2">
							<img src="admin/<?php echo $result['image']; ?>" alt="" />
						</div>
						<div class="desc span_3_of_2">
							<h2><?php echo $result['productName']; ?> </h2>
							<div class="price">
								<p>Price: <span class="text-black fs-6">Rs.<?php echo $result['price']; ?></span></p>
								<p>Category: <span class="text-black fs-6"><?php echo $result['catName']; ?></span></p>
								<p>Brand:<span class="text-black fs-6"><?php echo $result['brandName']; ?></span></p>
							</div>
							<div class="add-cart">Quantity
								<form action="" method="post">
									<input type="number" class="buyfield" name="quantity" min="1" max="<?php echo $result['quantity']; ?>" value="1" />
									<?php if ($result['quantity'] >= 1) { ?>
										<input type="submit" class="bg-success border-0 p-2 rounded text-white" name="submit" value="Add to Cart" />
										<span class="text-success">In Stock</span>
									<?php } else { ?>
										<input type="submit" class="bg-secondary border-0 p-2 rounded text-white" name="submit" value="Add to Cart" disabled />
										<span class="text-danger">Out of Stock</span>
									<?php } ?>
								</form>
							</div>
							<span style="color: red;font-size: 18px;">
								<?php
								if (isset($addCart)) {
									echo $addCart;
								}
								?>
								<?php
								if (isset($insertCom)) {
									echo $insertCom;
								}

								if (isset($saveWlist)) {
									echo $saveWlist;
								}
								?>
							</span>
							<?php
							$login = Session::get("cuslogin");
							if ($login == true) {
							?>
								<div class="add-cart">
									<div class="mybutton">
									</div>
								</div>
							<?php } ?>
						</div>
						<div class="product-desc ">
							<h2 class="bg-dark text-white">Product Details</h2>
							<?php echo $result['body']; ?>
						</div>
				<?php }
				} ?>
			</div>
			<div class="rightsidebar span_3_of_1">
				<h2>CATEGORIES</h2>
				<ul>
					<?php
					$getCat = $cat->getAllCat();
					if ($getCat) {
						while ($result = $getCat->fetch_assoc()) {
					?>
							<li><a href="productbycat.php?catId=<?php echo $result['catId']; ?>"><?php echo $result['catName']; ?></a></li>
					<?php }
					} ?>
				</ul>
			</div>
		</div>
	</div>
</div>
<?php include 'inc/footer.php'; ?>