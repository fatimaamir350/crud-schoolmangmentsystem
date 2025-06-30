<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include_once("navbar.php") ?>
</head>
<body>
     <div class="container mt-3">
    <h1 class="mt-3 text-center">View All Teachers</h1>
<table class="table table-success table-striped">
     <tr>
    <th>Teacher id</th>
    <th>Teacher name</th>
    <th>Teacher email</th>
     <th>Subject name</th>
    <th colspan="2">Action</th>
   </tr>
</body>
</html>

<?php
$sql = "SELECT teachers.id, teachers.tech_name, teachers.tech_email, subjects.subject_name 
        FROM teachers 
        INNER JOIN subjects ON teachers.subject_id = subjects.id";

$result = mysqli_query($conn,$sql);

foreach($result as $data)
{
    ?>
    <tr>
    <td><?php echo $data ['id']; ?></td>
    <td><?php echo $data ['tech_name']; ?></td>
    <td><?php echo $data ['tech_email']; ?></td>
    <td><?php echo $data ['subject_name']; ?></td>
     <td><a class="btn btn-warning" href="updateteacher.php?id=<?php echo $data['id']; ?>">Edit</a></td>
     <td><a class="btn btn-danger" href="deleteteacher.php?id=<?php echo $data['id']; ?>">Delete</a></td>
    </tr>
    

<?php
}

?>