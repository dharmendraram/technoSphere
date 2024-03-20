<?php include 'inc/header.php'; ?>
<div class="py-5 container">
	<div class="row">
		<?php



		if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
			$name = $_POST['name'];
			// $city = $_POST['city'];
			$country = $_POST['country'];
			$phone = $_POST['phone'];
			$pass = $_POST['pass'];


			$uppercase = preg_match('@[A-Z]@', $pass);
			$lowercase = preg_match('@[a-z]@', $pass);
			$number    = preg_match('@[0-9]@', $pass);
			$specialChars = preg_match('@[^\w]@', $pass);
			// if (!preg_match('/^[A-Za-z]+$/', $name)) {
			if (!preg_match("/^[A-Za-z\s'-]+$/u", $name)) {
				echo "<script>alert('Error: Name should contain only letters.');</script>";
			} elseif (!preg_match('/^[A-Za-z]+$/', $country)) {
				echo "<script>alert('Error: Country should contain only letters.');</script>";
			} elseif (strlen($phone) !== 10 || !ctype_digit($phone)) {
				echo "<script>alert('Error: Phone number should contain exactly 10 digits.');</script>";
			} elseif (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($pass) < 8) {
				echo "<script>alert('Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.')</script>";
			}
			// elseif (strlen($pass) < 8) {
			// 	echo "<script>alert('Error: Password should be at least 8 characters long.');</script>";
			// } 
			else {
				$customerReg = $cmr->customerRegistration($_POST);
			}
		}
		?>
		<div>
			<?php

			if (isset($customerReg)) {
				echo $customerReg;
			}
			?>
			<div class="card container shadow p-3 mb-5 bg-body-tertiary rounded" style="width: 30rem;">
				<div class="card-body">
					<h3 class="pb-3 text-center">Register New Account</h3>
					<form action="" method="post">

						<div class="mb-3">
							<div class="row align-items-center">
								<div class="col-lg-3"><label for="name" class="form-label">Name: </label></div>
								<div class="col-lg-9"><input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" aria-describedby="emailHelp"></div>
							</div>
						</div>
						<!-- 
				<div class="mb-3">
					<div class="row">
						<div class="col-lg-3"><label for="city" class="form-label">City: </label></div>
						<div class="col-lg-9"><input type="text" class="form-control" id="city" name="city" placeholder="Enter your city name" aria-describedby="emailHelp"></div>
					</div>
				</div> -->

						<!-- <div class="mb-3">
					<div class="row">
						<div class="col-lg-3"><label for="zip" class="form-label">Zip Code: </label></div>
						<div class="col-lg-9"><input type="text" class="form-control" id="zip" name="zip" placeholder="Zip-Code" aria-describedby="emailHelp"></div>
					</div>
				</div> -->
						<div class="mb-3">
							<div class="row align-items-center">
								<div class="col-lg-3"><label for="email" class="form-label">Email: </label></div>
								<div class="col-lg-9"><input type="email" class="form-control" id="email" name="email" placeholder="email" aria-describedby="emailHelp"></div>
							</div>


						</div>

						<div class="mb-3">
							<div class="row align-items-center">
								<div class="col-lg-3"><label for="address" class="form-label">Address: </label></div>
								<div class="col-lg-9"><input type="text" class="form-control" id="address" name="address" placeholder="Address" aria-describedby="emailHelp"></div>
							</div>


						</div>

						<div class="mb-3">
							<div class="row align-items-center">
								<div class="col-lg-3"><label for="country" class="form-label">Country: </label></div>
								<div class="col-lg-9"><input type="text" class="form-control" id="country" name="country" placeholder="Country" aria-describedby="emailHelp"></div>
							</div>


						</div>

						<div class="mb-3">
							<div class="row align-items-center">
								<div class="col-lg-3"><label for="phone" class="form-label">Phone: </label></div>
								<div class="col-lg-9"><input type="text" class="form-control" id="phone" name="phone" placeholder="phone" aria-describedby="emailHelp"></div>
							</div>


						</div>

						<div class="mb-3">
							<div class="row align-items-center">
								<div class="col-lg-3"><label for="pass" class="form-label">Password: </label></div>
								<div class="col-lg-9"><input type="text" class="form-control" id="pass" name="pass" placeholder="password ..." aria-describedby="emailHelp"></div>
							</div>
						</div>
						<div class="col-lg-9 offset-3">
							<button type="submit" name="register" class="btn btn-success btn-sm me-2"><i class="fa fa-plus" aria-hidden="true"></i> Create Account</button>
							<button type="reset" name="reset" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i> Reset</button>
						</div>
					</form>
				</div>
			</div>


		</div>
	</div>
</div>