<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classess/Category.php'; ?>
<?php
$cat = new Category();

if (isset($_GET['delcat'])) {
	$id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['delcat']);
	$delcat = $cat->delcatById($id);
}
?>

<div class="grid_10">
	<div class=" text-white">
		<div class="container">
			<div class="row align-items-center justify-content-center">
				<div class="col-lg-6">
					<h2>Category List</h2>
				</div>
				<div class="col-lg-6"><a href="catadd.php" class="btn btn-success btn-sm float-right mt-3"><i class="fa fa-plus" aria-hidden="true"></i> Add Category</a></div>
			</div>
		</div>

		<div class="block">

			<?php

			if (isset($delcat)) {
				echo $delcat;
			}

			?>

			<table class="table datatable table-striped table-responsive" id="example">
				<thead class="text-uppercase bg-dark pb-5">
					<tr>
						<th>S.N.</th>
						<th>Category Name</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$getCat = $cat->getAllCat();
					if ($getCat) {
						$i = 0;
						while ($result = $getCat->fetch_assoc()) {
							$i++;


					?>
							<tr class="odd gradeX">
								<td><?php echo $i; ?></td>
								<td><?php echo $result['catName']; ?></td>
								<td><a href="catedit.php?catid=<?php echo $result['catId']; ?>"><i class="fa fa-pencil p-2 bg-dark text-white rounded-pill" aria-hidden="true"></i> </a> <a onclick="return confirm('Are you sure to delete!')" href="?delcat=<?php echo $result['catId']; ?>"><i class="fa fa-trash p-2 text-white bg-danger rounded-pill" aria-hidden="true"></i> </a></td>
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