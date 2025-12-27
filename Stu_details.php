<?php
include_once 'classes/db1.php';

// Fetch students from the database
$result = mysqli_query($conn, "SELECT * FROM participant");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management - Inspirus 8</title>
    <?php require 'utils/styles.php'; ?>
</head>

<body>
    <?php include 'utils/adminHeader.php'; ?>

    <div class="content">
        <div class="container">
            <h1>Participants Details</h1>
            <?php if (mysqli_num_rows($result) > 0) { ?>
                <table class="table table-hover">
                    <tr>
                        <th>USN</th>
                        <th>Name</th>
                        <th>Branch</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>College</th>
                        <th>Actions</th>
                    </tr>
                    <?php while ($row = mysqli_fetch_array($result)) { ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row["usn"]); ?></td>
                            <td><?php echo htmlspecialchars($row["name"]); ?></td>
                            <td><?php echo htmlspecialchars($row["branch"]); ?></td>
                            <td><?php echo htmlspecialchars($row["email"]); ?></td>
                            <td><?php echo htmlspecialchars($row["phone"]); ?></td>
                            <td><?php echo htmlspecialchars($row["college"]); ?></td>
                            <td>
                                <a href="updateStu_details.php?usn=<?php echo $row['usn']; ?>" class="btn btn-default">Update</a>
                                <a href="deleteStudent.php?usn=<?php echo $row['usn']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this student?');">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            <?php } else { ?>
                <p>No students found.</p>
            <?php } ?>
            <a href="createStudent.php" class="btn btn-primary">Add New Student</a>
        </div>
    </div>

    <?php include 'utils/footer.php'; ?>
</body>

</html>
