<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include_once("navbar.php"); ?>
</head>
<body>
  <div style="max-width:600px; margin:80px auto; padding:30px; background-color:#ffffff; border:1px solid #ccc; border-radius:10px; box-shadow:0 0 15px rgba(0,0,0,0.1); font-family:'Segoe UI', sans-serif;">
  <h3 style="margin-bottom:25px; color:#333;"> Add Class</h3>

  <form method="post" action="">
    <div style="margin-bottom:20px;">
      <label for="class_name" style="display:block; margin-bottom:8px; font-weight:600; color:#444;">Class Name</label>
      <input type="text" id="class_name" name="class_name" required 
             style="width:100%; padding:10px 12px; border:1px solid #ccc; border-radius:5px; font-size:16px; box-sizing:border-box;">
    </div>

    <button type="submit" 
            style="background-color:#28a745; color:white; padding:10px 20px; border:none; border-radius:5px; font-size:16px; cursor:pointer;">
      Add Class
    </button>
  </form>
</div>

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
