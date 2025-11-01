<?php
require_once("./config/db.php");

$qry="SELECT * FROM employees";
$records = mysqli_query($conn,$qry);
$count = mysqli_num_rows($records);





?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>welcome to simple employee management system</h1>


     <p>
        <a href="./create.php">Create new Employee</a>
     </p>
    <section>

     <table border="1" cellpadding="0" cellspacing="0" width="100%">
        <thead>
                 <tr>
            <th>id</th>
            <th>names</th>
            <th>department</th>
            <th>salary</th>
            <th>hire_date</th>
            <th>Action</th>
        </tr>
        </thead>

        <tbody>
            <?php $id=1; while($rows=mysqli_fetch_assoc($records)){ ?>
            <tr>
                <td><?php echo $id++;?></td>
                <td><?php echo $rows["name"];?></td>
                 <td><?php echo $rows["department"];?></td>
                 <td><?php echo $rows["salary"];?></td>
                 <td><?php echo $rows["hire_date"];?></td>
                <td>
                    <a href="delete.php?id=<?php echo $rows["id"]?>" onclick="return confirm('Are you sure?')">Delete</a>|
                    <a href="edit.php?id=<?php echo $rows["id"]?>">Edit</a>
                </td>
            </tr>
            <?php }?>
        </tbody>
             
     </table>
     <?php
               if($count===0){
                echo "<p style='text-align:center'>No records found</p>";
               }

             ?>
    </section>
</body>
</html>