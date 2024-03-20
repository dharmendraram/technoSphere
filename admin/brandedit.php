<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classess/Brand.php'; ?>
<?php
if (!isset($_GET['brandid']) || $_GET['brandid'] == NULL) {

    echo "<script>window.location='brandlist.php';</script>";
} else {

    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['brandid']);
}

$brand = new Brand();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $brandName = $_POST['brandName'];
    if (preg_match("/^[A-Za-z\s'-]+$/u", $brandName)) {
        $updateBrand = $brand->brandUpdate($brandName, $id);
    } else {
        echo "<script>alert('Invalid input for Brand name. Only letters are allowed.');</script>";
    }
}

?>
<div class="grid_10">
    <div class="box  grid">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6">
                    <h2>Update Brand</h2>
                </div>
                <div class="col-lg-6"><a href="brandlist.php" class="btn btn-success btn-sm float-right "><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Go Back</a></div>
            </div>
        </div>
        <div class="block copyblock">

            <?php
            if (isset($updateBrand)) {
                echo $updateBrand;
            }

            ?>


            <?php
            $getBrand = $brand->getBrandById($id);
            if ($getBrand) {
                while ($result = $getBrand->fetch_assoc()) {

            ?>

                    <div class="card container" style="width: 18rem;">
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="mb-3">
                                    <label for="Brand" class="form-label">Brand Edit: </label>
                                    <input type="text" class="form-control" id="brand" name="brandName" aria-describedby="emailHelp" value="<?php echo $result['brandName']; ?>" class="medium" />
                                </div>

                                <button type="submit" name="submit" class="btn btn-success btn-sm me-2" Value="Update"><i class="fa fa-sign-in" aria-hidden="true"></i> Update</button>
                                <button type="reset" name="reset" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i> Reset</button>
                            </form>
                        </div>
                    </div>


            <?php }
            } ?>
        </div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>