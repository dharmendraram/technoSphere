<?php include '../classess/Adminlogin.php'; ?>
<?php
$al = new Adminlogin();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$adminUser = $_POST['adminUser'];
	$adminPassword = md5($_POST['adminPassword']);

	$loginchk = $al->adminlogin($adminUser, $adminPassword);
}
?>

<!DOCTYPE html>

<head>
	<meta charset="utf-8">
	<title>Admin Login</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
	<div class="container">
		<section id="content">


			<div class="card container py-2 mt-5  shadow p-3 mb-5 bg-body-tertiary rounded" style="width: 20rem;">
				<div class="card-body">
				<form action="login.php" method="post">
				<h3 class="text-center text-uppercase pb-3">Admin Login</h3>
				<span style="color: red;font-size: 18px;">
					<?php
					if (isset($loginchk)) {
						echo $loginchk;
					}
					?>
				</span>
				<div class="mb-3">
					<label for="email" class="form-label">Email address</label>
					<input type="text" name="adminUser" class="form-control" id="email" placeholder="Enter your username" aria-describedby="emailHelp">
				</div>
				<div class="mb-3">
					<label for="password" class="form-label">Password</label>
					<input type="password" name="adminPassword" class="form-control" placeholder="password" id="exampleInputPassword1">
				</div>
				<button type="submit" name="login" class="btn btn-success btn-sm me-2" value="Log in"><i class="fa fa-sign-in" aria-hidden="true"></i> Log in</button>
				<button type="reset" name="reset" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i> Reset</button>



			</form>
				</div>
			</div>


			
		</section>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>