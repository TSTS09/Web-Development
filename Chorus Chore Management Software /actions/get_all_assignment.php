<?php
include_once '../settings/connection.php';
//Get all assignment function 
function get_all_assignment()
{
    // Check if the connection is successful
    global $conn;
    $Assignment = array(); // Initialize the $Assignment array
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT Assignment.*, Chores.chorename as chore_name, Status.sname as status_name, CONCAT(People.fname, ' ', People.lname) as assigned_by_name 
        FROM Assignment 
        JOIN Chores ON Assignment.cid = Chores.cid 
        JOIN Status ON Assignment.sid = Status.sid 
        JOIN People ON Assignment.who_assigned = People.pid";
    $result = $conn->query($sql);

    if (!$result) {
        echo "Error: " . $conn->error;
    } else {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $Assignment[] = $row;
            }
        }
    }
    // Close the connection
    $conn->close();
    return $Assignment;
}

function get_assignments_in_progress()
{
    global $conn;
    $assignments = array();

    $sql = "SELECT Assignment.*, Chores.chorename as chore_name, Status.sname as status_name, CONCAT(People.fname, ' ', People.lname) as assigned_by_name 
            FROM Assignment 
            JOIN Chores ON Assignment.cid = Chores.cid 
            JOIN Status ON Assignment.sid = Status.sid 
            JOIN People ON Assignment.who_assigned = People.pid
            WHERE Assignment.sid = 2  -- Filter by Status (In Progress)
            AND Assignment.due_date >= CURDATE()";
    $result = $conn->query($sql);
    if (!$result) {
        echo "Error: " . $conn->error;
    } else {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $assignments[] = $row;
            }
        }
    }
    // Close the connection
    $conn->close();
    return $assignments;
}

function get_all_assignment_incomplete()
{
    // Check if the connection is successful
    global $conn;
    $Assignment = array(); // Initialize the $Assignment array
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT Assignment.*, Chores.chorename as chore_name, Status.sname as status_name, CONCAT(People.fname, ' ', People.lname) as assigned_by_name 
        FROM Assignment 
        JOIN Chores ON Assignment.cid = Chores.cid 
        JOIN Status ON Assignment.sid = Status.sid 
        JOIN People ON Assignment.who_assigned = People.pid
        WHERE Assignment.sid = 4  -- Filter by Status (Incomplete)
          AND Assignment.due_date < CURDATE()";
    $result = $conn->query($sql);

    if (!$result) {
        echo "Error: " . $conn->error;
    } else {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $Assignment[] = $row;
            }
        }
    }
    // Close the connection
    $conn->close();
    return $Assignment;
}

function get_all_assignment_completed()
{
    // Check if the connection is successful
    global $conn;
    $Assignment = array(); // Initialize the $Assignment array
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT Assignment.*, Chores.chorename as chore_name, Status.sname as status_name, CONCAT(People.fname, ' ', People.lname) as assigned_by_name 
        FROM Assignment 
        JOIN Chores ON Assignment.cid = Chores.cid 
        JOIN Status ON Assignment.sid = Status.sid 
        JOIN People ON Assignment.who_assigned = People.pid
        WHERE Assignment.sid = 3";
    $result = $conn->query($sql);

    if (!$result) {
        echo "Error: " . $conn->error;
    } else {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $Assignment[] = $row;
            }
        }
    }
    // Close the connection
    $conn->close();
    return $Assignment;
}


function get_recent_assignment()
{
    // Check if the connection is successful
    global $conn;
    $Assignment = array(); // Initialize the $Assignment array
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT Assignment.*, Chores.chorename as chore_name, Status.sname as status_name, CONCAT(People.fname, ' ', People.lname) as assigned_by_name 
        FROM Assignment 
        JOIN Chores ON Assignment.cid = Chores.cid 
        JOIN Status ON Assignment.sid = Status.sid 
        JOIN People ON Assignment.who_assigned = People.pid
        WHERE Assignment.sid = 2  
          ORDER BY Assignment.assigned_date DESC
          LIMIT 3";
    $result = $conn->query($sql);

    if (!$result) {
        echo "Error: " . $conn->error;
    } else {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $Assignment[] = $row;
            }
        }
    }
    // Close the connection
    $conn->close();
    return $Assignment;
}
