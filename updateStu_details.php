<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student - Inspirus 8</title>
    <?php require 'utils/styles.php'; ?>
</head>

<body>
    <?php include 'utils/adminHeader.php'; ?>

    <div class="container">
        <h2>Update Student</h2>
        <?php
        include 'classes/db1.php';
        if (isset($_GET['usn'])) {
            $usn = $_GET['usn'];
            $result = mysqli_query($conn, "SELECT * FROM participant WHERE usn = '$usn'");
            $student = mysqli_fetch_array($result);
        }
        ?>
        <form method="POST" action="">
            <input type="hidden" name="usn" value="<?php echo htmlspecialchars($student['usn']); ?>">
            <div class="form-group">
                <label>Name:</label>
                <input type="text" name="name" required class="form-control" value="<?php echo htmlspecialchars($student['name']); ?>">
            </div>

            <div class="form-group">
                <label>Branch:</label>
                <input type="text" name="branch" required class="form-control" value="<?php echo htmlspecialchars($student['branch']); ?>">
            </div>

            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" required class="form-control" value="<?php echo htmlspecialchars($student['email']); ?>">
            </div>

            <div class="form-group">
                <label>Phone:</label>
                <input type="text" name="phone" required class="form-control" value="<?php echo htmlspecialchars($student['phone']); ?>">
            </div>

            <div class="form-group">
                <label>College:</label>
                <input type="text" name="college" required class="form-control" value="<?php echo htmlspecialchars($student['college']); ?>">
            </div>

            <button type="submit" name="updateStudent" class="btn btn-primary">Update Student</button>
            <a href="stu_details.php" class="btn btn-default">Back to Students</a>
        </form>
    </div>

    <?php
    if (isset($_POST['updateStudent'])) {
        $usn = $_POST['usn'];
        $name = $_POST['name'];
        $branch = $_POST['branch'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $college = $_POST['college'];

        // Update the student in the database
        $updateQuery = "UPDATE participant SET name='$name', branch='$branch', email='$email', phone='$phone', college='$college' WHERE usn='$usn'";

        if (mysqli_query($conn, $updateQuery)) {
            echo "<script>alert('Student updated successfully!'); window.location.href='stu_details.php';</script>";
        } else {
            echo "<script>alert('Error updating student: " . mysqli_error($conn) . "');</script>";
        }
    }
    ?>

    <?php include 'utils/footer.php'; ?>
</body>

</html>
