<?php
require_once("./config/db.php");

$id = $_GET["id"];

echo $id;

$query ="DELETE FROM employees WHERE id = $id";

if(mysqli_query($conn,$query)){
    header("Location:index.php");
    exit;
}else{
    echo "delete failed".mysqli_error($conn);
}


?>