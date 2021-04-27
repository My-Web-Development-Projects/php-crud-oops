<?php
include 'database.php';

$obj = new Database();

$id = $_REQUEST['id'];
//echo $id;
$obj->select('students','*',null,'id='.$id,null,null);
$result = $obj->getResult();

if(isset($_POST['id']))
{
    $id = $_REQUEST['id'];
    $name = $_REQUEST['name'];
    $age = $_REQUEST['age'];
    $city = $_REQUEST['city'];

    $obj->update('students',['student_name'=>$name,'age'=>$age,'city'=>$city],'id='.$id);
    $upd = $obj->getResult();

    if($upd == true)
    {
      header("Location:read.php?success=Update Successful !!!");
    }
    else
    {
      header("Location:read.php?error=Update Not Successful !!!");
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Update</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
</head>
<body>
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            
         <h4 class="display-4 text-center">Update</h4>
        <hr><br>

        <?php foreach ($result as list("id"=>$id,"student_name"=>$name,"age"=>$age,"city"=>$city)) 
        { ?>

        <input type="hidden" name="id" value="<?php echo $id; ?>" />

        <div class="form-group">
           <label for="name">Name</label>
           <input type="text" class="form-control" name="name" 
           value="<?php echo $name; ?>" 
           required />
       </div>

       <div class="form-group">
           <label for="name">Age</label>
           <input type="text" class="form-control" name="age" 
           value="<?php echo $age; ?>" 
           required />
       </div>

       <div class="form-group">
           <label for="name">City</label>
           <input type="text" class="form-control" name="city" 
           value="<?php echo $city; ?>" 
           required />
       </div>

        <?php } ?>

       <input type="submit" class="btn btn-primary" name="submit" value="Update" />
       <div class="link-right">
        <a href="read.php" class="link-primary" style="color: #0062cc; font-size: 18px;">
        Click Here for View</a>
    </div>
</form>
</div>
</body>
</html>