<?php
session_start();
require_once 'models/UserModel.php';
$userModel = new UserModel();

// Check if the form is submitted via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['csrf_token']) && hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        $id = intval($_POST['id']); // Sanitize input

        // Call the model method to delete the user
        if ($userModel->deleteUserById($id)) {
            $_SESSION['message'] = 'User deleted successfully.';
        } else {
            $_SESSION['error'] = 'Error deleting user. Please try again.';
        }
    } else {
        $_SESSION['error'] = 'Invalid CSRF token.';
    }
} else {
    $_SESSION['error'] = 'Invalid request method.';
}

// Redirect back to the user list
header('Location: list_users.php');
exit;
?>
