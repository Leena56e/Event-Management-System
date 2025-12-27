<?php
include_once 'classes/db1.php';

// Check if the sponsor ID is set
if (isset($_GET['s_id'])) {
    $s_id = $_GET['s_id'];
    
    // Delete the sponsor from the database
    $deleteQuery = "DELETE FROM sponsors WHERE s_id = $s_id";
    
    if (mysqli_query($conn, $deleteQuery)) {
        echo "<script>alert('Sponsor deleted successfully!'); window.location.href='sponsors.php';</script>";
    } else {
        echo "<script>alert('Error deleting sponsor: " . mysqli_error($conn) . "'); window.location.href='sponsors.php';</script>";
    }
} else {
    // If no sponsor ID is set, redirect back
    header("Location: sponsors.php");
}
?>
