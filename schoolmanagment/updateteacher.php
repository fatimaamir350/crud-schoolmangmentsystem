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
    
    $sql = "SELECT * FROM `teachers` WHERE id =$id";

    $result = mysqli_query($conn,$sql);

    $data = mysqli_fetch_assoc($result);

    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        $teachername = $_POST['teacher_name'];
        $teacheremail = $_POST['teacher_email'];
        $subjectid = $_POST ['subjectname'];

    //     echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";

        $sql = "UPDATE `teachers` SET `tech_name`='$teachername',`tech_email`='$teacheremail',`subject_id`=$subjectid WHERE id=$id ";

        $result = mysqli_query($conn,$sql);

        if ($result) {
            echo"<script>alert('Updated successfully'); window.location.href='viewteacher.php';</script>";
        exit;
        }
        else {
             echo "Error: " . mysqli_error($conn);
        }
    }
    ?>
</body>
</html>
<h3 style="text-align: center; font-family: Arial, sans-serif; margin-bottom: 20px;">Update Teacher</h3>
<form method="post" style="max-width: 600px; margin: auto; padding: 20px; border: 1px solid #ccc; border-radius: 10px;">

    <div class="mb-3" style="margin-bottom: 15px;">
        <label style="display: block; font-weight: bold; margin-bottom: 5px;">Teacher Name</label>
        <input type="text" name="teacher_name" class="form-control"
               style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px;"
               value="<?= $data['tech_name'] ?>" required>
    </div>

    <div class="mb-3" style="margin-bottom: 15px;">
        <label style="display: block; font-weight: bold; margin-bottom: 5px;">Teacher Email</label>
        <input type="email" name="teacher_email" class="form-control"
               style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px;"
               value="<?= $data['tech_email'] ?>" required>
    </div>

    <select class="form-control" name="subjectname"
            style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px; margin-bottom: 20px;">
        <?php
        $sql = "SELECT * FROM `subjects`";
        $result = mysqli_query($conn, $sql);
        foreach ($result as $data) {
            if ($teachername == $data["id"]) {
                $selected = "selected";
                echo $selected;
            } else {
                $selected = "";
                echo $selected;
            }
        ?>
            <option value="<?php echo $data['id'] ?>"><?php echo $selected ?><?php echo $data['subject_name'] ?></option>
        <?php
        }
        ?>
    </select>

    <button type="submit" class="btn btn-primary"
            style="background-color: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 5px;">
        Update
    </button>

</form>
