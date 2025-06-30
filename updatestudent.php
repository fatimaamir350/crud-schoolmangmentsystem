<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


  
</head>
<?php
include_once ("navbar.php");
include_once ("config.php");
?>
<body>
   



<?php
include("config.php");


if (!isset($_GET['id'])) {
    die("ID missing.");
}
$id = intval($_GET['id']);


$sql = "SELECT * FROM students WHERE stu_id = $id";
$result = mysqli_query($conn, $sql);
if (!$result || mysqli_num_rows($result) == 0) {
    die("Student not found.");
}
$row = mysqli_fetch_assoc($result);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stuname = $_POST['stu_name'];
    $stuemail = $_POST['stu_email'];
    $stuphone = $_POST['stu_phone'];
    $stugender = $_POST['stu_gender'];
    $studate = $_POST['stu_date'];
    $stuclassid = $_POST['stu_classid'];
    $stuaddress = $_POST['stu_address'];

    $sql = "UPDATE students SET 
        stu_name='$stuname', 
        stu_email='$stuemail',
        stu_phone='$stuphone',
        stu_gender='$stugender',
        stu_date='$studate',
        stu_class_id='$stuclassid',
        stu_address='$stuaddress' 
        WHERE stu_id=$id";

    $res = mysqli_query($conn, $sql);
    if ($res) {
        echo "<script>alert('Updated'); window.location.href='viewstudent.php';</script>";
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>


 <div style="margin-left: 250px; padding: 30px; font-family: Arial, sans-serif;">
  <h3 style="text-align: center; margin-bottom: 30px; font-weight: bold; color: #333;">🎓 Update Student</h3>

  <form method="post" 
        style="max-width: 600px; margin: auto; padding: 25px; border: 1px solid #ccc; border-radius: 10px; background-color: #fff; box-shadow: 0 0 10px rgba(0,0,0,0.05);">

    <div style="margin-bottom: 15px;">
      <label style="font-weight: bold; margin-bottom: 5px; display: block;">👤 Name</label>
      <input type="text" name="stu_name"
             style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;"
             value="<?= $row['stu_name'] ?>" required>
    </div>

    <div style="margin-bottom: 15px;">
      <label style="font-weight: bold; margin-bottom: 5px; display: block;">📧 Email</label>
      <input type="email" name="stu_email"
             style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;"
             value="<?= $row['stu_email'] ?>" required>
    </div>

    <div style="margin-bottom: 15px;">
      <label style="font-weight: bold; margin-bottom: 5px; display: block;">📱 Phone</label>
      <input type="text" name="stu_phone"
             style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;"
             value="<?= $row['stu_phone'] ?>" required>
    </div>

    <div style="margin-bottom: 15px;">
      <label style="font-weight: bold; margin-bottom: 5px; display: block;">⚧ Gender</label>
      <label style="margin-right: 15px;">
        <input type="radio" name="stu_gender" value="Male" 
               <?= $row['stu_gender'] == 'Male' ? 'checked' : '' ?>> Male
      </label>
      <label>
        <input type="radio" name="stu_gender" value="Female" 
               <?= $row['stu_gender'] == 'Female' ? 'checked' : '' ?>> Female
      </label>
    </div>

    <div style="margin-bottom: 15px;">
      <label style="font-weight: bold; margin-bottom: 5px; display: block;">📅 Date</label>
      <input type="date" name="stu_date"
             style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;"
             value="<?= $row['stu_date'] ?>" required>
    </div>

    <div style="margin-bottom: 15px;">
      <label style="font-weight: bold; margin-bottom: 5px; display: block;">🏫 Class ID</label>
      <input type="text" name="stu_classid"
             style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;"
             value="<?= $row['stu_class_id'] ?>" required>
    </div>

    <div style="margin-bottom: 25px;">
      <label style="font-weight: bold; margin-bottom: 5px; display: block;">📍 Address</label>
      <input type="text" name="stu_address"
             style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;"
             value="<?= $row['stu_address'] ?>" required>
    </div>

    <button type="submit"
            style="width: 100%; background-color: #007bff; color: white; padding: 12px; border: none; border-radius: 5px; font-weight: bold;">
      ✅ Update
    </button>

  </form>
</div>
