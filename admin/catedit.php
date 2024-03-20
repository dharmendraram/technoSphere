<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../classess/Category.php'; ?>
<?php
if (!isset($_GET['catid']) || $_GET['catid'] == NULL) {

    echo "<script>window.location='catlist.php';</script>";
} else {

    $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['catid']);
}

$cat = new Category();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $catName = $_POST['catName'];
    if (preg_match("/^[A-Za-z\s'-]+$/u", $catName)) {
        $updateCat = $cat->catUpdate($catName, $id);
    } else {
        echo "<script>alert('Invalid input for category name. Only letters are allowed.');</script>";
    }
}

?>
<div class="grid_10">
    <div class="box first grid">
        <h2>Update Category</h2>
        <div class="block copyblock">

            <?php
            if (isset($updateCat)) {
                echo $updateCat;
            }

            ?>

            <?php
            $getCat = $cat->getCatById($id);
            if ($getCat) {
                while ($result = $getCat->fetch_assoc()) {

            ?>

                    <div class="card container" style="width: 18rem;">
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="mb-3">
                                    <label for="category" class="form-label">Category Name: </label>
                                    <input type="text" class="form-control" id="category" name="catName" aria-describedby="emailHelp" value="<?php echo $result['catName']; ?>" class="medium" />
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