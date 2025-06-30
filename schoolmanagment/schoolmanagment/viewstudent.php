<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php include_once ("navbar.php");
    $sql = "SELECT * FROM `students`";
    $result = mysqli_query($conn, $sql);
    
    ?>
    <div class="container mt-5">
  <h2 class="mb-4">All Students</h2>
  <div class="row">
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
      <div class="col-md-6">
        <div class="card p-3 mb-4" style="border-radius: 15px; box-shadow: 0 0 10px rgba(0,0,0,0.15);">
          <div class="card-header text-white bg-primary" style="font-weight: bold; font-size: 1.2rem; border-radius: 10px 10px 0 0;">
            <?= htmlspecialchars($row['stu_name']) ?>
          </div>
          <div class="card-body">
            <p><strong>Email:</strong> <?= $row['stu_email'] ?></p>
            <p><strong>Phone:</strong> <?= $row['stu_phone'] ?></p>
            <p><strong>Gender:</strong> <?= $row['stu_gender'] ?></p>
            <p><strong>Date:</strong> <?= $row['stu_date'] ?></p>
            <p><strong>Class ID:</strong> <?= $row['stu_class_id'] ?></p>
            <p><strong>Address:</strong> <?= $row['stu_address'] ?></p>
            <div class="d-flex justify-content-between mt-3">
              <td><a class="btn btn-warning" href="updatestudent.php?id=<?php echo $row['stu_id']; ?>">Edit</a></td>
               <td><a class="btn btn-danger" href="deletestudent.php?id=<?php echo $row ['stu_id']; ?>">Delete</a></td>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</div>
</body>
</html>

