<?php
include_once 'classes/db1.php';

// Check if the sponsor ID is set
if (isset($_GET['s_id'])) {
    $s_id = $_GET['s_id'];
    $query = "SELECT * FROM sponsors WHERE s_id = $s_id";
    $result = mysqli_query($conn, $query);
    $sponsor = mysqli_fetch_assoc($result);
}

// Check if the form is submitted
if (isset($_POST['updateSponsor'])) {
    $s_name = $_POST['s_name'];
    $contact_no = $_POST['contact_no'];

    // Update the sponsor in the database
    $updateQuery = "UPDATE sponsors SET s_name='$s_name', contact_no='$contact_no' WHERE s_id=$s_id";
    
    if (mysqli_query($conn, $updateQuery)) {
        echo "<script>alert('Sponsor updated successfully!'); window.location.href='sponsors.php';</script>";
    } else {
        echo "<script>alert('Error updating sponsor: " . mysqli_error($conn) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Sponsor - Inspirus 8</title>
    <?php require 'utils/styles.php'; ?>
</head>

<body>
    <?php include 'utils/adminHeader.php'; ?>

    <div class="container">
        <h2>Update Sponsor Details</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label>Sponsor Name:</label>
                <input type="text" name="s_name" required class="form-control" value="<?php echo htmlspecialchars($sponsor['s_name']); ?>">
            </div>

            <div class="form-group">
                <label>Contact No:</label>
                <input type="text" name="contact_no" required class="form-control" value="<?php echo htmlspecialchars($sponsor['contact_no']); ?>">
            </div>

            <button type="submit" name="updateSponsor" class="btn btn-primary">Update Sponsor</button>
            <a href="sponsors.php" class="btn btn-default">Back to Sponsors</a>
        </form>
    </div>

    <?php include 'utils/footer.php'; ?>
</body>

</html>
