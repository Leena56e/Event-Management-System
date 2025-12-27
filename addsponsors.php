<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Sponsor - Inspirus 8</title>
    <?php require 'utils/styles.php'; ?>
</head>

<body>
    <?php include 'utils/adminHeader.php'; ?>

    <div class="container">
        <h2>Add New Sponsor</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label>Sponsor Name:</label>
                <input type="text" name="s_name" required class="form-control">
            </div>

            <div class="form-group">
                <label>Contact No:</label>
                <input type="text" name="contact_no" required class="form-control">
            </div>

            <button type="submit" name="addSponsor" class="btn btn-primary">Add Sponsor</button>
            <a href="sponsors.php" class="btn btn-default">Back to Sponsors</a>
        </form>
    </div>

    <?php
    if (isset($_POST['addSponsor'])) {
        $s_name = $_POST['s_name'];
        $contact_no = $_POST['contact_no'];

        // Insert the new sponsor into the database
        include 'classes/db1.php';
        $insertQuery = "INSERT INTO sponsors (s_name, contact_no) VALUES ('$s_name', '$contact_no')";

        if (mysqli_query($conn, $insertQuery)) {
            echo "<script>alert('Sponsor added successfully!'); window.location.href='sponsors.php';</script>";
        } else {
            echo "<script>alert('Error adding sponsor: " . mysqli_error($conn) . "');</script>";
        }
    }
    ?>
    
    <?php include 'utils/footer.php'; ?>
</body>

</html>
