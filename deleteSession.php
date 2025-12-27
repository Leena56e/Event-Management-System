<?php
include_once 'classes/db1.php'; // Include database connection

if (isset($_GET['session_id'])) {
    $session_id = $_GET['session_id'];

    // Delete the session from the database
    $deleteQuery = "DELETE FROM sessions WHERE session_id = '$session_id'";

    if (mysqli_query($conn, $deleteQuery)) {
        echo "<script>alert('Session deleted successfully!'); window.location.href='sessions.php';</script>";
    } else {
        echo "<script>alert('Error deleting session: " . mysqli_error($conn) . "'); window.location.href='sessions.php';</script>";
    }
} else {
    echo "<script>alert('No session ID provided.'); window.location.href='sessions.php';</script>";
}
?>
