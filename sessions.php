<?php
include_once 'classes/db1.php';

// Fetch sessions from the database
$result = mysqli_query($conn, "SELECT * FROM sessions");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session details - Inspirus 8</title>
    <?php require 'utils/styles.php'; ?>
</head>

<body>
    <?php include 'utils/adminHeader.php'; ?>

    <div class="content">
        <div class="container">
            <h1>Session Details</h1>
            <?php if (mysqli_num_rows($result) > 0) { ?>
                <table class="table table-hover">
                    <tr>
                        <th>Session ID</th>
                        <th>Session Type</th>
                        <th>Speaker</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Date</th>
                        <th>Event</th>
                        <th>Actions</th>
                    </tr>
                    <?php while ($row = mysqli_fetch_array($result)) { ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row["session_id"]); ?></td>
                            <td><?php echo htmlspecialchars($row["sess_type"]); ?></td>
                            <td><?php echo htmlspecialchars($row["speaker"]); ?></td>
                            <td><?php echo htmlspecialchars($row["start_time"]); ?></td>
                            <td><?php echo htmlspecialchars($row["end_time"]); ?></td>
                            <td><?php echo htmlspecialchars($row["date"]); ?></td>
                            <td><?php echo htmlspecialchars($row["event"]); ?></td>
                            <td>
                                <a href="updateSession.php?session_id=<?php echo $row['session_id']; ?>" class="btn btn-default">Update</a>
                                <a href="deleteSession.php?session_id=<?php echo $row['session_id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this session?');">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            <?php } else { ?>
                <p>No sessions found.</p>
            <?php } ?>
            <a href="createSession.php" class="btn btn-primary">Add New Session</a>
        </div>
    </div>

    <?php include 'utils/footer.php'; ?>
</body>

</html>
