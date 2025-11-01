<?php

require_once("./config/db.php");

$id = $_GET["id"];

$result=mysqli_query($conn,"SELECT * FROM employees WHERE id=$id");

$record = mysqli_fetch_assoc($result);

if($_SERVER["REQUEST_METHOD"]==="POST"){
    $name=$_POST["name"];
    $department=$_POST["department"];
    $salary=$_POST["salary"];
    $hire_date = $_POST["hire_date"];

    $query="UPDATE employees SET name='$name',department='$department',salary='$salary',hire_date='$hire_date
    ' WHERE id = $id";

    if(mysqli_query($conn,$query)){
        header("Location:index.php");
        exit;
    }else{
        echo"Failed to create user".mysqli_error($conn);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <h1>Add new employee here in the system</h1>

    <div>

        <form action="" method="post">
            <label for="name">Name:</label>
            <input type="text" placeholder="Enter your name" name="name" value="<?php echo $record["name"];?>" required>
            <label for="department">Department:</label>
            <input type="text" placeholder="Enter your department" name="department" value="<?php echo $record["department"];?>" required>
              <label for="salary">Salary:</label>
              <input type="number" step="0" placeholder="Enter your salary" name="salary" value="<?php echo $record["salary"];?>">

              <label for="date">Hire date:</label>
              <input type="date" placeholder="Enter your hire_date" name="hire_date" value="<?php echo $record["hire_date"];?>">

              <button type="submit">Add new Employee</button>
        </form>
    </div>
</body>
</html>