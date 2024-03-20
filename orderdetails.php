<?php include 'inc/header.php'; ?>
<?php
$login = Session::get("cuslogin");
if ($login == false) {
    header("Location:login.php");
}
?>


<?php
if (isset($_GET['customerId'])) {
    $id = $_GET['customerId'];
    $confirm = $ct->productShiftConfirm($id);
}

?>

<style>
    .tblone tr td {
        text-align: justify;
    }
</style>
<!-- <div class="main"> -->
<!-- <div class="content"> -->
<!-- <div class="section group"> -->
<div class="py-5">
    <h2>Your Ordered Details</h2>
    <table class="tblone">
        <tr>
            <th>No</th>
            <th>Product Name</th>
            <th>Image</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Date</th>
            <th>Status</th>
            <!-- <th>Action</th> -->
        </tr>
        <tr>
            <?php
            $cmrId = Session::get("cmrId");
            $getOrder = $ct->getOrderedProduct($cmrId);
            if ($getOrder) {
                $i = 0;
                while ($result = $getOrder->fetch_assoc()) {

                    $i++;

            ?>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $result['productName']; ?></td>
                    <td><img src="admin/<?php echo $result['image']; ?>" alt="" /></td>
                    <td><?php echo $result['quantity']; ?></td>

                    <td>Rs. <?php echo $result['price']; ?></td>
                    <td><?php echo $fm->formatDate($result['date']); ?></td>

                    <td><?php echo $result['status'];?></td>
                    </td>
                    <?php
                    if ($result['status'] == '1') { ?>
                        <td> <a href="?customerId=<?php echo $result['id']; ?>">Confirm</a>
                        <td>
                        <?php } elseif ($result['status'] == '2') { ?>
                        <td>Ok</td>

                    <?php } elseif ($result['status'] == '0') { ?>
                        <!-- <td>N/A</td> -->
                        <!-- TODO -->
                        <td><a href="order.php?proid=<?php echo $result['productId']; ?>"> <a onclick="return confirm('Do you want to cancel your order!')" href="?delpro=<?php echo $result['productId']; ?>"><i class="fa fa-trash p-2 bg-danger text-white rounded-pill" aria-hidden="true"></i></a></td>
                    <?php  }  ?>
        </tr>
<?php }
            } ?>
    </table>
</div>
<!-- </div> -->
<!-- <div class="clear"></div> -->
<!-- </div> -->
<!-- </div> -->
<?php include 'inc/footer.php'; ?>