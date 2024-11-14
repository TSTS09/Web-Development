<?php
// Include the database connection file
include_once "../actions/get_all_assignment.php";

// Function to calculate the percentage
function calculate_percentage($part, $total) {
    if ($total == 0) {
        return 0;
    } else {
        return round(($part / $total) * 100);
    }
}

// Get the total number of assignments
$sql_total_assignments = "SELECT COUNT(*) as total_assignments FROM Assignment";
$result_total_assignments = $conn->query($sql_total_assignments);
$row_total_assignments = $result_total_assignments->fetch_assoc();
$total_assignments = $row_total_assignments['total_assignments'];

// Get the number of assignments in progress
$sql_in_progress = "SELECT COUNT(*) as in_progress FROM Assignment WHERE sid = 2 AND due_date >= CURDATE()";
$result_in_progress = $conn->query($sql_in_progress);
$row_in_progress = $result_in_progress->fetch_assoc();
$in_progress = $row_in_progress['in_progress'];

// Get the number of pending tasks
$sql_pending_tasks = "SELECT COUNT(*) as pending_tasks FROM Assignment WHERE sid = 4 AND due_date < CURDATE()";
$result_pending_tasks = $conn->query($sql_pending_tasks);
$row_pending_tasks = $result_pending_tasks->fetch_assoc();
$pending_tasks = $row_pending_tasks['pending_tasks'];

// Get the number of incomplete tasks
$sql_incomplete_tasks = "SELECT COUNT(*) as incomplete_tasks FROM Assignment WHERE sid = 4 AND due_date >= CURDATE()";
$result_incomplete_tasks = $conn->query($sql_incomplete_tasks);
$row_incomplete_tasks = $result_incomplete_tasks->fetch_assoc();
$incomplete_tasks = $row_incomplete_tasks['incomplete_tasks'];

// Get the number of completed tasks
$sql_completed_tasks = "SELECT COUNT(*) as completed_tasks FROM Assignment WHERE sid = 3";
$result_completed_tasks = $conn->query($sql_completed_tasks);
$row_completed_tasks = $result_completed_tasks->fetch_assoc();
$completed_tasks = $row_completed_tasks['completed_tasks'];
?>

<div class="users">
    <div onclick="redirectToChorePage()" class="card">
        <img src="../images/pic1.webp">
        <h4>Work In-Progress</h4>
        <h4><i><?php echo $in_progress; ?></i></h4>
        <p> Last activity</p>
        <div class="per">
            <table>
                <tr>
                    <td><span><?php echo calculate_percentage($in_progress, $total_assignments); ?>%</span></td>
                    <td><span><?php echo calculate_percentage($in_progress, $total_assignments); ?>%</span></td>
                </tr>
                <tr>
                    <td>Month</td>
                    <td>Year</td>
                </tr>
            </table>
        </div>
        <button>More Infos</button>
    </div>
    <div onclick="redirectToChorePage()" class="card">
        <img src="../images/pic2.webp">
        <h4>Pending Tasks</h4>
        <h4><i><?php echo $pending_tasks; ?></i></h4>
        <p> Last activity</p>
        <div class="per">
            <table>
                <tr>
                    <td><span><?php echo calculate_percentage($pending_tasks, $total_assignments); ?>%</span></td>
                    <td><span><?php echo calculate_percentage($pending_tasks, $total_assignments); ?>%</span></td>
                </tr>
                <tr>
                    <td>Month</td>
                    <td>Year</td>
                </tr>
            </table>
        </div>
        <button>More Infos</button>
    </div>
    <div onclick="redirectToChorePage()" class="card">
        <img src="../images/pic4.png">
        <h4>Incomplete Tasks</h4>
        <h4><i><?php echo $incomplete_tasks; ?></i></h4>
        <p> Last activity</p>
        <div class="per">
            <table>
                <tr>
                    <td><span><?php echo calculate_percentage($incomplete_tasks, $total_assignments); ?>%</span></td>
                    <td><span><?php echo calculate_percentage($incomplete_tasks, $total_assignments); ?>%</span></td>
                </tr>
                <tr>
                    <td>Month</td>
                    <td>Year</td>
                </tr>
            </table>
        </div>
        <button>More Infos</button>
    </div>
    <div onclick="redirectToChorePage()" class="card">
        <img src="../images/pic3.jpg">
        <h4>Completed Tasks</h4>
        <h4><i><?php echo $completed_tasks; ?></i></h4>
        <p> Last activity</p>
        <div class="per">
            <table>
                <tr>
                    <td><span><?php echo calculate_percentage($completed_tasks, $total_assignments); ?>%</span></td>
                    <td><span><?php echo calculate_percentage($completed_tasks, $total_assignments); ?>%</span></td>
                </tr>
                <tr>
                    <td>Month</td>
                    <td>Year</td>
                </tr>
            </table>
        </div>
        <button>More Infos</button>
    </div>
</div>

