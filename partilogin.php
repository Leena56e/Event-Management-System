<?php
include 'classes/db1.php';

if (isset($_POST['login'])) {
    $usn = $_POST['usn'];
    $password = $_POST['password'];

    // Prepare SQL query to fetch the hashed password from the database
    $query = "SELECT password FROM participant WHERE usn='$usn'";
    $result = mysqli_query($conn, $query);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $hashed_password = $row['password'];
        
        // Verify the password
        if (password_verify($password, $hashed_password)) {
            echo "Login successful!";
            // Proceed to the next steps, such as redirecting to the dashboard
        } else {
            echo "Invalid credentials.";
        }
    } else {
        echo "User not found.";
    }
}
?>
