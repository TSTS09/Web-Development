- Create a file in the action folder - get_all_assignment_action.php

    Include the connection.

    Create a function that returns the result of a SELECT query.

    Write the SELECT all assignments query.

    Execute the query using the global connection.

    Check if execution worked.

    Check if any record was returned.

    Fetch records if above is successful and assign to variable.

    Return the result variable: using the Return command.

- Create a file in the function folder-get_all_assignment_fxn.php

    Include the get_all_assignment_action.php file.

    Execute/call/run the function created in the get_all_assignment_action.php file and assign the output to a variable (let's say var_data)

    Using the variable (var_data) object, create the display table rows and elements.

    Add the action items to the display (delete and status icons on the image above)

- Using the assign_chore_view.php, display the list of chores assignments.

    Include the get_all_assignment_fxn.php file (the position of this depends on if you used a function or not)
    Display the list of chores assignments.



Sure, I can extract the text from the image you sent. Here it is:

* Create a file in the function folder for the statistics - (let's say home_fxn.php)
* You can handle this as separate functions within one file in the function folder.
* Or, you can create a different function file for each statistic.

**Regardless of the approach, do the following:**

* Include the get_all_assignment_action.php file.
* Execute/call/run the necessary function created in the get_all_assignment_action.php file and assign the output to a variable (let's say var_data_statistic).
* Using the variable (var_data) object, create the display statistic or table rows and elements.
* No action item required here.

* Using the home_view.php.php, display the list of chores assignments.

* Include the home_fxn.php file (the position of this depends on if you used a function or not and if you used multiple function files for each statistic).
* Display the list of chore assignments respectively (check the image above).


<?php

session_start();

function checkLogin() {
    // Check if user id session exists
    if (!isset($_SESSION['userId'])) {
        header('Location: ../view/login_view.php');    
        die();
    }
}
  // Check if role id session exists
  if (!isset($_SESSION['roleId'])) {
    header('Location: ../view/login_view.php');    
    die();
  }
?>





                    <div onclick="redirectToChorePage()" class="card">
                        <img src="../images/pic1.webp">
                        <h4>Work In-Progress</h4>
                        <h4><i>50</i></h4>
                        <p> Last activity</p>
                        <div class="per">
                            <table>
                                <tr>
                                    <td><span>85%</span></td>
                                    <td><span>87%</span></td>
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
                        <h4><i>50</i></h4>
                        <p> Last activity</p>
                        <div class="per">
                            <table>
                                <tr>
                                    <td><span>82%</span></td>
                                    <td><span>85%</span></td>
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
                        <h4><i>50</i></h4>
                        <p> Last activity</p>
                        <div class="per">
                            <table>
                                <tr>
                                    <td><span>94%</span></td>
                                    <td><span>92%</span></td>
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
                        <h4><i>50</i></h4>
                        <p> Last activity</p>
                        <div class="per">
                            <table>
                                <tr>
                                    <td><span>85%</span></td>
                                    <td><span>82%</span></td>
                                </tr>
                                <tr>
                                    <td>Month</td>
                                    <td>Year</td>
                                </tr>
                            </table>
                        </div>
                        <button>More Infos</button>
                    </div>
                
