<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include_once ("config.php"); ?>
</head>
<body>
    <?php
    if(isset($_GET['id']))
    {
        $id = $_GET ['id'];

        $sql = "DELETE FROM `students` where stu_id=$id";

        $result = mysqli_query($conn,$sql);

        if ($result) {
               echo "<script>alert
            ('deleted successfully');
            window.location.href = 'viewstudent.php';
        </script>";
        }
        else {
             echo "Error: " . mysqli_error($conn);
        }

    }
    ?>
    
</body>
</html>