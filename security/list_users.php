<?php
session_start();
require_once 'models/UserModel.php';
$userModel = new UserModel();

$params = [];
if (!empty($_GET['keyword'])) {
    $params['keyword'] = htmlspecialchars($_GET['keyword']); // Escape input
}

$users = $userModel->getUsers($params);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <?php include 'views/meta.php' ?>
</head>

<body>
    <?php include 'views/header.php' ?>
    <div class="container">
        <?php if (!empty($users)) { ?>
            <div class="alert alert-warning" role="alert">
                List of users!
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Username</th>
                        <th scope="col">Fullname</th>
                        <th scope="col">Type</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) { ?>
                        <tr>
                            <th scope="row"><?php echo htmlspecialchars($user['id']) ?></th>
                            <td><?php echo htmlspecialchars($user['name']) ?></td>
                            <td><?php echo htmlspecialchars($user['fullname']) ?></td>
                            <td><?php echo htmlspecialchars($user['type']) ?></td>
                            <td>
                                <a href="form_user.php?id=<?php echo base64_encode($user['id']) ?>">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true" title="Update"></i>
                                </a>
                                <a href="view_user.php?id=<?php echo htmlspecialchars($user['id']) ?>">
                                    <i class="fa fa-eye" aria-hidden="true" title="View"></i>
                                </a>
                                <form method="POST" action="delete_user.php" style="display:inline;">
                                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($user['id']) ?>">
                                    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                                    <button type="submit" style="border:none; background:none;" title="Delete">
                                        <i class="fa fa-eraser" aria-hidden="true"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } else { ?>
            <div class="alert alert-dark" role="alert">
                No users found!
            </div>
        <?php } ?>
    </div>
</body>

</html>
