<?php
include_once "../actions/get_all_assignment.php";

$Assignments = get_all_assignment();
// Display the chores in a table
foreach ($Assignments as $Assignment) {
    echo "<tr>";
    echo "<td>{$Assignment['assigned_by_name']}</td>"; // Using 'assigned_by_name' alias
    echo "<td>{$Assignment['chore_name']}</td>";
    // echo "<td>{$Assignment['chore_name']}</td>"; // Using 'chore_name' alias
    echo "<td>{$Assignment['date_due']}</td>";
    echo "<td>{$Assignment['date_assign']}</td>";
    echo "<td>{$Assignment['last_updated']}</td>";

    echo "<td>{$Assignment['status_name']}</td>"; // Using 'status_name' alias
    echo "  <td><button>View</button></td>";
 
    echo "</tr>";
}


echo '</tbody>';
echo '</table>';
