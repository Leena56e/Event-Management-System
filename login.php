<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Inspirus 8</title>
        <?php require 'utils/styles.php';?>
      
        
    
            </head>

<body>

<?php require 'utils/header.php'; ?><!--header content. file found in utils folder-->
        <div class = "content"><!--body content holder-->
            <div class = "container">
                <div class = "col-md-12"><!--body content title holder with 12 grid columns-->
                    <h1 style="color:#000080 ; font-size:42px ; font-style:bold "><strong>Participants Login</strong></h1><!--body content title-->

            </div>
            
            
            <div class="container">
            <div class="col-md-12">
            <hr>
            </div>
            </div>


    <div class="container mt-5">
        <form method="POST" action="login.php">
            <div class="form-group">
                <label>USN:</label>
                <input type="text" name="usn" required class="form-control">
            </div>
            <div class="form-group">
                <label>Password:</label>
                <input type="password" name="password" required class="form-control">
            </div>
            <button type="submit" name="login" class="btn btn-primary">Login</button>
        </form>
        <p class="mt-3">Don't have an account? <a href="signup.php">Sign up here</a></p>
    </div>

    <?php
    session_start();
    include 'classes/db1.php'; // Database connection

    if (isset($_POST['login'])) {
        $usn = $_POST['usn'];
        $password = $_POST['password'];

        $query = "SELECT * FROM participant WHERE usn='$usn'";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $participant = mysqli_fetch_assoc($result);

            if (password_verify($password, $participant['password'])) {
                $_SESSION['usn'] = $participant['usn']; // Store session
                echo "<script>window.location.href='dashboard.php';</script>";
            } else {
                echo "<script>alert('Incorrect password.');</script>";
            }
        } else {
            echo "<script>alert('No user found with this USN.');</script>";
        }
    }
    ?>
</body>

</html>
