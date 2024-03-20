<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classess/Category.php'; ?>
<?php
$cat = new Category();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $catName = $_POST['catName'];
    if (preg_match("/^[A-Za-z\s'-]+$/u", $catName)) {
        $insertCat = $cat->catInsert($catName);
    } else {
        echo "<script>alert('Invalid input for category name. Only letters are allowed.');</script>";
    }
}

?>
<div class="grid_10">
    <<div class="py-4 bg-body-tertiary  ">

        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6">
                    <h2>Add New Category</h2>
                </div>
                <div class="col-lg-6"><a href="catlist.php" class="btn btn-success btn-sm float-right mt-3"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Go Back</a></div>
            </div>
        </div>

        <div class="block copyblock">

            <?php
            if (isset($insertCat)) {
                echo $insertCat;
            }

            ?>

            <div class="card container" style="width: 18rem;">
                <div class="card-body">
                    <form action="catadd.php" method="post">
                        <div class="mb-3">
                            <label for="category" class="form-label">Category Name: </label>
                            <input type="text" class="form-control" id="category" name="catName" aria-describedby="emailHelp" placeholder="category name here...">
                        </div>

                        <button type="submit" name="submit" class="btn btn-success btn-sm me-2" Value="Save"><i class="fa fa-sign-in" aria-hidden="true"></i> Save</button>
                        <button type="reset" name="reset" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i> Reset</button>
                    </form>
                </div>
            </div>


        </div>
</div>
</div>
<?php include 'inc/footer.php'; ?>