<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classess/Product.php'; ?>
<?php include '../classess/Category.php'; ?>
<?php include '../classess/Brand.php'; ?>

<?php
$pd = new Product();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $productName = $_POST['productName'];
    $price = $_POST['price'];
    if (!is_numeric($price) || $price < 1) {
        echo "<script>alert('Error: Price should be a number and not less than 1.');</script>";
    } else {
        $insertProduct = $pd->productInsert($_POST, $_FILES);
    }
}

?>
<div class="grid_10">
    <div class=" p-4 bg-body-tertiary first grid">

        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6">
                    <h2>Add New Product</h2>
                </div>
                <div class="col-lg-6"><a href="productlist.php" class="btn btn-success btn-sm float-right mt-3"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Go Back</a></div>
            </div>
        </div>
        <div class="block">
            <?php
            if (isset($insertProduct)) {
                echo $insertProduct;
            }
            ?>

            <div class="card container mt-4" style="width: 50rem;">
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-lg-3"><label for="name" class="form-label">Name:</label></div>
                                <div class="col-lg-9"><input type="text" class="form-control" name="productName" class="medium" id="name" placeholder="Enter Product Name..." aria-describedby="emailHelp"></div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="col-lg-3"><label for="select" class="form-label">Category:</label></div>
                                </div>
                                <div class="col-lg-9"><select class="form-select" id="select" name="catId" aria-label="Default select example">
                                        <option selected>Select Category</option>
                                        <?php
                                        $cat = new Category();
                                        $getCat = $cat->getAllCat();
                                        if ($getCat) {
                                            while ($result = $getCat->fetch_assoc()) {
                                        ?>

                                                <option value="<?php echo $result['catId']; ?>"><?php echo $result['catName']; ?></option>
                                        <?php }
                                        } ?>

                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="col-lg-3"><label for="select" class="form-label">Brand:</label></div>
                                </div>
                                <div class="col-lg-9"><select class="form-select" id="select" name="brandId" aria-label="Default select example">
                                        <option selected>Select Brand</option>
                                        <?php
                                        $brand = new Brand();
                                        $getBrand = $brand->getAllBrand();
                                        if ($getBrand) {
                                            while ($result = $getBrand->fetch_assoc()) {
                                        ?>

                                                <option value="<?php echo $result['brandId']; ?>"><?php echo $result['brandName']; ?></option>
                                        <?php }
                                        } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-lg-3"><label for="description" class="form-label">Description:</label></div>
                                <div class="col-lg-9"> <textarea rows="10" cols="75" id="description" name="body"></textarea>
                                </div>
                            </div>
                            <!-- TODO: -->
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-lg-3"><label for="quantity" class="form-label">Quantity:</label></div>
                                    <div class="col-lg-9"><input type="number" min="1" class="form-control medium" name="quantity" id="quantity" aria-describedby="emailHelp"></div>
                                </div>
                            </div>
                            <!-- TODO end: -->
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-lg-3"><label for="price" class="form-label">Price:</label></div>
                                    <div class="col-lg-9"><input type="number" min="1" class="form-control medium" name="price" id="price" placeholder="Enter Price..." aria-describedby="emailHelp"></div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-lg-3"><label for="image" class="form-label">Upload Image:</label></div>
                                    <div class="col-lg-9"><input type="file" class="form-control medium" name="image" id="image" aria-describedby="emailHelp"></div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-lg-3"><label for="product-type" class="form-label">Product Type:</label></div>
                                    <div class="col-lg-9"><select class="form-select" id="product-type" name="type" aria-label="Default select example">
                                            <option>Select Type</option>
                                            <option value="0">Featured</option>
                                            <option value="1">General</option>
                                        </select></div>
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
            </div>

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