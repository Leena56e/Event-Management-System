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
                    <h1 style="color:#000080 ; font-size:42px ; font-style:bold "><strong>Participants Sign-Up</strong></h1><!--body content title-->

            </div>
            
            
            <div class="container">
            <div class="col-md-12">
            <hr>
            </div>
            </div>
    <div class="container mt-5">
        <form method="POST" action="signup.php">
            <div class="form-group">
                <label>USN:</label>
                <input type="text" name="usn" required class="form-control">
            </div>
            <div class="form-group">
                <label>Name:</label>
                <input type="text" name="name" required class="form-control">
            </div>
            <div class="form-group">
                <label>Branch:</label>
                <input type="text" name="branch" required class="form-control">
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" required class="form-control">
            </div>
            <div class="form-group">
                <label>Phone:</label>
                <input type="text" name="phone" required class="form-control">
            </div>
            <div class="form-group">
                <label>College:</label>
                <input type="text" name="college" required class="form-control">
            </div>
            <div class="form-group">
                <label>Password:</label>
                <input type="password" name="password" required class="form-control">
            </div>
            <button type="submit" name="signup" class="btn btn-primary">Sign Up</button>
        </form>
        <p class="mt-3">Already have an account? <a href="login.php">Login here</a></p>
    </div>

    <?php
    include 'classes/db1.php'; // Database connection

    if (isset($_POST['signup'])) {
        $usn = $_POST['usn'];
        $name = $_POST['name'];
        $branch = $_POST['branch'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $college = $_POST['college'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash password

        $query = "INSERT INTO participant (usn, name, branch, email, phone, college, password) 
                  VALUES ('$usn', '$name', '$branch', '$email', '$phone', '$college', '$password')";

        if (mysqli_query($conn, $query)) {
            echo "<script>alert('Sign-up successful!'); window.location.href='login.php';</script>";
        } else {
            echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
        }
    }
    ?>
</body>

</html>
