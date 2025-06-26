<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include_once("navbar.php"); ?>
</head>
<body>
    <div class="container mt-5" style="max-width: 650px;">
    <h3 class="mb-4">Add Paper Information</h3>
    <form method="POST">

        <!-- Paper Type -->
        <div class="mb-3">
            <label class="form-label">Paper Type</label>
            <select name="paper_type_id" class="form-control" required>
                <option value="">Select Paper Type</option>
                <?php
                $q = mysqli_query($conn, "SELECT * FROM paper_types");
                while ($data = mysqli_fetch_assoc($q)) {
                    echo "<option value='{$data['id']}'>{$data['term_name']}</option>";
                }
                ?>
            </select>
        </div>

        <!-- Subject -->
        <div class="mb-3">
            <label class="form-label">Subject</label>
            <select name="subject_id" class="form-control" required>
                <option value="">Select Subject</option>
                <?php
                $q = mysqli_query($conn, "SELECT * FROM subjects");
                while ($data = mysqli_fetch_assoc($q)) {
                    echo "<option value='{$data['id']}'>{$data['subject_name']}</option>";
                }
                ?>
            </select>
        </div>

        <!-- Class -->
        <div class="mb-3">
            <label class="form-label">Class</label>
            <select name="class_id" class="form-control" required>
                <option value="">Select Class</option>
                <?php
                $q = mysqli_query($conn, "SELECT * FROM classes");
                while ($data = mysqli_fetch_assoc($q)) {
                    echo "<option value='{$data['id']}'>{$data['class_name']}</option>";
                }
                ?>
            </select>
        </div>

        <!-- Teacher -->
        <div class="mb-3">
            <label class="form-label">Teacher</label>
            <select name="teacher_id" class="form-control" required>
                <option value="">Select Teacher</option>
                <?php
                $q = mysqli_query($conn, "SELECT * FROM teachers");
                while ($data = mysqli_fetch_assoc($q)) {
                    echo "<option value='{$data['id']}'>{$data['tech_name']}</option>";
                }
                ?>
            </select>
        </div>

        <!-- Paper Title -->
        <div class="mb-3">
            <label class="form-label">Paper Title</label>
            <input type="text" name="paper_title" class="form-control" required />
        </div>

        <!-- Paper Date -->
        <div class="mb-3">
            <label class="form-label">Paper Date</label>
            <input type="date" name="paper_date" class="form-control" required />
        </div>

        <!-- Duration -->
        <div class="mb-3">
            <label class="form-label">Duration</label>
            <input type="text" name="duration" class="form-control" required placeholder="e.g., 2 hours" />
        </div>

        <!-- Description -->
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" datas="3" placeholder="Optional description..."></textarea>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Add Paper </button>
    </form>
</div>
</body>
</html>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $paper_type_id    = (int)$_POST['paper_type_id'];
    $subject_id       = (int)$_POST['subject_id'];
    $class_id         = (int)$_POST['class_id'];
    $teacher_id       = (int)$_POST['teacher_id'];
    $paper_title      = mysqli_real_escape_string($conn, $_POST['paper_title']);
    $paper_date       = $_POST['paper_date'];
    $duration         = mysqli_real_escape_string($conn, $_POST['duration']);
    $description      = mysqli_real_escape_string($conn, $_POST['description']);

    $sql = "INSERT INTO papers (paper_type_id, subject_id, class_id, teacher_id, paper_title, paper_date, duration, description)
            VALUES ($paper_type_id, $subject_id, $class_id, $teacher_id, '$paper_title', '$paper_date', '$duration', '$description')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>alert('Paper added successfully!');</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
    }
}
?>