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

    $sql = "SELECT * FROM `paper_marks` WHERE id=$id";

    $result = mysqli_query($conn,$sql);

    $data  = mysqli_fetch_assoc($result);

    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
         $paper_id = $_POST['paper_id'];
        $student_id = $_POST['student_id'];
        $marks_obtained = $_POST['obt_marks'];

        $sql = "UPDATE `paper_marks` SET `paper_id`='$paper_id',`student_id`='$student_id'
        ,`marks_obtained`='$marks_obtained' WHERE id = $id ";

        $result = mysqli_query($conn,$sql);

        if ($result) {
            echo"<script>alert(' marks Updated successfully'); window.location.href='viewteacher.php';</script>";
        }
        else {
            echo "Error: " . mysqli_error($conn);
        }
    }
    ?>
</body>
</html>

<h3>Update Marks</h3>
        <form method="post">
           <div class="mb-3">
            <label> obtained marks</label>
            <input type="text" name="obt_marks" class="form-control" value="<?= $data['obt_marks'] ?>" required>
        </div>


             <select class="form-control" name="paper_id" >
            <?php
            $sql = "SELECT * FROM `papers`";
            $result = mysqli_query($conn,$sql);
            foreach($result as $data)
            {
                if($paper_id ==$data["id"])

                {
                    $selected = "selected";
                    echo $selected;
                }
                else {
                    $selected = "";
                    echo $selected;
                }
                 ?>
             <option value="<?php echo $data ['id']?>"><?php echo $selected ?><?php echo $data ['paper_type_id'] ?></option>
             <?php
             }
            ?>
         </select>


                 
         <select class="form-control" name="student_id" >
            <?php
            $sql = "SELECT * FROM `students`";
            $result = mysqli_query($conn,$sql);
            foreach($result as $data)
            {
                if($student_id ==$data["stu_id"])

                {
                    $selected = "selected";
                    echo $selected;
                }
                else {
                    $selected = "";
                    echo $selected;
                }
                 ?>
             <option value="<?php echo $data ['stu_id']?>"><?php echo $selected ?><?php echo $data ['stu_name'] ?></option>
             <?php
             }
            ?>
         </select>






      

                <button type="submit" class="btn btn-primary">Update</button>

            </form>