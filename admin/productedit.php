<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classess/Product.php'; ?>
<?php include '../classess/Category.php'; ?>
<?php include '../classess/Brand.php'; ?>

<?php

if (!isset($_GET['proid']) || $_GET['proid'] == NULL) {

    echo "<script>window.location='productlist.php';</script>";
} else {

    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['proid']);
}
$pd = new Product();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $productName = $_POST['productName'];
    $price = $_POST['price'];
    if (!is_numeric($price) || $price < 1) {
        $updateProduct = "<script>alert('Error: Price should be a number and not less than 1.');</script>";
    } else {
        $updateProduct = $pd->productUpdate($_POST, $_FILES, $id);
    }
}

?>
<div class="grid_10">
    <div class="box first grid">

        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6">
                    <h2>Update Product</h2>
                </div>
                <div class="col-lg-6"><a href="productlist.php" class="btn btn-success btn-sm float-right "><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Go Back</a></div>
            </div>
        </div>
        <div class="block">

            <?php
            if (isset($updateProduct)) {
                echo $updateProduct;
            }

            ?>

            <?php
            $getPro = $pd->getProById($id);
            if ($getPro) {
                while ($value = $getPro->fetch_assoc()) {


            ?>

                    <div class="card container" style="width: 50rem;">
                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-lg-3"> <label for="name" class="form-label">Name: </label></div>
                                        <div class="col-lg-9"><input type="text" name="productName" class="form-control" id="name" value="<?php echo $value['productName']; ?>" class="medium" /></div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-lg-3"> <label for="category" class="form-label">Category: </label></div>
                                        <div class="col-lg-9">
                                            <select class="form-select" id="select" name="catId">
                                                <option>Select Category</option>
                                                <?php
                                                $cat = new Category();
                                                $getCat = $cat->getAllCat();
                                                if ($getCat) {
                                                    while ($result = $getCat->fetch_assoc()) {
                                                ?>
                                                        <option <?php

                                                                if ($value['catId'] == $result['catId']) { ?> selected="selected" <?php } ?> value="<?php echo $result['catId']; ?>"><?php echo $result['catName']; ?>

                                                        </option>
                                                <?php }
                                                } ?>

                                            </select>

                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-lg-3"> <label for="brand" class="form-label">Brand: </label></div>
                                        <div class="col-lg-9">
                                            <select class="form-select" id="brand" name="brandId">
                                                <option>Select Brand</option>
                                                <?php
                                                $brand = new Brand();
                                                $getBrand = $brand->getAllBrand();
                                                if ($getBrand) {
                                                    while ($result = $getBrand->fetch_assoc()) {
                                                ?>
                                                        <option <?php

                                                                if ($value['brandId'] == $result['brandId']) { ?> selected="selected" <?php } ?> value="<?php echo $result['brandId']; ?>"><?php echo $result['brandName']; ?>

                                                        </option>
                                                <?php }
                                                } ?>
                                            </select>

                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-lg-3"> <label for="description" class="form-label">Description: </label></div>
                                        <div class="col-lg-9">
                                            <textarea rows="10" cols="75" name="body">
                                <?php echo $value['body']; ?>
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-lg-3"> <label for="quantity" class="form-label">Quantity: </label></div>
                                        <div class="col-lg-9"><input type="number" name="quantity" min="1" class="form-control" id="quantity" value="<?php echo $value['quantity']; ?>" class="medium" /></div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-lg-3"> <label for="price" class="form-label">Price: </label></div>
                                        <div class="col-lg-9"><input type="number" name="price" min="1" class="form-control" id="price" value="<?php echo $value['price']; ?>" class="medium" /></div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-lg-3"> <label for="image" class="form-label">Upload Image: </label></div>
                                        <div class="col-lg-9">
                                            <img src="<?php echo $value['image']; ?>" height="80px" width="200px"> <br />
                                            <input type="file" name="image" class="form-control" id="image" value="<?php echo $value['price']; ?>" class="medium" />
                                        </div>
                                    </div>
                                </div>



                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-lg-3"> <label for="brand" class="form-label">Product Type: </label></div>
                                        <div class="col-lg-9">
                                            <select class="form-select" id="select" name="type">
                                                <option>Select Type</option>
                                                <?php
                                                if ($value['type'] == 0) { ?>
                                                    <option selected="selected" value="0">Featured</option>
                                                    <option value="1">General</option>
                                                <?php } else { ?>

                                                    <option selected="selected" value="1">General</option>
                                                    <option value="0">Featured</option>
                                                <?php  } ?>

                                            </select>

                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-9 offset-3">
                                        <button type="submit" name="submit" class="btn btn-success btn-sm me-2" Value="Update"><i class="fa fa-sign-in" aria-hidden="true"></i> Update</button>
                                        <button type="reset" name="reset" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i> Reset</button>
                                    </div>
                                </div>


                            </form>
                        </div>
                    </div>




            <?php }
            } ?>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php'; ?>