<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Session - Inspirus 8</title>
    <?php require 'utils/styles.php'; ?>
</head>

<body>
    <?php include 'utils/adminHeader.php'; ?>

    <div class="container">
        <h2>Update Session</h2>
        <?php
        include 'classes/db1.php';
        if (isset($_GET['session_id'])) {
            $session_id = $_GET['session_id'];
            $result = mysqli_query($conn, "SELECT * FROM sessions WHERE session_id = '$session_id'");
            $session = mysqli_fetch_array($result);
        }
        ?>
        <form method="POST" action="">
            <input type="hidden" name="session_id" value="<?php echo htmlspecialchars($session['session_id']); ?>">
            <div class="form-group">
                <label>Session Type:</label>
                <input type="text" name="sess_type" required class="form-control" value="<?php echo htmlspecialchars($session['sess_type']); ?>">
            </div>

            <div class="form-group">
                <label>Speaker:</label>
                <input type="text" name="speaker" required class="form-control" value="<?php echo htmlspecialchars($session['speaker']); ?>">
            </div>

            <div class="form-group">
                <label>Start Time:</label>
                <input type="time" name="start_time" required class="form-control" value="<?php echo htmlspecialchars($session['start_time']); ?>">
            </div>

            <div class="form-group">
                <label>End Time:</label>
                <input type="time" name="end_time" required class="form-control" value="<?php echo htmlspecialchars($session['end_time']); ?>">
            </div>

            <div class="form-group">
                <label>Date:</label>
                <input type="date" name="date" required class="form-control" value="<?php echo htmlspecialchars($session['date']); ?>">
            </div>

            <div class="form-group">
                <label>Event:</label>
                <input type="text" name="event" required class="form-control" value="<?php echo htmlspecialchars($session['event']); ?>">
            </div>

            <div class="form-group">
                <label>Event ID:</label>
                <input type="number" name="event_id" required class="form-control" value="<?php echo htmlspecialchars($session['event_id']); ?>">
            </div>

            <button type="submit" name="updateSession" class="btn btn-primary">Update Session</button>
            <a href="sessions.php" class="btn btn-default">Back to Sessions</a>
        </form>
    </div>

    <?php
    if (isset($_POST['updateSession'])) {
        $session_id = $_POST['session_id'];
        $sess_type = $_POST['sess_type'];
        $speaker = $_POST['speaker'];
        $start_time = $_POST['end_time'];
        $date = $_POST['date'];
        $event = $_POST['event'];
        $event_id = $_POST['event_id'];

        // Update the session in the database
        $updateQuery = "UPDATE sessions SET 
            sess_type = '$sess_type', 
            speaker = '$speaker', 
            start_time = '$start_time', 
            end_time = '$end_time', 
            date = '$date', 
            event = '$event', 
            event_id = '$event_id' 
            WHERE session_id = '$session_id'";

        if (mysqli_query($conn, $updateQuery)) {
            echo "<script>alert('Session updated successfully!'); window.location.href='sessions.php';</script>";
        } else {
            echo "<script>alert('Error updating session: " . mysqli_error($conn) . "');</script>";
        }
    }
    ?>

    <?php include 'utils/footer.php'; ?>
</body>

</html>
