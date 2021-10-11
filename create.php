<?php include_once "autoload.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Add new student</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>

<body>
	<?php
		//student form//
		if(isset($_POST['add_student'])){
			$name = $_POST ['name'];
			$email = $_POST ['email'];
			$cell = $_POST ['cell'];
			
			$location = $_POST ['location'];
			$age = $_POST ['age'];

			if (isset($_POST['gender'])) {
				$gender = $_POST['gender'];
			} else {
				$gender = NULL;
			}
			$amount = $_POST ['amount'];
			

			//validitation form//
			if(empty($name)|| empty($email)|| empty($cell)||empty($age)||empty($location)|| empty($amount)){
				$msg = validate("All fields are Requre");
			}else if(emailCheck($email) == false)
			{	$msg = validate("Invaild email Address");

			}else if(cellcheck($cell) == false){
				$msg = validate("Invalid number");
			}else{
				$file_name = move($_FILES['photo'], 'media/students/');
				
				create("INSERT INTO students (name, email, cell, photo, location, age, gender, amount) VALUES ('$name','$email','$cell', '$file_name', '$location','$age','$gender','$amount')");

					$msg = validate("Youre successfully Submitted","success");
			}
		}
			?>
	<div class="wrap ">
		<a class="btn btn-sm btn-primary" href="index.php">All students</a>
		<br>
		<br>
		<div class="card shadow">
			<div class="card-body">
				<h2>Add new student</h2>
				<?php
					if(isset($msg)){
							echo $msg ;
					}
				?>
				<form action="" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label for="">Name</label>
						<input name="name" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input name="email" class="form-control"  type="text">
					</div>
					<div class="form-group">
						<label for="">Cell</label>
						<input name="cell" class="form-control"  type="text">
					</div>
					<div class="form-group">
						<label for="">Age</label>
						<input name="age" class="form-control"  type="text">
					</div>
					<div class="form-group">
						<label for="">location</label>
						<select class="form-control" name="location" id="">
						<option value="">-select-</option>
							<option value="Mirpur">Mirpur</option>
							<option value="Jatrabari">Jatrabari</option>
							<option value="Dhanmondhi">Dhanmondhi</option>
							<option value="Uttora">Uttora</option>
							<option value="Motijhil">Motijhil</option>
							<option value="Sahbagh">Sahbagh</option>
						</select>
					</div>	
					<div class="form-group">
						<label for="">Gender</label>
						<input name="gender" type="radio" value="Male" id="Male"> <label for="Male">Male</label>
						<input name="gender" type="radio" value="Female" id="Female"> <label for="Female">Female</label>
					</div>
					<div class="form-group">
						<label for="">Amount</label>
						<input name="amount" class="form-control"  type="text">
					</div>
					<div class="form-group">
						<label for="">photo</label>
						<input name="photo" class=""  type="file">
					</div>
					<div class="form-group">
						<input name="add_student" class="btn btn-primary" type="submit" value="Sign Up">
					</div>
				</form>
			</div>
		</div>
	</div>
	<br>
	<br>
	<br>
	<br>







	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>

</html>