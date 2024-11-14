<?php

session_start();

function checkLogin() {
    // Check if user id session exists
    if (!isset($_SESSION['userId'])) {
        header('Location: ../view/login_view.php');    
        die();
    }
}

function checkRole() {
    // Check if role id session exists
    if (!isset($_SESSION['roleId'])) {
        header('Location: ../view/login_view.php');    
        die();
    }

    // Return the user's role id
    return $_SESSION['roleId'];
}

function controlAccess() {
    $roleId = checkRole();

    // Check the user's role and control access accordingly
    switch ($roleId) {
        case 1: // Super Admin
            // Super Admin has access to all pages
            break;
        case 2: // Admin
            // Remove access to the delete action for Admin
            if (basename($_SERVER['PHP_SELF']) == 'delete.php') {
                header('Location: ../view/access_denied.php');
                die();
            }
            break;
        case 3: // Standard User
            // Redirect to main dashboard for Standard User
            if (basename($_SERVER['PHP_SELF']) != 'home_view.php') {
                header('Location: ../view/home_view.php');
                die();
            }
            break;
        default:
            // For any other role or invalid role, redirect to login
            header('Location: ../view/login_view.php');
            die();
    }
}
