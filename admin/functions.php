<?php 

session_start();
define('BASE_URL', 'http://localhost/dollor'); // Change to your actual URL
function userInfo() {
    echo strtoupper($_SESSION['fname']); // ✅ Corrected syntax
}

?>
