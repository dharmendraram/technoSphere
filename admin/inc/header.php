<?php

include '../lib/Session.php';
Session::checkSession();

include '../lib/Database.php';
include '../helpers/Formate.php';
spl_autoload_register(function ($class) {
    include_once "classess/" . $class . ".php";
});


?>

<?php
$db = new Database();
$fm = new Format();

?>



<?php
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE html>
<html>

<head>


    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/nav.css" media="screen" />
    <link href="css/table/demo_page.css" rel="stylesheet" type="text/css" />
    <!-- BEGIN: load jquery -->
    <script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/jquery-ui/jquery.ui.core.min.js"></script>
    <script src="js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.mouse.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.sortable.min.js" type="text/javascript"></script>
    <script src="js/table/jquery.dataTables.min.js" type="text/javascript"></script>
    <!-- END: load jquery -->
    <script type="text/javascript" src="js/table/table.js"></script>
    <script src="js/setup.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            setupLeftMenu();
            setSidebarHeight();
        });
    </script>

</head>

<body>
    <!-- <section class="bg-secondary text-white">
        <div class="container py-3">
            <div class="row">
                <div class="col-lg-6">
                    <h1> <a href="dashboard.php" class="text-warning"><i class="fa fa-home" aria-hidden="true"></i> Admin Dashboard</a> </h1>
                </div>
                <div class="col-lg-6 text-end">
                    <?php
                    if (isset($_GET['action']) && $_GET['action'] == "logout") {
                        Session::destroy();
                    }
                    ?>


                    <?php echo Session::get('adminName'); ?>
                    | <a href="?action=logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>

                </div>
            </div>
        </div>
    </section> -->

    <div class="container_12 bg-dark">
        <div class="grid_12 header-repeat bg-dark">
            <div id="branding" class="bg-secondary">
                <div class="floatleft middle bg">
                    <h1> <a href="dashboard.php" class="text-warning"><i class="fa fa-home" aria-hidden="true"></i> Admin Dashboard</a> </h1>
                </div>
                <div class="floatright">
                    <?php
                    if (isset($_GET['action']) && $_GET['action'] == "logout") {
                        Session::destroy();
                    }
                    ?>
                    <div class="floatleft marginleft10">
                        <ul class="inline-ul floatleft">
                            <li> <?php echo Session::get('adminName'); ?></li>
                            <li><a href="?action=logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
                        </ul>
                    </div>
                </div>
                <div class="clear">
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
        <div class="clear">
        </div>