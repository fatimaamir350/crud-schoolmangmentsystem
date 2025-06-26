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

    $sql = "SELECT * FROM `paper_types` WHERE id=$id";

    $result = mysqli_query($conn,$sql);

    $data = mysqli_fetch_assoc($result);

    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $termname = $_POST['term_name'];

        $sql = "UPDATE `paper_types` SET `term_name`='$termname' WHERE id=$id";

        $result = mysqli_query($conn,$sql);

        if ($result) {
            echo     "<script>alert('Updated'); window.location.href='viewterm.php';</script>";
        exit;
        }
        else {
             echo "Error: " . mysqli_error($conn);
        }
    }


    ?>
</body>
</html>
 <h3 style="text-align: center; font-family: Arial, sans-serif; margin-bottom: 20px;">Update Term</h3>
<form method="post" style="max-width: 400px; margin: auto; padding: 20px; border: 1px solid #ccc; border-radius: 10px;">

    <div class="mb-3" style="margin-bottom: 15px;">
        <label style="display: block; font-weight: bold; margin-bottom: 5px;">Term Name</label>
        <input type="text" name="term_name" class="form-control"
               style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px;"
               value="<?= $data['term_name'] ?>" required>
    </div>

    <button type="submit" class="btn btn-primary"
            style="background-color: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 5px;">
        Update
    </button>

</form>
