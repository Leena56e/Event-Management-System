<?php
include 'classes/db1.php'; // Database connection

// Fetch events for the dropdown
$eventQuery = "SELECT event_id, event_title FROM events";
$eventResult = $conn->query($eventQuery);

if (!$eventResult) {
    die("Error fetching events: " . $conn->error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Event Registration</title>
    <?php require 'utils/styles.php'; ?>
</head>
<body>
    <?php require 'utils/header.php'; ?>
    <div class="container">
        <h1>Register for an Event</h1>
        <form method="POST" action="">
            <label for="usn">USN:</label>
            <input type="text" name="usn" id="usn" class="form-control" required><br>

            <div class="form-group">
                <label for="event">Select Event:</label>
                <select name="event_id" class="form-control" required>
                    <option value="">-- Select Event --</option>
                    <?php while ($event = mysqli_fetch_array($eventResult)) { ?>
                        <option value="<?php echo $event['event_id']; ?>">
                            <?php echo htmlspecialchars($event['event_title']); ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <button type="submit" name="register" class="btn btn-primary">Register</button>
            <a href="usn.php"><u>Already registered?</u></a></br>
            
        </form>
    </div>
    <?php require 'utils/footer.php'; ?>
</body>
</html>

<?php
if (isset($_POST['register'])) {
    $usn = $_POST['usn'];
    $event_id = $_POST['event_id'];

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM registered WHERE usn = ? AND event_id = ?");
    $stmt->bind_param("si", $usn, $event_id);
    $stmt->execute();
    $check_result = $stmt->get_result();

    if ($check_result->num_rows > 0) {
        echo "<script>
                alert('You are already registered for this event!');
                window.location.href = 'register.php';
              </script>";
    } else {
        // Register the participant for the event
        $insert_stmt = $conn->prepare("INSERT INTO registered (usn, event_id) VALUES (?, ?)");
        $insert_stmt->bind_param("si", $usn, $event_id);

        if ($insert_stmt->execute()) {
            echo "<script>
                    alert('Registration successful!');
                    window.location.href = 'register.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Error: " . $conn->error . "');
                    window.location.href = 'register.php';
                  </script>";
        }
    }

    $stmt->close();
    $insert_stmt->close();
    $conn->close();
}
?>
