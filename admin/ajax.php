<?php 
session_start();
// 1. DB Connection Open
define('HOSTNAME', 'localhost');
define('MYSQL_USER', 'root');
define('MYSQL_PASS', '');
define('DATABASE', 'soft84ya_db');
$con = mysqli_connect(HOSTNAME, MYSQL_USER, MYSQL_PASS, DATABASE) or die(mysqli_error($con));

if (isset($_POST['action']) && $_POST['action'] == 'loginForm') {
    // Get username and password from POST data
    $username = isset($_POST['username']) ? mysqli_real_escape_string($con, $_POST['username']) : '';
    $password = isset($_POST['password']) ? md5($_POST['password']) : '';

    // Debugging
    // echo "Username: $username, Password: $password";

    // 2. Build the query
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";

    // 3. Execute query
    $result = mysqli_query($con, $sql);

    // Check the number of rows
    $nor = mysqli_num_rows($result);
    
    // 4. Return response (Avoid echoing SQL for security)
    

    if($nor == 1){
        $row = mysqli_fetch_row($result);
        $_SESSION['fname'] = $row[1];
        $data = [
            'status'=>200
        ];
    }else{
        $data = [
            'status'=> 404
        ];
    }

    echo json_encode($data);
}

//dashboard page
if (isset($_POST['action']) && $_POST['action'] == 'logout') { // ✅ Ensure action is set
    session_destroy();
    $data = [
        'status' => 200
    ];
    echo json_encode($data); // ✅ Correct function name
}

?>
