<?php
include 'database.php';

$obj = new Database();

$id = $_REQUEST['id'];
//echo $id;

$obj->delete('students', 'id='.$id);
$result = $obj->getResult();

if($result == true)
{
    header("Location: read.php?success=Delete Successful!!");
}
else
{
    header("Location: read.php?error=Delete Not Successful!!");
}

?>