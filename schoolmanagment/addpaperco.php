<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include_once("navbar.php"); 
    
    
    ?>
</head>
<body>
  
<?php


$message = "";  

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $paper_id = $_POST["paper_id"] ?? '';
    $content = trim($_POST["content"] ?? '');
    $file_name = '';

    
    if (empty($paper_id) || empty($content)) {
        $message = "<p style='color:red;'>Please select a paper and enter content.</p>";
    } else {
      
        if (isset($_FILES["file"]) && $_FILES["file"]["error"] === 0) {
            $upload_dir = "upload/";
            
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0755, true);
            }
            $file_name = basename($_FILES["file"]["name"]);
            $target_path = $upload_dir . $file_name;

            if (!move_uploaded_file($_FILES["file"]["tmp_name"], $target_path)) {
                $message = "<p style='color:red;'>File upload failed.</p>";
            }
        }

        if ($message === "") { 
            
            $paper_id_esc = mysqli_real_escape_string($conn, $paper_id);
            $content_esc = mysqli_real_escape_string($conn, $content);
            $file_name_esc = mysqli_real_escape_string($conn, $file_name);

            $sql = "INSERT INTO paper_contents (paper_id, content, file_path) 
                    VALUES ('$paper_id_esc', '$content_esc', '$file_name_esc')";

            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('Updated successfully'); window.location.href='viewpapercon.php';</script>";
        exit;
            } else {
                $message = "<p style='color:red;'>Database error: " . mysqli_error($conn) . "</p>";
            }
        }
    }
}


?>











</body>
</html>
<body style="background:#f5f5f5; font-family: Arial, sans-serif;">

<form method="POST" enctype="multipart/form-data" action=""
      style="max-width:400px; margin:30px auto; padding:20px; background:#fff; border-radius:10px; box-shadow:0 0 10px #ccc;">

    <h3 style="text-align:center; margin-bottom:20px;">Add Paper Content</h3>
    <?php if ($message !== "") { echo $message; } ?>

   

    <label for="paper_id" style="font-weight:bold; display:block; margin-bottom:8px;">Select Paper:</label>
    <select name="paper_id" id="paper_id" required
            style="width:100%; padding:8px; margin-bottom:15px; border:1px solid #ccc; border-radius:5px; box-sizing:border-box;">
        <option value="" disabled selected>Select a paper</option>
        <?php
        $papers_sql = "SELECT id, paper_title FROM papers";
        $papers_result = mysqli_query($conn, $papers_sql);
        while ($paper = mysqli_fetch_assoc($papers_result)) {
            echo "<option value='" . htmlspecialchars($paper['id']) . "'>" . htmlspecialchars($paper['paper_title']) . "</option>";
        }
        ?>
    </select>

    <label for="content" style="font-weight:bold; display:block; margin-bottom:8px;">Content:</label>
    <textarea name="content" id="content" rows="5" required
              style="width:100%; padding:8px; margin-bottom:15px; border:1px solid #ccc; border-radius:5px; box-sizing:border-box;"></textarea>

    <label for="file" style="font-weight:bold; display:block; margin-bottom:8px;">Upload File (optional):</label>
    <input type="file" name="file" id="file"
           style="margin-bottom:15px; width:100%;">

    <button type="submit"
            style="width:100%; padding:10px; background-color:green; color:white; border:none; border-radius:5px; cursor:pointer;">
        Submit
    </button>
</form>








  

