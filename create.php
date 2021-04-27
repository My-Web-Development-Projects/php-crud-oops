<?php
include 'database.php';

$obj = new Database();

// $obj->insert('students',['student_name'=>'Yiren','age'=>'22','city'=>'Shanghai']);
// echo "Insert result is: ";
// print_r($obj->getResult());

if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $age = $_POST['age'];
    $city = $_POST['city'];

    $value = ["student_name"=>$name, "age"=>$age, "city"=>$city];

    if($obj->insert("students",$value))
    {
        header("Location:read.php?success=Record Successful !!!");
    }
    else
    {
        header("Location:read.php?error=Record Not Successful !!!");
    }
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Create</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
</head>
<body>
	<div class="container">
		<form action="" method="post" enctype="multipart/form-data">
            
           <h4 class="display-4 text-center">Create</h4>
		   
		   <?php if (isset($_GET['success'])) { ?>
			<div class="alert alert-success" role="alert">
				<?php echo $_GET['success']; ?>
			</div>
			<?php } if (isset($_GET['error'])) { ?>
			<div class="alert alert-danger" role="alert">
				<?php echo $_GET['error']; ?>
			</div>
			<?php } ?>
           
        <hr><br>
        <div class="form-group">
         <label for="name">Name</label>
         <input type="text" class="form-control" name="name" placeholder="Enter Name" required />
     </div>

     <div class="form-group">
         <label for="phone">Age</label>
         <input type="text" class="form-control" name="age" placeholder="Enter Age" required />
     </div>

     <div class="form-group">
         <label for="phone">City</label>
         <input type="text" class="form-control" name="city" placeholder="Enter City" required />
     </div>

     <input type="submit" class="btn btn-primary" name="submit" value="Create" />
     
     <div class="link-right">
        <a style="color: #0062cc; font-size: 18px;" href="read.php" class="link-primary">
        Click Here for View</a>
    </div>
</form>
</div>
</body>
</html>
