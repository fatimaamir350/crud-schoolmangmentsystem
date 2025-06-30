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
    $id=$_GET['id'];

    $sql1 = "DELETE FROM `paper_contents` WHERE id =$id";

    $result1 = mysqli_query($conn,$sql1);


    $sql2 = "DELETE FROM `paper_types` WHERE id=$id";

    $result2 = mysqli_query($conn,$sql2);

    if($result1)
    {
        echo "<div style='color:green; text-align:center; margin-top:10px;'> Paper content deleted successfully.</div>";
    }
    else
    {
         echo "<div style='color:red; text-align:center; margin-top:10px;'> Error: " . mysqli_error($con) . "</div>";
    }



      ?>
</body>
</html>