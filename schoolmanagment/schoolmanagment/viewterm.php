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
    <h1 class="mt-3 text-center">View All Term</h1>
<table class="table table-success table-striped">
     <tr>
    <th>Term id</th>
    <th>Term name</th>
    <th colspan="2">Action</th>
   </tr>
</body>
</html>

<?php
$sql = "SELECT * FROM `paper_types`";

$result = mysqli_query($conn,$sql);

foreach($result as $data)
{
    ?>

    <tr>
        <td><?php echo $data['id']; ?></td>
        <td><?php echo $data['term_name']; ?></td>
         <td><a class = "btn btn-warning" href="updateterm.php?id=<?php echo $data['id']?>">Edit</a></td>
        <td><a class = "btn btn-danger" href="deleteterm.php?id=<?php echo $data['id']?>">Delete</a></td>
    </tr>

<?php
}

?>