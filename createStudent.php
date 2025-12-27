<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student - Inspirus 8</title>
    <?php require 'utils/styles.php'; ?>
</head>

<body>
    <?php include 'utils/adminHeader.php'; ?>

    <div class="container">
        <h2>Add New Student</h2>
        <form method="POST" action="">
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

            <button type="submit" name="addStudent" class="btn btn-primary">Add Student</button>
            <a href="stu_details.php" class="btn btn-default">Back to Students</a>
        </form>
    </div>

    <?php
    if (isset($_POST['addStudent'])) {
        $usn = $_POST['usn'];
        $name = $_POST['name'];
        $branch = $_POST['branch'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $college = $_POST['college'];

        // Insert the new student into the database
        include 'classes/db1.php';
        $insertQuery = "INSERT INTO participant (usn, name, branch, email, phone, college) VALUES ('$usn', '$name', '$branch', '$email', '$phone', '$college')";

        if (mysqli_query($conn, $insertQuery)) {
            echo "<script>alert('Student added successfully!'); window.location.href='stu_details.php';</script>";
        } else {
            echo "<script>alert('Error adding student: " . mysqli_error($conn) . "');</script>";
        }
    }
    ?>

    <?php include 'utils/footer.php'; ?>
</body>

</html>
