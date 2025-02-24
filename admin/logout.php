<?php
session_start();
session_unset(); // ✅ Unset all session variables
session_destroy(); // ✅ Destroy the session

// Redirect to login page (change "login.php" if needed)
header("Location: index.php");
exit();
?>
