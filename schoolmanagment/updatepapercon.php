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
<h3 style="font-family: Arial, sans-serif; margin-bottom: 20px; text-align: center;">Update Paper Content</h3>


<form method="post" enctype="multipart/form-data" style="max-width: 600px; margin: auto; padding: 20px; border: 1px solid #ccc; border-radius: 10px;">
    
    <div style="margin-bottom: 15px;">
        <label style="display: block; font-weight: bold; margin-bottom: 5px;">Content</label>
        <img style="height: 80px; width:auto; margin-bottom: 10px;" src="upload/<?php echo $data['file_path']; ?>" alt="">
        <input type="text" name="content" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px;" value="<?= $data['content'] ?>" required>
    </div>

    <div style="margin-bottom: 15px;">
        <label style="display: block; font-weight: bold; margin-bottom: 5px;">Upload New File</label>
        <input type="file" name="file" style="width: 100%; padding: 8px;">
        <p style="margin-top: 8px;">Current File: 
            <a href="upload/<?= $data['file_path'] ?>" target="_blank"><?= $data['file_path'] ?></a>
        </p>
    </div>

    <div style="margin-bottom: 15px;">
        <label style="display: block; font-weight: bold; margin-bottom: 5px;">Select Paper</label>
        <select name="paper_id" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px;">
            <?php
            $sql = "SELECT * FROM `papers`";
            $result = mysqli_query($conn, $sql);
            foreach ($result as $paper) {
                $selected = ($data['paper_id'] == $paper["id"]) ? "selected" : "";
                ?>
                <option value="<?php echo $paper['id']; ?>" <?php echo $selected; ?>>
                    <?php echo $paper['paper_title']; ?>
                </option>
                <?php
            }
            ?>
        </select>
    </div>

    <button type="submit" class="btn btn-primary" style="background-color: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 5px;">Update</button>

</form>
