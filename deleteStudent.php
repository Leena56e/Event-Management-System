<?php
include_once 'classes/db1.php';

if (isset($_GET['usn'])) {
    $usn = $_GET['usn'];

    // Delete the student from the database
    $deleteQuery = "DELETE FROM participant WHERE usn = '$usn'";

    if (mysqli_query($conn, $deleteQuery)) {
        echo "<script>alert('Student deleted successfully!'); window.location.href='stu_details.php';</script>";
    } else {
        echo "<script>alert('Error deleting student: " . mysqli_error($conn) . "'); window.location.href='stu_details.php';</script>";
    }
} else {
    echo "<script>alert('Invalid student ID!'); window.location.href='stu_details.php';</script>";
}
?>
