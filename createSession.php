<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Session - Inspirus 8</title>
    <?php require 'utils/styles.php'; ?>
</head>

<body>
    <?php include 'utils/adminHeader.php'; ?>

    <div class="container">
        <h2>Add New Session</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label>Session Type:</label>
                <input type="text" name="sess_type" required class="form-control">
            </div>

            <div class="form-group">
                <label>Speaker:</label>
                <input type="text" name="speaker" required class="form-control">
            </div>

            <div class="form-group">
                <label>Start Time:</label>
                <input type="time" name="start_time" required class="form-control">
            </div>

            <div class="form-group">
                <label>End Time:</label>
                <input type="time" name="end_time" required class="form-control">
            </div>

            <div class="form-group">
                <label>Date:</label>
                <input type="date" name="date" required class="form-control">
            </div>

            <div class="form-group">
                <label>Event:</label>
                <input type="text" name="event" required class="form-control">
            </div>

            <div class="form-group">
                <label>Event ID:</label>
                <input type="number" name="event_id" required class="form-control">
            </div>

            <button type="submit" name="addSession" class="btn btn-primary">Add Session</button>
            <a href="sessions.php" class="btn btn-default">Back to Sessions</a>
        </form>
    </div>

    <?php
    if (isset($_POST['addSession'])) {
        $sess_type = $_POST['sess_type'];
        $speaker = $_POST['speaker'];
        $start_time = $_POST['start_time'];
        $end_time = $_POST['end_time'];
        $date = $_POST['date'];
        $event = $_POST['event'];
        $event_id = $_POST['event_id'];

        // Insert the new session into the database
        include 'classes/db1.php';
        $insertQuery = "INSERT INTO sessions (sess_type, speaker, start_time, end_time, date, event, event_id) VALUES ('$sess_type', '$speaker', '$start_time', '$end_time', '$date', '$event', '$event_id')";

        if (mysqli_query($conn, $insertQuery)) {
            echo "<script>alert('Session added successfully!'); window.location.href='sessions.php';</script>";
        } else {
            echo "<script>alert('Error adding session: " . mysqli_error($conn) . "');</script>";
        }
    }
    ?>

    <?php include 'utils/footer.php'; ?>
</body>

</html>
