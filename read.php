<?php
include 'database.php';

$obj = new Database();

// $obj->sql('SELECT * FROM students');
// echo "SQL result is: ";
// print_r($obj->getResult());

$colname = "students.id, students.student_name, students.age, students.city";
$limit = 5;

$obj->select('students','*',null,null,null,$limit);
$result = $obj->getResult();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Read</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="box">
			<h4 class="display-4 text-center">Read<br></h4>

			<?php if (isset($_GET['success'])) { ?>
			<div class="alert alert-success" role="alert">
				<?php echo $_GET['success']; ?>
			</div>
			<?php } if (isset($_GET['error'])) { ?>
			<div class="alert alert-danger" role="alert">
				<?php echo $_GET['error']; ?>
			</div>
			<?php } ?>

			<div class="col-lg-12">
				<a class="btn btn-primary m-1 float-left" href="create.php">Add New Record</a>
			</div>
			
			<table class="table table-bordered" style="margin-top: 3%;">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Age</th>
						<th>City</th>
						<th>Delete</th>
						<th>Edit</th>
					</tr>
				</thead>
				<tbody>
					<?php
                    $count = 1;
					foreach ($result as list("id"=>$id,"student_name"=>$name,"age"=>$age,"city"=>$city)) 
                    {
						?>
						<tr>
							<td><?php echo $count; ?></td>
							<td><?php echo $name; ?></td>
							<td><?php echo $age; ?></td>
                            <td><?php echo $city; ?></td>
							<td><a class="btn btn-danger" 
								href="delete.php?id=<?php echo $id; ?>">Delete</a>
							</td>
							<td><a class="btn btn-success" 
								href="update.php?id=<?php echo $id; ?>">Edit</a>
							</td>
						</tr>
				</tbody>
					<?php
                    $count++;
						}
					?>
			</table>
		</div>
        <div class="pagination">
            <?php echo $obj->pagination('students',null,null,$limit); ?>
        </div>
    </div>

<style>

.pagination{ text-align: center; }
.pagination a {
  color: #000000;
  padding: 8px 16px;
  text-decoration: none;
  transition: background-color .3s;
  border-radius: .25rem;
}

.pagination a.active {
  background-color: #28a745;
  color: white;
}

.pagination a:hover:not(.active) {background-color: #007bff; color: #ffffff;}

</style>


<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.min.js"></script>
</body>
</html>