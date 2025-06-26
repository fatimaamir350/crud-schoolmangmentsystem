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
 <h3 style="font-family: Arial, sans-serif; margin-bottom: 20px; text-align: center;">Update Class</h3>

<form method="post" style="max-width: 500px; margin: auto; padding: 20px; border: 1px solid #ccc; border-radius: 10px;">
    
    <div style="margin-bottom: 15px;">
        <label style="display: block; font-weight: bold; margin-bottom: 5px;">Class Name</label>
        <input type="text" name="class_name" value="<?= $data['class_name'] ?>" 
            style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px;" required>
    </div>

    <button type="submit" 
        style="background-color: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 5px;">
        Update
    </button>

</form>
