<?php
require_once 'utils/header.php';
require_once 'utils/styles.php';
include_once 'classes/db1.php'; // Database connection

// Check if 'usn' is provided
if (isset($_POST['usn'])) {
    $usn = $_POST['usn'];

    $query = "
        SELECT 
            e.event_title, st.st_name, s.name AS staff_name, ef.Date, ef.time, ef.location 
        FROM 
            registered r
        JOIN events e ON r.event_id = e.event_id
        JOIN event_info ef ON e.event_id = ef.event_id
        JOIN student_coordinator st ON e.event_id = st.event_id
        JOIN staff_coordinator s ON e.event_id = s.event_id
        WHERE 
            r.usn = ?
    ";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $usn);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    echo "<p>USN not provided. Please go back and enter your USN.</p>";
    exit();
}
?>

<div class="content">
    <div class="container">
        <h1>Registered Events</h1>
        <?php if (isset($result) && $result->num_rows > 0) { ?>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Event Name</th>
                        <th>Student Coordinator</th>
                        <th>Staff Coordinator</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Location</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $row['event_title']; ?></td>
                            <td><?php echo $row['st_name']; ?></td>
                            <td><?php echo $row['staff_name']; ?></td>
                            <td><?php echo $row['Date']; ?></td>
                            <td><?php echo $row['time']; ?></td>
                            <td><?php echo $row['location']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } else { ?>
            <p>No events registered yet.</p>
        <?php } ?>
        <a class="btn btn-default" href="dashboard.php"><span class="glyphicon glyphicon-circle-arrow-left"></span> Back</a>
    </div>
</div>


            
            

        

<?php
$stmt->close();
$conn->close();
include 'utils/footer.php';
?>
