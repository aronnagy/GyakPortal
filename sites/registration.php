<?php

define('PROMOCIO', "default_prom");

if (isset($_POST["save"])) {
	//data trans happened
	print "<pre>";
	print_r($_POST);
	print "</pre>";

	//empty inspect the values of the existed variables, if empty then true, else false
	if (
		!empty($_POST['firstName'])
		&&
		!empty($_POST['lastName'])
		&&
		!empty($_POST['email'])
		&&
		!empty($_POST['promotionCode'])
		&&
		!empty($_POST['passwordAgain'])
	) {
			$firstName = $_POST['firstName'];
			$lastName = $_POST['lastName'];
			$email = $_POST['email'];
			$sex = $_POST['sex'];
			$promotionCode = $_POST['promotionCode'];


			$sql =  "INSERT INTO users VALUES
				(NULL,'{$firstName}','{$lastName}','{$email}','{$sex}','{$promotionCode}');
			";

			if ($conn->query($sql)) {
				print "Sikeres regisztráció";
			} else {
				print $conn->error;
			}
		} else {
		print("Töltse ki a megfelelő mezőket!");
	}
}
?>
<div class="card">
	<div class="card-header bg-primary text-white">Registration Form</div>
	<div class="card-body">
		<form id="post" action="" method="post" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-5">
					<label for="firstName">First Name</label>
					<div class="form-group">
						<input type="text" name="firstName" id="firstName" class="form-control" placeholder="First Name">
					</div>
				</div>
				<div class="col-md-5">
					<label for="lastName">Last Name</label>
					<div class="form-group">
						<input type="text" name="lastName" id="lastName" class="form-control" placeholder="Last Name">
					</div>
				</div>
				<div class="col-md-2">
					<label for="promotionCode">Promotion Code</label>
					<div class="form-group">
						<input type="text" name="promotionCode" id="promotionCode" class="form-control" placeholder="Promotion Code">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="email">E-mail</label>
						<input type="email" name="email" id="email" placeholder="E-mail" class="form-control">
					</div>
				</div>
				<div class="col-md-6">
					<label for="sex">Sex</label>
					<div class="form-group">
						<div class="form-check-inline">
							<input type="radio" name="sex" id="male" value="Male" class="form-check-input" checked>
							<label for="male" class="form-check-label">Male</label>
						</div>
						<div class="form-check-inline">
							<input type="radio" name="sex" id="female" value="Female" class="form-check-input">
							<label for="female" class="form-check-label">Female</label>
						</div>
					</div>
				</div>
			</div>
			<button id="sbumit" type="submit" name="save" class="btn btn-primary">Submit</button>
		</form>
	</div>
</div>