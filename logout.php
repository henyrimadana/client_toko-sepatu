<?php
// Logout User
if (isset($_GET['logout'])) {
    session_start();
    session_destroy();
    header("Location: index.php");
    exit();
}
