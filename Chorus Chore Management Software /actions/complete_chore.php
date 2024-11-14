<?php
// Include the connection file
include_once '../settings/connection.php';

// Get assignment ID and sid value from POST data
$assignmentId = $_POST['assignment_id'];
$sidValue = $_POST['sid'];

// Update the sid value, last_update, and date_completed for the assignment
$sql = "UPDATE `Assignment` SET `sid` = $sidValue, `last_updated` = NOW(), `date_completed` = CASE WHEN $sidValue = 1 THEN NULL ELSE NOW() END WHERE `assignmentid` = $assignmentId";

// Execute the query using the connection
if ($conn->query($sql) === TRUE) {
    // Send a success response
    echo "Assignment sid updated successfully";
    header('Location: ../admin/assign_chore_view.php');
} else {
    // If query execution failed, handle the error
    echo "Error updating record: " . $conn->error;
}

// Close the connection
$conn->close();
