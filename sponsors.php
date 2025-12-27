<?php
include_once 'classes/db1.php';

// Fetch sponsors from the database
$result = mysqli_query($conn, "SELECT * FROM sponsors");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inspirus 8</title>
    <?php require 'utils/styles.php'; ?> <!-- Include CSS links -->
</head>

<body>
    <?php include 'utils/adminHeader.php'; ?> <!-- Include admin header -->

    <div class="content">
        <div class="container">
            <h1>Sponsor Details</h1>
            <?php if (mysqli_num_rows($result) > 0) { ?>
                <table class="table table-hover">
                    <tr>
                        <th>Sponsor Name</th>
                        <th>Contact No</th>
                        <th>Actions</th>
                    </tr>
                    <?php while ($row = mysqli_fetch_array($result)) { ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row["s_name"]); ?></td>
                            <td><?php echo htmlspecialchars($row["contact_no"]); ?></td>
                            <td>
                                <a href="updatesponsor.php?s_id=<?php echo $row['s_id']; ?>" class="btn btn-default">Update</a>
                                <a href="deletesponsor.php?s_id=<?php echo $row['s_id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this sponsor?');">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            <?php } else { ?>
                <p>No sponsors found.</p>
            <?php } ?>
            <a href="addsponsors.php" class="btn btn-primary">Add New Sponsor</a>
        </div>
    </div>

    <?php include 'utils/footer.php'; ?> <!-- Include footer -->
</body>

</html>
