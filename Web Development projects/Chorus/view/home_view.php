<span style="font-family: verdana, geneva, sans-serif;">
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <title>Welcome Page</title>
        <link rel="stylesheet" href="../css/style_home.css" />
        <!-- Font Awesome Cdn Link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    </head>

    <body>
        <div class="container">
            <nav>
                <ul>
                    <li><a href="#" class="logo">
                            <img src="../images/Chorus.png">
                            <p class="nav-item" style=" width: 85%; padding: 5px;text-align: left; margin-top: -10px;font-size: large;">
                                <b>Welcome back</b>
                            </p>
                        </a></li>
                    <li><a href="#">
                            <i class="fas fa-menorah"></i>
                            <span class="nav-item">Dashboard</span>
                        </a></li>
                    <li><a href="#">
                            <i class="fas fa-chart-bar"></i>
                            <span class="nav-item">Manage Chores</span>
                        </a></li>
                    <li><a href="logout_view.php" class="logout" id="logoutBtn">
                            <i class="fas fa-sign-out-alt"></i>
                            <span class="nav-item">Log out</span>
                        </a></li>
                </ul>
            </nav>


            <section class="main">
                <div class="main-top">
                    <h1>Chores Dashboard</h1>
                    <h2 style="margin-left: 880; margin-top: 4px; color: rgb(121, 112, 112);font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;width: 50%;">

                </div>
                <div class="users">
                    <?php
                    include_once "../functions/home_fxn.php"

                    ?>
                </div>

                <section class="attendance">
                    <div class="attendance-list">
                        <h1>Assigned Chores by</h1>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Assigned By</th>
                                    <th>Task</th>
                                    <th>Due Date</th>
                                    <th>Start Time</th>
                                    <th>Logout Time</th>
                                    <th>Chore Status</th>
                                    <th>Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include_once "../functions/home_table_fxn.php";
                                ?>
                            </tbody>
                        </table>
                    </div>
                </section>
            </section>
        </div>

        <script>
            function redirectToChorePage() {
                window.location.href = 'Chores-management/page.html';
            }
            document.getElementById('logoutBtn').addEventListener('click', function() {
                // Redirect to logout.php
                window.location.href = '../view/logout_view.php';
            });
        </script>

    </body>

    </html>
</span>