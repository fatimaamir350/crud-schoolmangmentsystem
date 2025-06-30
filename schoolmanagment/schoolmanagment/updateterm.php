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
 <h3>Update Term</h3>
        <form method="post">
            <div class="mb-3">
                <label> Term Name</label>
                <input type="text" name="term_name" class="form-control" value="<?= $data['term_name'] ?>" required>

            </div>
         

                <button type="submit" class="btn btn-primary">Update</button>

            </form>