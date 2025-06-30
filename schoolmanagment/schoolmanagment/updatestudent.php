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

// Check if ID is passed
if (!isset($_GET['id'])) {
    die("ID missing.");
}
$id = intval($_GET['id']);

// Fetch student data
$sql = "SELECT * FROM students WHERE stu_id = $id";
$result = mysqli_query($conn, $sql);
if (!$result || mysqli_num_rows($result) == 0) {
    die("Student not found.");
}
$row = mysqli_fetch_assoc($result);

// Handle update form
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


    <h3>Update Student</h3>
    <form method="post">
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="" class="form-control" value="<?= $row['stu_name'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="stu_email" class="form-control" value="<?= $row['stu_email'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Phone</label>
            <input type="text" name="stu_phone" class="form-control" value="<?= $row['stu_phone'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Gender</label><br>
            <input type="radio" name="stu_gender" value="Male" <?= $row['stu_gender'] == 'Male' ? 'checked' : '' ?>> Male
            <input type="radio" name="stu_gender" value="Female" <?= $row['stu_gender'] == 'Female' ? 'checked' : '' ?>> Female
        </div>
        <div class="mb-3">
            <label>Date</label>
            <input type="date" name="stu_date" class="form-control" value="<?= $row['stu_date'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Class ID</label>
            <input type="text" name="stu_classid" class="form-control" value="<?= $row['stu_class_id'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Address</label>
            <input type="text" name="stu_address" class="form-control" value="<?= $row['stu_address'] ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
</body>
</html>




