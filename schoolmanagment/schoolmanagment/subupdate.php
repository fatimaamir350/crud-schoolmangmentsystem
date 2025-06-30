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
    $id = $_GET['id'];

    $sql =  "SELECT * FROM `subjects` WHERE id =$id";

    $result = mysqli_query($conn,$sql);

    $data = mysqli_fetch_assoc($result);

    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
         $subjectname = $_POST ['subject_name'];

         $sql = "UPDATE `subjects` SET `subject_name`='$subjectname' WHERE id = $id";

         $result = mysqli_query($conn,$sql);

         if ($result) {
            echo   "<script>alert('Updated'); window.location.href='viewsubjects.php';</script>";
        exit;
         }

         else {
             echo "Error: " . mysqli_error($conn);
         }
    }
    

    ?>

     <h3>Update Student</h3>
        <form method="post">
            <div class="mb-3">
             <label>Name</label>
                <input type="text" name="subject_name" class="form-control" value="<?= $data['subject_name'] ?>" required>
   
            </div>
         
                <button type="submit" class="btn btn-primary">Update</button>

            </form>
</body>
</html>