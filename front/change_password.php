<?php
include( 'db.php' );
session_start();
// print_r($_SESSION['password']);
// die;
// Change password
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["change_password"])) {
    $user_id = $_SESSION["user_id"];
    $new_password = password_hash($_POST['new_password'], PASSWORD_BCRYPT);
    $last_psd = md5($_SESSION['password']);
    // Update user's password and last_password_change field
    $sql = "UPDATE user SET password = '$new_password', last_password = '$last_psd', last_login = NOW() WHERE id = $user_id";
    $conn->query($sql);

    $_SESSION["change_password"] = false;
    header("Location: user_login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang = 'en'>

<head>
<meta charset = 'UTF-8'>
<meta http-equiv = "X-UA-Compatible' content='IE = edge">
<meta name = "viewport' content='width = device-width, initial-scale = 1.0">
<link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css' rel='stylesheet"
integrity = "sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ' crossorigin='anonymous">
<title>User Login</title>
</head>

<body>

<h1 class = 'mid'> Password Change</h1>
<form method = 'post'>
<table border = "2" align="center">
<tr>
<td>Email</td>
<td><input type = 'email' name = 'email'></td>
</tr>
<td>New Password</td>
<td><input type = 'password' name = 'new_password'></td>
</tr>
<tr>
<td></td>
<td><button type = 'submit' name = 'change_password' values = 'change_password'>Log in </button></td>
</tr>
</table>
</form>




</body>





</html>

<style>
.mid {
    text-align: center;
    margin-top: 50px;
    position: relative;
}
</style>