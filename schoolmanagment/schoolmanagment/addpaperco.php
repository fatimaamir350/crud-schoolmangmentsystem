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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $PAPER = $_POST["paper_id"];
    $CONTENT = $_POST["content"];
    $FILE = $_FILES["file"]["name"];

    $target_dir = "upload/";
    $target_file = $target_dir . basename($FILE);

    move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);

    
    $sql = "INSERT INTO paper_contents (paper_id, content, file_path) VALUES ('$PAPER', '$CONTENT', '$FILE')";

    
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<div style='color:green; text-align:center; margin-top:10px;'> Paper content added successfully.</div>";
    } else {
        echo "<div style='color:red; text-align:center; margin-top:10px;'> Error: " . mysqli_error($con) . "</div>";
    }
}
?>

</body>
</html>
<form method="POST" enctype="multipart/form-data" style="width:400px; background:#fff; padding:20px; border-radius:10px; box-shadow:0 0 10px #ccc; font-family:Arial; margin: 30px auto;">
    <h3 style="text-align:center; margin-bottom:20px;">Add Paper Content</h3>

     <label style="font-weight:bold;">Select Paper:</label><br>
     <select name="paper_id" required style="width:100%; padding:8px; margin-bottom:15px; border:1px solid #ccc; border-radius:5px;">
<?php       
$sql = "SELECT * FROM `paper_types`";
$result = mysqli_query($conn,$sql);
foreach($result as $row)
{
    ?>
    <option value="<?php echo $row['id']; ?>">
        <?php echo $row['term_name']; ?>
    </option>
<?php
}
?>
</select><br>


<label style="font-weight:bold;">Content:</label><br>
<textarea name="content" required rows="5" style="width:100%; padding:8px; margin-bottom:15px; border:1px solid #ccc; border-radius:5px;"></textarea><br>

<label style="font-weight:bold;">Upload File (optional):</label><br>
<input type="file" name="file" style="margin-bottom:20px;"><br>


<input type="submit" value="Submit" style="width:100%; padding:10px; background-color:green; color:white; border:none; border-radius:5px; cursor:pointer;">

 </form>
  

