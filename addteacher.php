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
  <h3 style="margin-bottom:25px; color:#333;">👨‍🏫 Add Teacher</h3>

  <form method="post" action="">

    <!-- Teacher Name -->
    <div style="margin-bottom:20px;">
      <label for="teacher_name" style="display:block; margin-bottom:8px; font-weight:600; color:#444;">Teacher Name</label>
      <input type="text" name="teacher_name" id="teacher_name" required 
             style="width:100%; padding:10px 12px; border:1px solid #ccc; border-radius:5px; font-size:16px; box-sizing:border-box;">
    </div>

    <!-- Teacher Email -->
    <div style="margin-bottom:20px;">
      <label for="teacher_email" style="display:block; margin-bottom:8px; font-weight:600; color:#444;">Teacher Email</label>
      <input type="text" name="teacher_email" id="teacher_email" required 
             style="width:100%; padding:10px 12px; border:1px solid #ccc; border-radius:5px; font-size:16px; box-sizing:border-box;">
    </div>

    <!-- Subject Dropdown -->
    <div style="margin-bottom:25px;">
      <label for="subjectname" style="display:block; margin-bottom:8px; font-weight:600; color:#444;">Select Subject</label>
      <select name="subjectname" id="subjectname" required
              style="width:100%; padding:10px 12px; border:1px solid #ccc; border-radius:5px; font-size:16px; box-sizing:border-box;">
        <?php
        $sql = "SELECT * FROM `subjects`";
        $result = mysqli_query($conn,$sql);
        foreach($result as $data) {
        ?>
          <option value="<?php echo $data['id']; ?>"><?php echo $data['subject_name']; ?></option>
        <?php } ?>
      </select>
    </div>

    <!-- Submit Button -->
    <button type="submit"
            style="background-color:#28a745; color:white; padding:10px 20px; border:none; border-radius:5px; font-size:16px; cursor:pointer;">
      ➕ Add Teacher
    </button>

  </form>
</div>

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