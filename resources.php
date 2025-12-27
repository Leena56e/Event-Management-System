<?php
include_once 'classes/db1.php';

// Fetch all resources from the database
$result = mysqli_query($conn, "
    SELECT r.req_id, r.r_name, r.type, r.quantity, e.event_title 
    FROM resources r 
    JOIN events e ON r.event_id = e.event_id
");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resources Inspirus 8</title>
    <?php require 'utils/styles.php'; ?>
</head>

<body>
    <?php include 'utils/adminHeader.php'; ?>

    <div class="container">
        <h1>Resource Details</h1>

        <?php if (mysqli_num_rows($result) > 0) { ?>
            <table class="table table-hover">
                <tr>
                    <th>Resource Name</th>
                    <th>Type</th>
                    <th>Quantity</th>
                    <th>Event</th>
                    <th>Actions</th>
                </tr>
                <?php while ($row = mysqli_fetch_array($result)) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['r_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['type']); ?></td>
                        <td><?php echo htmlspecialchars($row['quantity']); ?></td>
                        <td><?php echo htmlspecialchars($row['event_title']); ?></td>
                        <td>
                            <a href="updateResource.php?req_id=<?php echo $row['req_id']; ?>" class="btn btn-default">Update</a>
                            <a href="deleteResource.php?req_id=<?php echo $row['req_id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this resource?');">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        <?php } else { ?>
            <p>No resources found.</p>
        <?php } ?>
        <a href="createResource.php" class="btn btn-primary">Add New Resource</a>
    </div>

    <?php include 'utils/footer.php'; ?>
</body>

</html>
