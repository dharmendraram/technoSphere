<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<div class="grid_10">
    <div class="box round first grid">

        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6">
                    <h2>Add New Slider</h2>
                </div>
                <div class="col-lg-6"><a href="sliderlist.php" class="btn btn-success btn-sm float-right"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Go Back</a></div>
            </div>
        </div>
        <div class="block">

            <div class="card container" style="width: 25rem;">
                <div class="card-body">
                    <form action="addslider.php" method="post" enctype="multipart/form-data">

                        <div class="mb-3">
                            <label for="title" class="form-label">Title </label>
                            <input type="text" class="form-control medium" id="title" name="title" aria-describedby="emailHelp" placeholder="slider name here...">
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Upload Image </label>
                            <input type="file" class="form-control" id="image" name="image" aria-describedby="emailHelp">
                        </div>
                        <button type="submit" name="submit" class="btn btn-success btn-sm me-2" Value="Save"><i class="fa fa-sign-in" aria-hidden="true"></i> Save</button>
                        <button type="reset" name="reset" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i> Reset</button>
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