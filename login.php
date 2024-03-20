<?php include 'inc/header.php'; ?>
<?php
$login = Session::get("cuslogin");
if ($login == true) {
	header("Location:order.php");
}
?>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
	$custLogin = $cmr->customerLogin($_POST);
}

?>

<div class=" py-5 container">
	<div class="row">
		<div>
			<?php
			if (isset($custLogin)) {
				echo $custLogin;
			}
			?>


			<div class="card container shadow p-3 mb-5 bg-body-tertiary rounded" style="width: 20rem;">
				<div class="card-body">
					<h3 class="text-center text-uppercase pb-3">User Login Form</h3>
					<form action="" method="post">
						<?php if (isset($_GET['proid'])) { ?>
							<input type="hidden" name="proid" value="<?php echo $_GET['proid']; ?>">
						<?php } ?>
						<div class="mb-3">
							<label for="email" class="form-label">Email address</label>
							<input type="text" class="form-control" id="email" name="email" placeholder="Enter your email" aria-describedby="emailHelp">
						</div>
						<div class="mb-3">
							<label for="pass" class="form-label">Password</label>
							<input type="password" class="form-control" id="pass" name="pass" placeholder="password">
						</div>
						<button type="submit" name="login" class="btn btn-success btn-sm me-2"><i class="fa fa-sign-in" aria-hidden="true"></i> Sign In</button>
						<button type="reset" name="reset" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i> Reset</button>
					</form>
					<hr />
					<div class="mt-3">
						<a href="register.php" class="mt-3 p-2 text-center">Create New Account</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>