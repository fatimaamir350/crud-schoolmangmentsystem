<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include_once("navbar.php") ?>
</head>
<body>
    <?php
    $id = $_GET['id'];

    $sql =  "SELECT * FROM `subjects` WHERE id =$id";

    $result = mysqli_query($conn,$sql);

    $data = mysqli_fetch_assoc($result);

    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
         $subjectname = $_POST ['subject_name'];

         $sql = "UPDATE `subjects` SET `subject_name`='$subjectname' WHERE id = $id";

         $result = mysqli_query($conn,$sql);

         if ($result) {
            echo   "<script>alert('Updated'); window.location.href='viewsubjects.php';</script>";
        exit;
         }

         else {
             echo "Error: " . mysqli_error($conn);
         }
    }
    

    ?>

    <div style="max-width:600px; margin:80px auto; padding:30px; background-color:#fff; border:1px solid #ddd; border-radius:10px; box-shadow:0 0 10px rgba(0,0,0,0.1); font-family:'Segoe UI', sans-serif;">
  
  <!-- Heading -->
  <h3 style="margin-bottom:25px; color:#333; text-align:center;">✏️ Update Student</h3>

  <!-- Form -->
  <form method="post">

    <!-- Student Name -->
    <div style="margin-bottom:20px;">
      <label for="subject_name" style="display:block; margin-bottom:8px; font-weight:600; color:#444;">Student Name</label>
      <input type="text" name="subject_name" id="subject_name"
             value="<?= $data['subject_name'] ?>" required
             style="width:100%; padding:10px 12px; border:1px solid #ccc; border-radius:5px; font-size:16px; box-sizing:border-box;">
    </div>

    <!-- Submit Button -->
    <button type="submit"
            style="background-color:#007bff; color:white; padding:10px 20px; border:none; border-radius:5px; font-size:16px; cursor:pointer;">
      🔄 Update
    </button>

  </form>
</div>

</body>
</html>