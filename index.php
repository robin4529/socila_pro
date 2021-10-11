<?php include_once "autoload.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>All students</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>

<body>



	<div class="wrap-table ">
		<a class="btn btn-sm btn-primary" href="create.php">Add new student</a>
		<br>
		<br>
		<div class="card shadow">
			<div class="card-body">
				<h2>All Students</h2>
				<table class="table table-striped">
					<thead>
					
						<tr>
							<th>#</th>
							<th>name</th>
							<th>email</th>
							<th>Cell</th>
							<th>location</th>
							<th>Age</th>
							<th>gender</th>
							<th>Amount</th>
							<th>Photo</th>
							<th>Action</th>
						</tr>
						
					</thead>
					<tbody>
					<?php
							$i = 1;
							//$data =all('students');//

							$data= connect()-> query("SELECT* FROM students");

							$user= connect()-> query("SELECT SUM(amount) as minage FROM students");

							$usr = $user->fetch_object();
							 echo $usr->minage;


							

							while ( $stu= $data->fetch_object()):

							?>
								<tr>
								<td> <?php echo $i; $i++; ?></td>
								<td> <?php echo $stu->name ?> </td>
								<td> <?php echo $stu->email ?> </td>
								<td> <?php echo $stu->cell ?> </td>
								<td> <?php echo $stu->location ?> </td>
								<td> <?php echo $stu->age ?> </td>
								<td> <?php echo $stu->gender ?> </td>
								<td> <?php echo $stu->amount ?> </td>
								
								
								<td><img src="media/students/<?php echo $stu->photo ?>" alt=""></td>
								<td>
									<a class="btn btn-sm btn-info" href="#">View</a>
									<a class="btn btn-sm btn-warning" 
									href="update.php?edit_id=<?php echo $stu->id; ?>">
									Edit</a>
									<a class="btn btn-sm btn-danger" 
									href="delete.php?delete_id=<?php echo $stu->id; ?>">Delete</a>
								</td>
							</tr>
							<?php endwhile ?>
						</tbody>
				</table>
			</div>
		</div>
	</div>








	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>

</html>