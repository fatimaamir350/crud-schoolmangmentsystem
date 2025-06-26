<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php include_once ("navbar.php"); ?>
<body>
 
  


<div class="container mt-5" style="max-width: 600px;">
  <h3 class="mb-4">Add New Student</h3>
  <form method="post" action="student.php">
    <div class="mb-3">
      <label for="name" class="form-label">Student Name</label>
      <input type="text" class="form-control" name="stu_name" id="stu_name" required>
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">Student Email</label>
      <input type="text" class="form-control" name="stu_email" id="stu_email" required>
    </div>

    <div class="mb-3">
      <label for="phonenumber" class="form-label">phone number</label>
      <input type="number" class="form-control" name="stu_phone" id="stu_phone" required>
    </div>

   

     <div class="mb-3">
      <label class="form-label d-block">Gender</label>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="stu_gender" id="genderMale" value="Male" required>
        <label class="form-check-label" for="genderMale">Male</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="stu_gender" id="genderFemale" value="Female">
        <label class="form-check-label" for="genderFemale">Female</label>
      </div>
        
      </select>
       <div class="mb-3">
      <label for="stu_date" class="form-label">date</label>
     <input type="date" name="stu_date" id="stu_date" required>
    </div>

    <div class="mb-3">
      <label for="classid" class="form-label">class id</label>
      <input type="text" class="form-control" name="stu_classid" id="stu_classid" required>
    </div>

    <div class="mb-3">
      <label for="adress" class="form-label">adress</label>
      <input type="text" class="form-control" name="stu_adress" id="stu_adress" required>
    </div>


    </div>

    <button type="submit" class="btn btn-success">Add Student</button>
  </form>
</div>

 
</body>
</html>
<?php

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $stuname =$_POST ['stu_name'];
    $stuemail =$_POST ['stu_email'];
    $stuphone =$_POST ['stu_phone'];
    $stugender =$_POST ['stu_gender'];
    $studate =$_POST ['stu_date'];
    $stuclassid =$_POST ['stu_classid'];
    $stuadress =$_POST ['stu_adress'];


    $sql = "INSERT INTO `students` ( `stu_name`, `stu_email`, `stu_phone`, `stu_gender`, `stu_date`, `stu_class_id`, `stu_address`) VALUES 
    ( '$stuname','$stuemail', $stuphone,'$stugender ', '$studate', $stuclassid ,'$stuadress')";

    $result = mysqli_query($conn,$sql);

    if ($result) {
        echo '<script>
                alert("student addeed successfully");
                window.location.href = "viewstudent.php";
            </script>';
    }
    else {
        echo '<script>
                alert("Error: ' . mysqli_error($conn) . '");
            </script>';
    }
    
}
?>