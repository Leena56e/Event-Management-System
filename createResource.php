<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Resource - Inspirus 8</title>
    <?php require 'utils/styles.php'; ?>
</head>

<body>
    <?php include 'utils/adminHeader.php'; ?>

    <div class="container">
        <h2>Add New Resource</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label>Resource Name:</label>
                <input type="text" name="r_name" required class="form-control">
            </div>

            <div class="form-group">
                <label>Type:</label>
                <input type="text" name="type" required class="form-control">
            </div>

            <div class="form-group">
                <label>Quantity:</label>
                <input type="number" name="quantity" required class="form-control">
            </div>

            <div class="form-group">
                <label>Event ID:</label>
                <input type="number" name="event_id" required class="form-control">
            </div>

            <button type="submit" name="addResource" class="btn btn-primary">Add Resource</button>
            <a href="resource.php" class="btn btn-default">Back to Resources</a>
        </form>
    </div>

    <?php
    if (isset($_POST['addResource'])) {
        include 'classes/db1.php';

        $r_name = $_POST['r_name'];
        $type = $_POST['type'];
        $quantity = $_POST['quantity'];
        $event_id = $_POST['event_id'];

        $insertQuery = "INSERT INTO resources (r_name, type, quantity, event_id) 
                        VALUES ('$r_name', '$type', $quantity, $event_id)";

        if (mysqli_query($conn, $insertQuery)) {
            echo "<script>alert('Resource added successfully!'); window.location.href='resources.php';</script>";
        } else {
            echo "<script>alert('Error adding resource: " . mysqli_error($conn) . "');</script>";
        }
    }
    ?>

    <?php include 'utils/footer.php'; ?>
</body>

</html>
