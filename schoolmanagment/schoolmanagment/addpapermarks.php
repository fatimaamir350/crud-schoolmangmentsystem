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
  <h3 class="mb-4">Add Obtained Marks</h3>
  <form method="post" action="">
    <div class="mb-3">
      <label for="name" class="form-label">obtained Marks</label>
      <input type="text" class="form-control" name="obt_marks" id="obt_marks" required>
    </div>

    <select class="form-control" name="paper_id" >
      <?php
      $sql = "SELECT * FROM `papers`";
      $result = mysqli_query($conn,$sql);
      foreach($result as $data)
      {
        ?>
        <option value="<?php echo $data ['id']?>"><?php echo $data ['paper_type_id'] ?></option>
      <?php
      }
      ?>
    </select>

      <select class="form-control" name="student_id" >
      <?php
      $sql = "SELECT * FROM `students`";
      $result = mysqli_query($conn,$sql);
      foreach($result as $data)
      {
        ?>
        <option value="<?php echo $data ['stu_id']?>"><?php echo $data ['stu_name'] ?></option>
      <?php
      }
      ?>
    </select>


     <button type="submit" class="btn btn-success">Add marks</button>

   
  </form>
</body>
</html>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $paper_id = $_POST['paper_id'];
    $student_id = $_POST['student_id'];
    $marks_obtained = $_POST['obt_marks'];

    $sql = "INSERT INTO `paper_marks` (`paper_id`, `student_id`, `marks_obtained`) VALUES ('$paper_id', '$student_id', '$marks_obtained')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>alert('Marks added successfully');</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

?>