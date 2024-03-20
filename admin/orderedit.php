<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classess/Order.php'; ?>

<div class="container my-5 text-white">
    <form action="" method="post" enctype="multipart/form-data">
        <!-- <div class="mb-3">
            <div class="row">
                <div class="col-lg-3"><label for="customerName" class="form-label">Customer:</label></div>
                <div class="col-lg-9"><input type="text" class="form-control" name="customerName" class="medium" id="customerName" aria-describedby="emailHelp"></div>
            </div>
        </div>

        <div class="mb-3">
            <div class="row">
                <div class="col-lg-3"><label for="productName" class="form-label">Product Name:</label></div>
                <div class="col-lg-9"><input type="text" class="form-control" name="productName" class="medium" id="productName" aria-describedby="emailHelp"></div>
            </div>
        </div>


        <div class="mb-3">
            <div class="row">
                <div class="col-lg-3"><label for="quantity" class="form-label">Quantity:</label></div>
                <div class="col-lg-9"><input type="number" class="form-control medium" name="quantity" id="quantity" min="0" aria-describedby="emailHelp"></div>
            </div>
        </div> -->


        <!-- <div class="mb-3">
            <div class="row">
                <div class="col-lg-3"><label for="price" class="form-label">Price:</label></div>
                <div class="col-lg-9"><input type="number" class="form-control medium" name="price" id="price" min="0" aria-describedby="emailHelp"></div>
            </div>
        </div> -->
        <div class="mb-3">
            <div class="row">
                <div class="col-lg-3">
                    <label for="status" class="form-label">Status:</label>
                </div>
                <div class="col-lg-9">

                    <select id="status" class="form-select">
                        <option value="pending">Pending</option>
                        <option value="processing">Processing</option>
                        <option value="completed">Completed</option>
                        <option value="cancelled">Cancelled</option>
                    </select>
                </div>
            </div>
        </div>





        <div class="row">
            <div class="col-lg-9 offset-3">
                <button type="submit" name="submit" class="btn btn-success btn-sm me-2" Value="Save"><i class="fa fa-sign-in" aria-hidden="true"></i> Save</button>
                <button type="reset" name="reset" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i> Reset</button>
            </div>
        </div>



    </form>
</div>

<?php include 'inc/footer.php'; ?>