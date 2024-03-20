<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classess/Product.php'; ?>
<?php include_once '../helpers/Formate.php'; ?>

<?php
$pd = new Product();
$fm = new Format();

?>

<?php
if (isset($_GET['delpro'])) {
	$id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['delpro']);
	$delpro = $pd->delProById($id);
}
?>

<div class="grid_10">
	<div class=" text-white  first grid">

		<div class="container">
			<div class="row align-items-center justify-content-center">
				<div class="col-lg-6">
					<h2>Product List</h2>
				</div>
				<div class="col-lg-6"><a href="productadd.php" class="btn btn-success btn-sm float-right mt-3"><i class="fa fa-plus" aria-hidden="true"></i> Add Product</a></div>
			</div>
		</div>

		<div class="block">


			<?php

			if (isset($delpro)) {
				echo $delpro;
			}

			?>
			<table class="table datatable table-striped table-responsive" id="example">
				<thead class="table-secondary">
					<tr>
						<th style="width: 2%;">SN</th>
						<th style="width:19%;">Product Name</th>
						<th style="width: 10%;">Category</th>
						<th style="width: 10%;">Brand</th>
						<th style="width: 25%;">Description</th>
						<th style="width: 5%;">quantity</th>
						<th style="width: 5%;">Price</th>
						<th style="width: 10%;">Image</th>
						<th style="width: 5%;">Type</th>
						<th style="width: 10%;">Action</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$getPd = $pd->getAllProduct();
					if ($getPd) {
						$i = 0;
						while ($result = $getPd->fetch_assoc()) {
							$i++;

					?>
							<tr class="odd gradeX">
								<td><?php echo $i; ?></td>
								<td><?php echo $result['productName']; ?></td>
								<td><?php echo $result['catName']; ?></td>
								<td><?php echo $result['brandName']; ?></td>
								<td><?php echo $fm->textShorten($result['body'], 50); ?></td>
								<td><?php echo $result['quantity']; ?></td>
								<td>Rs.<?php echo $result['price']; ?></td>
								<td><img src="<?php echo $result['image']; ?>" height="40px" width="60px"></td>
								<td>
									<?php
									if ($result['type'] == 0) {
										echo "Featured";
									} else
										echo "General";

									?>


								</td>
								<td><a href="productedit.php?proid=<?php echo $result['productId']; ?>"><i class="fa fa-pencil p-2 bg-dark text-white rounded-pill" aria-hidden="true"></i></a> <a onclick="return confirm('Are you sure to delete!')" href="?delpro=<?php echo $result['productId']; ?>"><i class="fa fa-trash p-2 bg-danger text-white rounded-pill" aria-hidden="true"></i></a></td>
							</tr>

					<?php }
					} ?>

				</tbody>
			</table>

		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		setupLeftMenu();
		$('.datatable').dataTable();
		setSidebarHeight();
	});
</script>
<?php include 'inc/footer.php'; ?>