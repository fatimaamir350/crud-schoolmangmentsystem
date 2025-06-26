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

    $id =$_GET['id'];

    $sql = "SELECT * FROM `papers` WHERE id=$id";

    $result = mysqli_query($conn,$sql);
    
    $row = mysqli_fetch_assoc($result);

    $paper_type_id = $row['paper_type_id'];
    $subject_id    = $row['subject_id'];
    $class_id      = $row['class_id'];
    $teacher_id    = $row['teacher_id'];

    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $paper_type_id    = (int)$_POST['paper_type_id'];
        $subject_id       = (int)$_POST['subject_id'];
        $class_id         = (int)$_POST['class_id'];
        $teacher_id       = (int)$_POST['teacher_id'];
        $paper_title      = mysqli_real_escape_string($conn, $_POST['paper_title']);
        $paper_date       = $_POST['paper_date'];
        $duration         = mysqli_real_escape_string($conn, $_POST['duration']);
        $description      = mysqli_real_escape_string($conn, $_POST['description']);


        $sql = "UPDATE `papers` SET `paper_type_id`=$paper_type_id,`subject_id`=$subject_id,`class_id`=$class_id,`teacher_id`=$teacher_id,`paper_title`='$paper_title',`paper_date`='$paper_date',`duration`='$duration',`description`='$description'
         WHERE id=$id";

         $result = mysqli_query($conn,$sql);

           if ($result) {
            echo     "<script>alert('Updated'); window.location.href='viewpaperinfo.php';</script>";
        exit;
        }
        else {
             echo "Error: " . mysqli_error($conn);
        }


    }



    ?>
</body>
</html>

<h3>Update Paper Information</h3>
        <form method="post">
            <label> term id</label>
            <select class="form-control" name="paper_type_id" >
   <?php
$sql = "SELECT * FROM `paper_types`";
$result = mysqli_query($conn,$sql);
foreach($result as $row)
{
    if($paper_type_id == $row["id"])
    {
        $selected = "selected";
    }
    else {
        $selected = "";
    }
    ?>
    <option value="<?php echo $row['id']; ?>" <?php echo $selected; ?>>
        <?php echo $row['term_name']; ?>
    </option>
<?php
}
?>
</select>
</div>


<label> class id</label>
    <select class="form-control" name="class_id">
<?php
$sql = "SELECT * FROM `classes`";
$result = mysqli_query($conn, $sql);
foreach ($result as $row)
{
    if($class_id == $row["id"])
    {
        $selected = "selected";
    }
    else {
        $selected = "";
    }
    ?>
    <option value="<?php echo $row['id']; ?>" <?php echo $selected; ?>>
        <?php echo $row['class_name']; ?>
    </option>
<?php
}
?>
</select>


 <label> Subject id</label>
<select class="form-control" name="subject_id">
   
<?php
$sql = "SELECT * FROM `subjects`";
$result = mysqli_query($conn, $sql);
foreach ($result as $row) {
    if ($subject_id == $row["id"]) {
        $selected = "selected";
    } else {
        $selected = "";
    }
    ?>
    <option value="<?php echo $row['id']; ?>" <?php echo $selected; ?>>
        <?php echo $row['subject_name']; ?>
    </option>
<?php
}
?>
</select>
</div>
  <label> teacher id</label>
    <select class="form-control" name="teacher_id">
<?php
$sql = "SELECT * FROM `teachers`";
$result = mysqli_query($conn, $sql);
foreach ($result as $row)
{
    if ($teacher_id == $row["id"])
    {
        $selected = "selected";
    }
    else
    {
        $selected = "";
    }
    ?>
    <option value="<?php echo $row['id']; ?>" <?php echo $selected; ?>>
        <?php echo $row['tech_name']; ?>
    </option>
<?php
}
?>
</select>
</div>
<div class="mb-3">
    <label> Paper Title</label>
    <input type="text" name="paper_title" class="form-control" value="<?= htmlspecialchars($row['paper_title'] ?? '') ?>" required>
</div>

<div class="mb-3">
    <label> Paper Date</label>
   <input type="date" name="paper_date" class="form-control" value="<?= htmlspecialchars($row['paper_date'] ?? '') ?>" required>
</div>

<div class="mb-3">
    <label> Duration</label>
  <input type="text" name="duration" class="form-control" value="<?= htmlspecialchars($row['duration'] ?? '') ?>" required>
</div>

<div class="mb-3">
    <label> Description</label>
    <textarea name="description" class="form-control" rows="3" placeholder="Optional description..."><?= htmlspecialchars($row['description'] ?? '') ?></textarea>
</div>



    
<button type="submit" class="btn btn-primary">Update</button>
 </form>