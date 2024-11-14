<?php
include_once "../actions/get_all_assignment.php";

$Assignments = get_all_assignment();
// Display the chores in a table
foreach ($Assignments as $Assignment) {
    echo "<tr>";
    echo "<td>{$Assignment['chore_name']}</td>"; // Using 'chore_name' alias
    echo "<td>{$Assignment['assigned_by_name']}</td>"; // Using 'assigned_by_name' alias
    echo "<td>{$Assignment['date_assign']}</td>";
    echo "<td>{$Assignment['date_due']}</td>";
    echo "<td>{$Assignment['status_name']}</td>"; // Using 'status_name' alias
    
    echo "<td>";
    // echo "<a href='../actions/delete_assignment_action.php?Assignment_ID={$Assignment['assignmentid']}'><button class='delete-chore-btn'>Delete</button></a>";
    // Check if sid is 3 and add checked attribute to the checkbox
    if ($Assignment['sid'] == 3) {
        echo "<input type='checkbox' name='select_assignment[]' value='{$Assignment['assignmentid']}' checked='checked' style='width: 20px; height: 20px; border: 1px solid #ccc; border-radius: 3px; cursor: pointer; vertical-align: middle;' onchange='completeAssignment(this);'>";
    } else {
        echo "<input type='checkbox' name='select_assignment[]' value='{$Assignment['assignmentid']}' style='width: 20px; height: 20px; border: 1px solid #ccc; border-radius: 3px; cursor: pointer; vertical-align: middle;' onchange='completeAssignment(this);'>";
    }
    echo "</td>";
    echo "</tr>";
}

// Close the table and tbody tags
echo '</tbody>';
echo '</table>';
?>
<script>
// Update local storage when checkbox is clicked
function completeAssignment(checkbox) {
    var assignmentId = checkbox.value;
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Optional: Do something with the response
                console.log(xhr.responseText);
                // Update local storage with the checked state
                var checkedIds = JSON.parse(localStorage.getItem('checked_assignment_ids')) || [];
                if (checkbox.checked) {
                    checkedIds.push(assignmentId);
                } else {
                    checkedIds = checkedIds.filter(id => id !== assignmentId);
                }
                localStorage.setItem('checked_assignment_ids', JSON.stringify(checkedIds));
            } else {
                console.error('Request failed: ' + xhr.status);
            }
        }
    };
    xhr.open('POST', '../actions/complete_chore.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    // Toggle sid value based on checkbox state
    var sidValue = checkbox.checked ? 3 : 1;
    // Send assignment ID and new sid value to server
    xhr.send('assignment_id=' + encodeURIComponent(assignmentId) + '&sid=' + encodeURIComponent(sidValue));
}
</script>

