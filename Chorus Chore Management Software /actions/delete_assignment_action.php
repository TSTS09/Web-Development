<?php
// Include the connection file
include_once '../settings/connection.php';

// Check if chore_id is set in the GET URL
if(isset($_GET['Assignment_ID'])) {
    // Retrieve chore_id from the GET URL
    $AssignmentID = $_GET['Assignment_ID'];

    // Write your DELETE query
    $sql = "DELETE FROM Assignment WHERE assignmentid = $AssignmentID";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        // Redirect to chore display page if deletion was successful
        header('Location: ../admin/assign_chore_view.php');
        exit();
    } else {
        // Display error message if deletion failed
        echo "Error deleting record: " . $conn->error;
    }
} else {
    // Redirect to chore display page if chore_id is not set in the GET URL
    header('Location: ../admin/assign_chore_view.php');
    exit();
}

// Close the connection
$conn->close();
