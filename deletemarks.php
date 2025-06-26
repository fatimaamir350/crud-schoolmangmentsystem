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


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM `paper_marks` WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>alert('Mark deleted successfully'); window.location.href='viewpapermark.php';</script>";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
}
?>

</body>
</html>