<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classess/Brand.php'; ?>
<?php
$brand = new Brand();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $brandName = $_POST['brandName'];
    if (preg_match("/^[A-Za-z\s'-]+$/u", $brandName)) {
        $insertBrand = $brand->brandInsert($brandName);
    } else {
        echo "<script>alert('Invalid input for Brand name. Only letters are allowed.');</script>";
    }
}

?>
<div class="grid_10">
    <div class=" p-4 bg-body-tertiary first grid">

        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6">
                    <h2>Add New Brand</h2>
                </div>
                <div class="col-lg-6"><a href="brandlist.php" class="btn btn-success btn-sm float-right mt-3"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Go Back</a></div>
            </div>
        </div>
        <div class="block copyblock">

            <?php
            if (isset($insertBrand)) {
                echo $insertBrand;
            }

            ?>

            <div class="card container" style="width: 20rem;">
                <div class="card-body">
                    <form action="" method="post">

                        <div class="mb-3">
                            <label for="brand" class="form-label">Add Brand</label>
                            <input type="text" name="brandName" class="form-control" id="brand" aria-describedby="emailHelp" placeholder="Enter Brand Name...">

                        </div>

                        <button type="submit" name="submit" class="btn btn-sm btn-success" value="Save"><i class="fa fa-paper-plane" aria-hidden="true"></i> Submit</button>
                        <button type="reset" name="reset" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i> Reset</button>
                    </form>
                </div>
            </div>


        </div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>