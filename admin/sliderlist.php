<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classess/Order.php'; ?>


<?php
$pd = new Order();

if (isset($_GET['msg'])) {
	echo $_GET['msg'];
}
?>

<div class="grid_10">
	<div class="box round first grid">
		<div class="container">
			<div class="row align-items-center justify-content-center">
				<div class="col-lg-6">
					<h2>Order List</h2>
				</div>
				<!-- <div class="col-lg-6"><a href="slideradd.php" class="btn btn-success btn-sm float-right mt-3"><i class="fa fa-plus" aria-hidden="true"></i> Add Slider</a></div> -->
			</div>
		</div>


		<div class="block">
			<table class="data display datatable" id="example">
				<thead>
					<tr>
						<th>No.</th>
						<th>Customer Name</th>
						<th>Product Name</th>
						<th>Quantity</th>
						<th>Price</th>
						<th>Order Status</th>
						<!-- <th>Action</th> -->
					</tr>
				</thead>
				<tbody>
					<?php
					$getPd = $pd->getAllOrder();
					if ($getPd) {
						$i = 0;
						while ($result = $getPd->fetch_assoc()) {
							$i++;

					?>
							<tr class="odd gradeX">
								<td><?php echo $i; ?></td>
								<td><?php echo $result['name']; ?></td>
								<td><?php echo $result['productName']; ?></td>
								<td><?php echo $result['quantity']; ?></td>
								<td><?php echo $result['price']; ?></td>
								<!-- <td><?php echo $result['status']; ?></td> -->
								<td>
									<form action='update_status.php' method='post'>
										<select name='orderItemStatus'>
											<option value='Pending' <?php if ($result['status'] == 'Pending') {
																		echo 'selected';
																	} ?>>Pending</option>
											<option value='Processing' <?php if ($result['status'] == 'Processing') {
																			echo 'selected';
																		} ?>>Processing</option>
											<option value='Completed' <?php if ($result['status'] == 'Completed') {
																			echo 'selected';
																		} ?>>Completed</option>
											<option value='Cancelled' <?php if ($result['status'] == 'Cancelled') {
																			echo 'selected';
																		} ?>>Cancelled</option>
										</select>
										<input type='hidden' name='id' value='<?php echo $result['oid']; ?>'>
										<!-- <input type='hidden' value='" . $result[' status'] . "'> -->
										<button class='btn btn-xs' style='width: 26px; margin-top:-4px; margin-left: 4px;' name='changeItemStatus' type='submit'>
											<i class='fa fa-edit fa-lg text-success'></i>
										</button>
									</form>
								</td>
								<!-- <td><a href=" #"><i class="fa fa-pencil p-2 bg-dark text-white rounded-pill" aria-hidden="true"></i></a>
								</td> -->
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