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
include 'config.php'; 

$id = $_GET['id'];

$sql_get = "SELECT * FROM `paper_contents` WHERE id = $id";
$result_get = mysqli_query($conn, $sql_get);
$data = mysqli_fetch_assoc($result_get);

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $paper_id = $_POST["paper_id"];
    $content = $_POST["content"];
    $File = $_FILES["file"]["name"];
    $target_dir = "upload/";
    $target_file = $target_dir.basename($File);

    move_uploaded_file($_FILES["file"]["tmp_name"],$target_file);

    $sql = "UPDATE `paper_contents` SET `paper_id`='$paper_id',`content`='$content' WHERE id = $id";

    $result = mysqli_query($conn,$sql);


    if($_FILES["file"]["size"]>0)
    {

        $sql1 = "UPDATE `paper_contents` SET `paper_id`='$paper_id',`content`='$content',`file_path`='$File' WHERE id=$id";

        $result1 = mysqli_query($conn,$sql1);


    }
    
}



?>


   
</body>
</html>
<div style="max-width:700px; margin:80px auto; padding:30px; background-color:#fff; border:1px solid #ddd; border-radius:10px; box-shadow:0 0 12px rgba(0,0,0,0.1); font-family:'Segoe UI', sans-serif;">

  <!-- Heading -->
  <h3 style="margin-bottom:30px; color:#333; text-align:center;">📄 Update Paper Content</h3>

  <form method="post" enctype="multipart/form-data">

    <!-- Content Field -->
    <div style="margin-bottom:20px;">
      <label for="content" style="display:block; margin-bottom:8px; font-weight:600; color:#444;">Content</label>
      <img src="upload/<?php echo $data['file_path']; ?>" alt="" style="height:80px; width:auto; margin-bottom:10px; display:block;">
      <input type="text" name="content" id="content" value="<?= $data['content'] ?>" required 
             style="width:100%; padding:10px; border:1px solid #ccc; border-radius:5px; font-size:16px;">
    </div>

    <!-- File Upload Field -->
    <div style="margin-bottom:20px;">
      <label for="file" style="display:block; margin-bottom:8px; font-weight:600; color:#444;">Upload New File</label>
      <input type="file" name="file" id="file" 
             style="width:100%; padding:10px; border:1px solid #ccc; border-radius:5px; font-size:15px;">
      <p style="margin-top:10px; font-size:14px; color:#555;">
        📎 Current File: 
        <a href="upload/<?= $data['file_path'] ?>" target="_blank" style="color:#007bff; text-decoration:underline;">
          <?= $data['file_path'] ?>
        </a>
      </p>
    </div>

    <!-- Paper Dropdown -->
    <div style="margin-bottom:25px;">
      <label for="paper_id" style="display:block; margin-bottom:8px; font-weight:600; color:#444;">Select Paper</label>
      <select name="paper_id" id="paper_id" required 
              style="width:100%; padding:10px; border:1px solid #ccc; border-radius:5px; font-size:16px;">
        <?php
        $sql = "SELECT * FROM `papers`";
        $result = mysqli_query($conn, $sql);
        foreach ($result as $paper) {
          $selected = ($data['paper_id'] == $paper["id"]) ? "selected" : "";
        ?>
          <option value="<?php echo $paper['id']; ?>" <?php echo $selected; ?>>
            <?php echo $paper['paper_title']; ?>
          </option>
        <?php } ?>
      </select>
    </div>

    <!-- Submit Button -->
    <button type="submit" 
            style="background-color:#007bff; color:white; padding:12px 25px; border:none; border-radius:5px; font-size:16px; cursor:pointer;">
      🔄 Update
    </button>

  </form>
</div>

