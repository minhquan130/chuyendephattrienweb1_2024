<?php
require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; // Add new user
$_id = NULL;

if (!empty($_GET['id'])) {
    $_id = base64_decode($_GET['id']);
    $user = $userModel->findUserById($_id); // Update existing user
}

$errorMessages = [];

function validateName($name) {
    if (empty($name)) {
        return "Tên không được để trống.";
    }
    if (!preg_match("/^[A-Za-z0-9]{5,15}$/", $name)) {
        return "Tên chỉ bao gồm ký tự A-Z, a-z, 0-9 và có độ dài từ 5 đến 15 ký tự.";
    }
    return true;
}

function validatePassword($password) {
    if (empty($password)) {
        return "Mật khẩu không được để trống.";
    }
    if (strlen($password) < 5 || strlen($password) > 10) {
        return "Mật khẩu phải có độ dài từ 5 đến 10 ký tự.";
    }
    if (!preg_match("/[a-z]/", $password) || 
        !preg_match("/[A-Z]/", $password) || 
        !preg_match("/[0-9]/", $password) || 
        !preg_match("/[~!@#$%^&*()]/", $password)) {
        return "Mật khẩu phải bao gồm chữ thường, chữ hoa, số và ký tự đặc biệt: ~!@#$%^&*()";
    }
    return true;
}

if (!empty($_POST['submit'])) {
    $nameValidation = validateName($_POST['name']);
    $passwordValidation = validatePassword($_POST['password']);
    
    if ($nameValidation === true && $passwordValidation === true) {
        if (!empty($_id)) {
            $userModel->updateUser($_POST);
        } else {
            $userModel->insertUser($_POST);
        }
        header('location: list_users.php');
        exit; // Dừng thực thi script sau khi chuyển hướng
    } else {
        // Lưu thông báo lỗi
        if ($nameValidation !== true) $errorMessages[] = $nameValidation;
        if ($passwordValidation !== true) $errorMessages[] = $passwordValidation;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>User form</title>
    <?php include 'views/meta.php' ?>
</head>
<body>
    <?php include 'views/header.php'?>
    <div class="container">
        <?php if ($user || !isset($_id)) { ?>
            <div class="alert alert-warning" role="alert">
                User form
            </div>

            <?php if (!empty($errorMessages)) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php foreach ($errorMessages as $message) {
                        echo "<p>$message</p>";
                    } ?>
                </div>
            <?php } ?>

            <form method="POST">
                <input type="hidden" name="id" value="<?php echo $_id ?>">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control" name="name" placeholder="Name" value='<?php if (!empty($user[0]['name'])) echo $user[0]['name'] ?>'>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
            </form>
        <?php } else { ?>
            <div class="alert alert-success" role="alert">
                User not found!
            </div>
        <?php } ?>
    </div>
</body>
</html>
