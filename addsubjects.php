<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    include_once ("navbar.php");
    include_once ("config.php");
    ?>
</head>
<body>
    <div class="container mt-5" style="max-width: 600px;">
  <h3 class="mb-4">Add subjects</h3>
  <form method="post" action="">
    <div class="mb-3">
      <label for="name" class="form-label">subject Name</label>
      <input type="text" class="form-control" name="sub_name" id="sub_name" required>
    </div>
     <button type="submit" class="btn btn-success">Add subject</button>

   
  </form>
</div>
</body>
</html>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $subjectname = $_POST ['sub_name'];

    $sql = "INSERT INTO `subjects` ( `subject_name`) VALUES ('$subjectname')";

    $result = mysqli_query($conn,$sql);

    if ($result) {
       echo "<script>
    alert('subject added successfully')
</script>";
    }

  else {
    echo "<script>
    alert('subject  not added successfully')
</script>";
  }  
}

?>
