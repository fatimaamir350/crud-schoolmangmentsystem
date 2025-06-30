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

    $sql = "DELETE FROM `teachers` WHERE id=$id";
    $result = mysqli_query($conn,$sql);


    $sql2 = "DELETE FROM `subjects` WHERE id=$id";
    $result = mysqli_query($conn,$sql2);

    if ($result) {
       echo"<script>alert('deleted successfully successfully'); window.location.href='viewteacher.php';</script>";
        exit;
    }

    else {
        echo "Error: " . mysqli_error($conn);
    }








    ?>
</body>
</html>