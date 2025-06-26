<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include_once("navbar.php") ?>
</head>
<body>
    <div class="container mt-5" style="max-width: 600px;">
  <h3 class="mb-4">Add Term</h3>
  <form method="post" action="">
    <div class="mb-3">
      <label for="name" class="form-label">Term Name</label>
      <input type="text" class="form-control" name="term_name" id="term_name" required>
    </div>
     <button type="submit" class="btn btn-success">Add Term</button>
  </form>
</div>
</body>
</html>

<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $termname = $_POST['term_name'];

    $sql = "INSERT INTO `paper_types`(`term_name`) VALUES ('$termname')";

    $result = mysqli_query($conn,$sql);

    if ($result) {
         echo "<script>
    alert('term added successfully')
</script>";
    }
    else {
        echo "<script>
    alert('term  not added successfully')
</script>";
    }
}

?>