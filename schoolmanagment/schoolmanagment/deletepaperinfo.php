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


$id = (int)$_GET['id']; 
$sql = "SELECT * FROM papers WHERE id = $id";
$result = mysqli_query($conn, $sql);


if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    $paper_type_id = $row['paper_type_id'];
    $subject_id    = $row['subject_id'];
    $class_id      = $row['class_id'];
    $teacher_id    = $row['teacher_id'];

   
    $deletePaper = "DELETE FROM papers WHERE id = $id";
    if (mysqli_query($conn, $deletePaper)) {
        echo "<script>alert('Paper deleted successfully'); window.location.href='viewpaperinfo.php';</script>";
    } else {
        echo "<script>alert('Failed to delete paper: " . mysqli_error($conn) . "'); window.location.href='viewpaperinfo.php';</script>";
    }

 
}

?>

</body>
</html>