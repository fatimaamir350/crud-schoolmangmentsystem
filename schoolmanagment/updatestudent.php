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


   <h3 style="font-family: Arial, sans-serif; margin-bottom: 20px; text-align: center;">Update Student</h3>

<form method="post" style="max-width: 600px; margin: auto; padding: 20px; border: 1px solid #ccc; border-radius: 10px;">

    <div class="mb-3" style="margin-bottom: 15px;">
        <label style="display: block; font-weight: bold; margin-bottom: 5px;">Name</label>
        <input type="text" name="stu_name" class="form-control"
               style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px;"
               value="<?= $row['stu_name'] ?>" required>
    </div>

    <div class="mb-3" style="margin-bottom: 15px;">
        <label style="display: block; font-weight: bold; margin-bottom: 5px;">Email</label>
        <input type="email" name="stu_email" class="form-control"
               style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px;"
               value="<?= $row['stu_email'] ?>" required>
    </div>

    <div class="mb-3" style="margin-bottom: 15px;">
        <label style="display: block; font-weight: bold; margin-bottom: 5px;">Phone</label>
        <input type="text" name="stu_phone" class="form-control"
               style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px;"
               value="<?= $row['stu_phone'] ?>" required>
    </div>

    <div class="mb-3" style="margin-bottom: 15px;">
        <label style="display: block; font-weight: bold; margin-bottom: 8px;">Gender</label>
        <input type="radio" name="stu_gender" value="Male" <?= $row['stu_gender'] == 'Male' ? 'checked' : '' ?>
               style="margin-right: 5px;"> Male
        <input type="radio" name="stu_gender" value="Female" <?= $row['stu_gender'] == 'Female' ? 'checked' : '' ?>
               style="margin-left: 15px; margin-right: 5px;"> Female
    </div>

    <div class="mb-3" style="margin-bottom: 15px;">
        <label style="display: block; font-weight: bold; margin-bottom: 5px;">Date</label>
        <input type="date" name="stu_date" class="form-control"
               style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px;"
               value="<?= $row['stu_date'] ?>" required>
    </div>

    <div class="mb-3" style="margin-bottom: 15px;">
        <label style="display: block; font-weight: bold; margin-bottom: 5px;">Class ID</label>
        <input type="text" name="stu_classid" class="form-control"
               style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px;"
               value="<?= $row['stu_class_id'] ?>" required>
    </div>

    <div class="mb-3" style="margin-bottom: 25px;">
        <label style="display: block; font-weight: bold; margin-bottom: 5px;">Address</label>
        <input type="text" name="stu_address" class="form-control"
               style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px;"
               value="<?= $row['stu_address'] ?>" required>
    </div>

    <button type="submit" class="btn btn-primary"
            style="background-color: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 5px;">
        Update
    </button>

</form>
