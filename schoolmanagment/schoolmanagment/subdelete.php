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
    $id =$_GET ['id'];

    $sql = "DELETE FROM `subjects` WHERE id=$id";

    $result = mysqli_query($conn,$sql);

    if ($result) {
        echo   "<script>alert('deleted successfully'); window.location.href='viewsubjects.php';</script>";
    }
    else {
          echo "Error: " . mysqli_error($conn);
    }


    ?>
</body>
</html>
