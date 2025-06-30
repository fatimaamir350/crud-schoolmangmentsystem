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
    <h1 class="mt-3 text-center">View All Marks</h1>
<table class="table table-success table-striped">
     <tr>
    <th> id</th>
    <th>Paper id</th>
    <th>Student id</th>
     <th>obtained_marks</th>
    <th colspan="2">Action</th>
   </tr>
</body>
</html>
<?php
$sql = "SELECT paper_marks.id, paper_marks.marks_obtained, papers.id AS paper_id, papers.paper_title, students.stu_id AS student_id, students.stu_name FROM paper_marks INNER JOIN papers ON paper_marks.paper_id = papers.id INNER JOIN students ON paper_marks.student_id = students.stu_id";

$result = mysqli_query($conn,$sql);

foreach($result as $data)
{
    ?>
 <tr>
    <td><?php echo $data ["id"]; ?></td>
    <td><?php echo $data ["paper_id"]; ?></td>
    <td><?php echo $data ["student_id"]; ?></td>
    <td><?php echo $data ["marks_obtained"]; ?></td>
    <td><a class="btn btn-warning" href="updatemarks.php?id=<?php echo $data['id']; ?>">Edit</a></td>
    <td><a class="btn btn-danger" href="deletemarks.php?id=<?php echo $data['id']; ?>">Delete</a></td>
 </tr>   



<?php
}



?>