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
    <th>Paperid</th>
    <th>Content </th>
    <th>file path</th>
    <th colspan="2">Action</th>
   </tr>
</body>
</html>
<?php
$sql = "SELECT paper_contents.id, paper_contents.paper_id, paper_contents.content, paper_contents.file_path, papers.paper_title 
        FROM paper_contents 
        JOIN papers ON paper_contents.paper_id = papers.id";

$result = mysqli_query($conn,$sql);

foreach($result as $data)
{
    ?>
    <tr>
     <td><?php echo $data['id']; ?></td>
     <td><?php echo $data['paper_id']; ?></td>
     <td><?php echo $data['content']; ?></td>
     <td><img style= "height:100px;width:100px" src="upload/<?php echo $data['file_path'] ?>" alt=""></td>
    <td><a class="btn btn-warning" href="updatepapercon.php?id=<?php echo $data['id']; ?>">Edit</a></td>
    <td><a class="btn btn-danger" href="deletepapercon.php?id=<?php echo $data['id']; ?>">Delete</a></td>
    </tr>

   







<?php
}

?>

