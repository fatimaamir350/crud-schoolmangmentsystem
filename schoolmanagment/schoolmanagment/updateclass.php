<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include_once("navbar.php"); ?>
</head>
<?php
// var_dump($_GET['id']);
// exit;

?>
<body>
    <?php
    $id = $_GET['id'];
    

    $sql = "SELECT * FROM `classes` WHERE id=$id";

    $result = mysqli_query($conn,$sql);

    $data = mysqli_fetch_assoc($result);

    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $classname = $_POST ['class_name'];

        $sql =  " UPDATE `classes` SET `class_name`='$classname' WHERE id=$id";

        $result = mysqli_query($conn,$sql);

        if ($result) {
            echo     "<script>alert('Updated'); window.location.href='viewclass.php';</script>";
        exit;
        }
        else {
             echo "Error: " . mysqli_error($conn);
        }

    }


    ?>
</body>
</html>
 <h3>Update Class</h3>
        <form method="post">
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="class_name" class="form-control" value="<?= $data['class_name'] ?>" required>

            </div>
         

                <button type="submit" class="btn btn-primary">Update</button>

            </form>
            