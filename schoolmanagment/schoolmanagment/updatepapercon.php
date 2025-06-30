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


$sql = "SELECT * FROM paper_contents WHERE id = $id";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $paper_id = $_POST["paper_id"];
    $content = $_POST["content"];
    $file_path = $data['file_path']; 

   
    if (isset($_FILES["file"]) && $_FILES["file"]["error"] === 0) {
        $file_name = $_FILES["file"]["name"];
        $temp_name = $_FILES["file"]["tmp_name"];
        $target_dir = "upload/";
        $target_file = $target_dir . basename($file_name);

        if (move_uploaded_file($temp_name, $target_file)) {
            $file_path = $file_name;
        } else {
            echo "File upload failed.";
            exit;
        }
    }

    
    $sql1 = "UPDATE paper_contents SET paper_id='$paper_id', content='$content', file_path='$file_path' WHERE id=$id";
    $result1 = mysqli_query($conn, $sql1);

    if ($result1) {
        echo "<script>alert('Updated successfully'); window.location.href='viewpapercon.php';</script>";
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>


   
</body>
</html>

<h3>Update Paper Content</h3>
        <form method="post" enctype="multipart/form-data">
            <div class="mb-3">
        <label>Content</label>
        <img style="height: 80px; width:auto" src="upload/<?php echo $file_path ?>" alt="">
        <input type="text" name="content" class="form-control" value="<?= $data['content'] ?>" required>
    </div>

    <div class="mb-3">
        <label>Upload New File</label>
        <input type="file" name="file" class="form-control">
        <p>Current File: <a href="upload/<?= $data['file_path'] ?>" target="_blank"><?= $data['file_path'] ?></a></p>
    </div>

         <select class="form-control" name="paper_id" >
            <?php
            $sql = "SELECT * FROM `paper_types`";
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
             <option value="<?php echo $data ['id']?>"><?php echo $selected ?><?php echo $data ['term_name'] ?></option>
             <?php
             }
            ?>
         </select>

 <button type="submit" class="btn btn-primary">Update</button>

            </form>