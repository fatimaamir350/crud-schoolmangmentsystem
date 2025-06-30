<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sidebar 06</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css" />
  <script src="script.js" defer></script>
  <?php include_once("config.php"); ?>
</head>
<body>
  <div class="sidebar">
    <div class="logo">MyApp</div>
    <ul class="nav-links">

      <!-- Student Menu -->
      <li class="dropdown">
        <a class="dropdown-toggle">👨‍🎓 Student ▾</a>
        <ul class="submenu">
          <li><a href="student.php">Add Student</a></li>
          <li><a href="viewstudent.php">View Student List</a></li>
        </ul>
      </li>

       <!-- Subject Menu -->

      <li class="dropdown">
        <a class="dropdown-toggle">📚 Subject ▾</a>
        <ul class="submenu">
          <li><a href="addsubjects.php">Add Subject</a></li>
          <li><a href="viewsubjects.php">View Subject List</a></li>
        </ul>
      </li>

      

      

      <!-- Class Menu -->
      <li class="dropdown">
        <a class="dropdown-toggle">🏫 Classes ▾</a>
        <ul class="submenu">
          <li><a href="addclasses.php">Add Class</a></li>
          <li><a href="viewclass.php">View Class</a></li>
        </ul>
      </li>

      <!-- Teacher Menu -->
      <li class="dropdown">
        <a class="dropdown-toggle"> 🏫Teacher ▾</a>
        <ul class="submenu">
          <li><a href="addteacher.php">Add Teacher</a></li>
          <li><a href="viewteacher.php">View Teacher</a></li>
        </ul>
      </li>

      <!-- Term Menu -->
      <li class="dropdown">
        <a class="dropdown-toggle">🗓️ Term ▾</a>
        <ul class="submenu">
          <li><a href="addterm.php">Add Term</a></li>
          <li><a href="viewterm.php">View Term</a></li>
        </ul>
      </li>

      <!-- Paper Menu -->
      <li class="dropdown">
        <a class="dropdown-toggle">📄 Paper ▾</a>
        <ul class="submenu">
          <li><a href="paperinfo.php">Add Paper Info</a></li>
          <li><a href="viewpaperinfo.php">View Paper Info</a></li>
          <li><a href="addpaperco.php">Add Paper Content</a></li>
          <li><a href="viewpapercon.php">View Paper Content</a></li>
          <li><a href="addpapermarks.php">Add Paper Marks</a></li>
          <li><a href="viewpapermark.php">View Paper Marks</a></li>
        </ul>
      </li>

    </ul>
  </div>
  <!-- Main Content -->
<div style="margin-left:260px; padding:40px;">
  
  
</div>


  
</body>
</html>
