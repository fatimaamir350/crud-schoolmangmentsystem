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
  <h3 class="mb-4">Add Teacher</h3>
  <form method="post" action="">
    <div class="mb-3">
      <label for="name" class="form-label">Teacher Name</label>
      <input type="text" class="form-control" name="teacher_name" id="teacher_name" required>
    </div>
     <div class="mb-3">
      <label for="name" class="form-label">Teacher Email</label>
      <input type="text" class="form-control" name="teacher_email" id="teacher_email" required>
    </div>
    <select class="form-control" name="subjectname" >
      <?php
      $sql = "SELECT * FROM `subjects`";
      $result = mysqli_query($conn,$sql);
      foreach($result as $data)
      {
        ?>
        <option value="<?php echo $data ['id']?>"><?php echo $data ['subject_name'] ?></option>
      <?php
      }
      ?>

    </select>
    
     <button type="submit" class="btn btn-success">Add Teacher</button>
</body>
</html>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $teachername = $_POST['teacher_name'];
    $teacheremail = $_POST['teacher_email'];
    $subjectname = $_POST ['subjectname'];

    $sql = "INSERT INTO `teachers` ( `tech_name`, `tech_email`, `subject_id`) VALUES ('$teachername','$teacheremail','$subjectname')";

    $result = mysqli_query($conn,$sql);

    if ($result) {
         echo "<script>
    alert('subject added successfully')
</script>";
    }
    else {
        echo "Error: " . mysqli_error($conn);
    }
}

?>