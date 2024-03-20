<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classess/Brand.php'; ?>
<?php
$brand = new Brand();


if (isset($_GET['delbrand'])) {
	$id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['delbrand']);
	$delbrand = $brand->delbrandById($id);
}

?>

<div class="grid_10">
	<div class=" text-white  first grid">

		<div class="container">
			<div class="row align-items-center justify-content-center">
				<div class="col-lg-6">
					<h2>Brand List</h2>
				</div>
				<div class="col-lg-6"><a href="brandadd.php" class="btn btn-success btn-sm float-right mt-3"><i class="fa fa-plus" aria-hidden="true"></i> Add Brand</a></div>
			</div>
		</div>

		<div class="block">

			<?php


			if (isset($delbrand)) {
				echo $delbrand;
			}


			?>

			<table class="table datatable table-striped table-responsive" id="example">
				<thead class="bg-secondary">
					<tr>
						<th>Serial No.</th>
						<th>Brand Name</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$getBrand = $brand->getAllBrand();
					if ($getBrand) {
						$i = 0;
						while ($result = $getBrand->fetch_assoc()) {
							$i++;


					?>
							<tr class="odd gradeX">
								<td><?php echo $i; ?></td>
								<td><?php echo $result['brandName']; ?></td>
								<td><a href="brandedit.php?brandid=<?php echo $result['brandId']; ?>"><i class="fa fa-pencil p-2 bg-dark text-white rounded-pill" aria-hidden="true"></i> </a> <a onclick="return confirm('Are you sure to delete!')" href="?delbrand=<?php echo $result['brandId']; ?>"><i class="fa fa-trash p-2 bg-danger text-white rounded-pill" aria-hidden="true"></i></a></td>
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