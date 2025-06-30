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

<div style="margin-left: 250px; padding: 30px; font-family: 'Segoe UI', sans-serif;">
  <h3 style="text-align: center; margin-bottom: 30px;">📝 Update Paper Information</h3>

  <form method="post" style="max-width: 800px; margin: auto; padding: 20px; background: #fff; border: 1px solid #ccc; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.08);">

    <label style="display:block; margin-bottom:8px; font-weight:600;">📘 Term ID</label>
    <select class="form-control" name="paper_type_id" style="width:100%; padding:10px; border:1px solid #ccc; border-radius:6px; margin-bottom:20px;">
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

    <label style="display:block; margin-bottom:8px; font-weight:600;">🏫 Class ID</label>
    <select class="form-control" name="class_id" style="width:100%; padding:10px; border:1px solid #ccc; border-radius:6px; margin-bottom:20px;">
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

    <label style="display:block; margin-bottom:8px; font-weight:600;">📚 Subject ID</label>
    <select class="form-control" name="subject_id" style="width:100%; padding:10px; border:1px solid #ccc; border-radius:6px; margin-bottom:20px;">
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

    <label style="display:block; margin-bottom:8px; font-weight:600;">👩‍🏫 Teacher ID</label>
    <select class="form-control" name="teacher_id" style="width:100%; padding:10px; border:1px solid #ccc; border-radius:6px; margin-bottom:20px;">
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

    <div style="margin-bottom:20px;">
      <label style="display:block; font-weight:600; margin-bottom:6px;">📝 Paper Title</label>
      <input type="text" name="paper_title" class="form-control" value="<?= htmlspecialchars($row['paper_title'] ?? '') ?>" style="width:100%; padding:10px; border:1px solid #ccc; border-radius:6px;" required>
    </div>

    <div style="margin-bottom:20px;">
      <label style="display:block; font-weight:600; margin-bottom:6px;">📅 Paper Date</label>
      <input type="date" name="paper_date" class="form-control" value="<?= htmlspecialchars($row['paper_date'] ?? '') ?>" style="width:100%; padding:10px; border:1px solid #ccc; border-radius:6px;" required>
    </div>

    <div style="margin-bottom:20px;">
      <label style="display:block; font-weight:600; margin-bottom:6px;">⏱ Duration</label>
      <input type="text" name="duration" class="form-control" value="<?= htmlspecialchars($row['duration'] ?? '') ?>" style="width:100%; padding:10px; border:1px solid #ccc; border-radius:6px;" required>
    </div>

    <div style="margin-bottom:30px;">
      <label style="display:block; font-weight:600; margin-bottom:6px;">🗒 Description</label>
      <textarea name="description" class="form-control" rows="3" placeholder="Optional description..." style="width:100%; padding:10px; border:1px solid #ccc; border-radius:6px; resize:vertical;"><?= htmlspecialchars($row['description'] ?? '') ?></textarea>
    </div>

    <button type="submit" class="btn btn-primary" style="width: 100%; background-color: #007bff; color: white; padding: 12px; border: none; border-radius: 6px; font-size: 16px;">
      ✅ Update
    </button>
  </form>
</div>
