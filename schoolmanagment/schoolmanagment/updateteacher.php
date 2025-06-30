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
<h3>Update Teacher</h3>
        <form method="post">
           <div class="mb-3">
            <label> Teacher Name</label>
            <input type="text" name="teacher_name" class="form-control" value="<?= $data['tech_name'] ?>" required>
        </div>

                 <div class="mb-3">
            <label> Teacher Email</label>
            <input type="email" name="teacher_email" class="form-control" value="<?= $data['tech_email'] ?>" required>
        </div>
         <select class="form-control" name="subjectname" >
            <?php
            $sql = "SELECT * FROM `subjects`";
            $result = mysqli_query($conn,$sql);
            foreach($result as $data)
            {
                if($teachername ==$data["id"])

                {
                    $selected = "selected";
                    echo $selected;
                }
                else {
                    $selected = "";
                    echo $selected;
                }
                 ?>
             <option value="<?php echo $data ['id']?>"><?php echo $selected ?><?php echo $data ['subject_name'] ?></option>
             <?php
             }
            ?>
         </select>

                <button type="submit" class="btn btn-primary">Update</button>

            </form>