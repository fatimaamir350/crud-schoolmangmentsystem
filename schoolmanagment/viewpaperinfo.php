<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include_once("navbar.php"); ?>
</head>
<body>
     <div class="container mt-3">
    <h1 class="mt-3 text-center">View All Paper Information</h1>
<table class="table table-success table-striped">
     <tr>
    <th> id</th>
    <th>Papertypeid</th>
    <th>Subject id</th>
    <th>Class id</th>
    <th>Teacher id</th>
    <th>Title</th>
    <th>Date</th>
    <th>Duration</th>
    <th>Description</th>
    <th colspan="2">Action</th>
   </tr>
</body>
</html>


<?php

$sql = "SELECT p.id AS paper_id, pt.id AS paper_type_id, pt.term_name AS paper_type_name, s.id AS subject_id, s.subject_name, c.id AS class_id, c.class_name, t.id AS teacher_id, t.tech_name AS teacher_name, p.paper_title, p.paper_date, p.duration, p.description FROM papers p JOIN paper_types pt ON p.paper_type_id = pt.id JOIN subjects s ON p.subject_id = s.id JOIN classes c ON p.class_id = c.id JOIN teachers t ON p.teacher_id = t.id";

$result = mysqli_query($conn,$sql);

foreach ($result as $data)
{
    ?>

    <tr>
        <td><?php echo $data['paper_id']; ?></td>
        <td><?php echo $data['paper_type_id']; ?></td>
        <td><?php echo $data['subject_id']; ?></td>
        <td><?php echo $data['class_id']; ?></td>
        <td><?php echo $data['teacher_id']; ?></td>
        <td><?php echo $data['paper_title']; ?></td>
        <td><?php echo $data['paper_date']; ?></td>
        <td><?php echo $data['duration']; ?></td>
        <td><?php echo $data['description']; ?></td>
        <td><a class="btn btn-warning" href="updatepaperinfo.php?id=<?php echo $data['paper_id']; ?>">Edit</a></td>
     <td><a class="btn btn-danger" href="deletepaperinfo.php?id=<?php echo $data['paper_id']; ?>">Delete</a></td>
    </tr>

<?php
}




?>