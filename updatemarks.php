<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include_once("navbar.php"); ?>
</head>
<body>
    <?php
    $id = $_GET['id'];

    $sql = "SELECT * FROM `paper_marks` WHERE id=$id";

    $result = mysqli_query($conn,$sql);

    $data  = mysqli_fetch_assoc($result);

    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
         $paper_id = $_POST['paper_id'];
        $student_id = $_POST['student_id'];
        $marks_obtained = $_POST['obt_marks'];

        $sql = "UPDATE `paper_marks` SET `paper_id`='$paper_id',`student_id`='$student_id'
        ,`marks_obtained`='$marks_obtained' WHERE id = $id ";

        $result = mysqli_query($conn,$sql);

        if ($result) {
            echo"<script>alert(' marks Updated successfully'); window.location.href='viewpapermark.php';</script>";
        }
        else {
            echo "Error: " . mysqli_error($conn);
        }
    }
    ?>
</body>
</html>

<div style="max-width:600px; margin:80px auto; padding:30px; background-color:#fff; border:1px solid #ddd; border-radius:10px; box-shadow:0 0 10px rgba(0,0,0,0.1); font-family:'Segoe UI', sans-serif;">

  <!-- Heading -->
  <h3 style="margin-bottom:25px; color:#333; text-align:center;">📝 Update Marks</h3>

  <!-- Form -->
  <form method="post">

    <!-- Obtained Marks -->
    <div style="margin-bottom:20px;">
      <label for="obt_marks" style="display:block; margin-bottom:8px; font-weight:600; color:#444;">Obtained Marks</label>
      <input type="text" name="obt_marks" id="obt_marks" 
             value="<?= $data['marks_obtained'] ?>" required
             style="width:100%; padding:10px 12px; border:1px solid #ccc; border-radius:5px; font-size:16px; box-sizing:border-box;">
    </div>

    <!-- Select Paper -->
    <div style="margin-bottom:20px;">
      <label for="paper_id" style="display:block; margin-bottom:8px; font-weight:600; color:#444;">Select Paper</label>
      <select name="paper_id" id="paper_id"
              style="width:100%; padding:10px 12px; border:1px solid #ccc; border-radius:5px; font-size:16px; box-sizing:border-box;" required>
        <?php
        $sql = "SELECT * FROM `papers`";
        $result = mysqli_query($conn, $sql);
        foreach ($result as $data) {
          $selected = ($paper_id == $data["id"]) ? "selected" : "";
        ?>
          <option value="<?= $data['id'] ?>" <?= $selected ?>><?= $data['paper_type_id'] ?></option>
        <?php } ?>
      </select>
    </div>

    <!-- Select Student -->
    <div style="margin-bottom:25px;">
      <label for="student_id" style="display:block; margin-bottom:8px; font-weight:600; color:#444;">Select Student</label>
      <select name="student_id" id="student_id"
              style="width:100%; padding:10px 12px; border:1px solid #ccc; border-radius:5px; font-size:16px; box-sizing:border-box;" required>
        <?php
        $sql = "SELECT * FROM `students`";
        $result = mysqli_query($conn, $sql);
        foreach ($result as $data) {
          $selected = ($student_id == $data["stu_id"]) ? "selected" : "";
        ?>
          <option value="<?= $data['stu_id'] ?>" <?= $selected ?>><?= $data['stu_name'] ?></option>
        <?php } ?>
      </select>
    </div>

    <!-- Submit Button -->
    <button type="submit"
            style="background-color:#007bff; color:white; padding:10px 20px; border:none; border-radius:5px; font-size:16px; cursor:pointer;">
      🔄 Update
    </button>

  </form>
</div>
