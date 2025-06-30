<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include_once("navbar.php"); ?>
</head>
<body>
    
   <div style="max-width:600px; margin:80px auto; padding:30px; background-color:#fff; border:1px solid #ddd; border-radius:10px; box-shadow:0 0 15px rgba(0,0,0,0.1); font-family:'Segoe UI', sans-serif;">
  <h3 style="margin-bottom:25px; color:#333;">📝 Add Obtained Marks</h3>

  <form method="post" action="">
    
    <!-- Obtained Marks -->
    <div style="margin-bottom:20px;">
      <label for="obt_marks" style="display:block; margin-bottom:8px; font-weight:600; color:#444;">Obtained Marks</label>
      <input type="text" id="obt_marks" name="obt_marks" required 
             style="width:100%; padding:10px 12px; border:1px solid #ccc; border-radius:5px; font-size:16px; box-sizing:border-box;">
    </div>

    <!-- Paper Select -->
    <div style="margin-bottom:20px;">
      <label for="paper_id" style="display:block; margin-bottom:8px; font-weight:600; color:#444;">Select Paper</label>
      <select name="paper_id" required 
              style="width:100%; padding:10px 12px; border:1px solid #ccc; border-radius:5px; font-size:16px; box-sizing:border-box;">
        <?php
        $sql = "SELECT * FROM `papers`";
        $result = mysqli_query($conn, $sql);
        foreach ($result as $data) {
        ?>
          <option value="<?php echo $data['id']; ?>"><?php echo $data['paper_type_id']; ?></option>
        <?php } ?>
      </select>
    </div>

    <!-- Student Select -->
    <div style="margin-bottom:25px;">
      <label for="student_id" style="display:block; margin-bottom:8px; font-weight:600; color:#444;">Select Student</label>
      <select name="student_id" required 
              style="width:100%; padding:10px 12px; border:1px solid #ccc; border-radius:5px; font-size:16px; box-sizing:border-box;">
        <?php
        $sql = "SELECT * FROM `students`";
        $result = mysqli_query($conn, $sql);
        foreach ($result as $data) {
        ?>
          <option value="<?php echo $data['stu_id']; ?>"><?php echo $data['stu_name']; ?></option>
        <?php } ?>
      </select>
    </div>

    <!-- Submit Button -->
    <button type="submit" 
            style="background-color:#28a745; color:white; padding:10px 20px; border:none; border-radius:5px; font-size:16px; cursor:pointer;">
      ➕ Add Marks
    </button>
  </form>
</div>

</body>
</html>

<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $paper_id = $_POST['paper_id'];
    $student_id = $_POST['student_id'];
    $marks_obtained = $_POST['obt_marks'];

    $sql = "INSERT INTO `paper_marks` (`paper_id`, `student_id`, `marks_obtained`) 
            VALUES ('$paper_id', '$student_id', '$marks_obtained')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>alert('Marks added successfully');</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

