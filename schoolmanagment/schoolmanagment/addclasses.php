<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include_once("navbar.php"); ?>
</head>
<body>
     <div class="container mt-5" style="max-width: 600px;">
  <h3 class="mb-4">Add Classes</h3>
  <form method="post" action="">
    <div class="mb-3">
      <label for="name" class="form-label">Class Name</label>
      <input type="text" class="form-control" name="class_name" id="class_name" required>
    </div>
     <button type="submit" class="btn btn-success">Add Class</button>
</body>
</html>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $classname = $_POST ['class_name'];

    $sql = "INSERT INTO `classes` (`class_name`) VALUES ('$classname')";

    $result = mysqli_query($conn,$sql);

    if ($result) {
        echo "<script>
    alert('inserted successfully')
</script>";
    }
    else {
         echo "Error: " . mysqli_error($conn);
    }
}

?>
