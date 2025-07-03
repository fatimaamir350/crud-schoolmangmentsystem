<?php
session_start();
if (isset($_SESSION['user'])) {
    header("Location: user.php");
} else {
    header("Location: user.php");
}
exit();
?>
