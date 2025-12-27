<?php
include 'classes/db1.php';

if (isset($_GET['req_id'])) {
    $req_id = $_GET['req_id'];
    $deleteQuery = "DELETE FROM resources WHERE req_id = '$req_id'";

    if (mysqli_query($conn, $deleteQuery)) {
        echo "<script>alert('Resource deleted successfully!'); window.location.href='resources.php';</script>";
    } else {
        echo "<script>alert('Error deleting resource: " . mysqli_error($conn) . "');</script>";
    }
}
?>
