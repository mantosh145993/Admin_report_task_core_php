<?php
include( 'db.php' );
session_start();

// $query = "SELECT * FROM user";
// $all_data = mysqli_query($conn,$query);
// if($row= mysqli_fetch_assoc($all_data)){
// print_r($row['password']);die;
// }
// User login and password change
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' && isset( $_POST[ 'submit' ] ) ) {
    $email = $_POST[ 'email' ];
    $password = $_POST[ 'password' ];

    // Check if user credentials are valid
    $sql = "SELECT * FROM user WHERE email = '$email' ";
    $result = $conn->query( $sql );

    if ( $result->num_rows == 1 ) {
        while($row = $result->fetch_assoc()){
            $_SESSION[ 'user_id' ] = $row[ 'id' ];
            $_SESSION['password'] =$row['password'];

            $last_password_change = strtotime( $row[ 'last_login' ] );
            $current_time = time();
            $days_since_last_change = floor( ( $current_time - $last_password_change ) / ( 60 * 60 * 24 ) );

            if ( $days_since_last_change > 30 ) {
                $_SESSION[ 'change_password' ] = true;
                header( 'Location: change_password.php' );
                exit();
            } elseif( password_verify($password,$row['password']) ) {
                $_SESSION[ 'change_password' ] = false;
                header( 'Location: add_task.php' );
                exit();
            }
        }
    }
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

<h1 class = 'mid'> User Login</h1>
<form method = 'post'>
<table border = '2' align = 'center'>
<tr>
<td>Email</td>
<td><input type = 'email' name = 'email'></td>
</tr>
<td>Password</td>
<td><input type = 'password' name = 'password'></td>
</tr>
<tr>
<td></td>
<td><button onclick = 'fun()' type = 'submit' name = 'submit' values = 'submit'>Log in </button></td>
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
<script>

function fun(){
    alert("First you should change password 'Which is set by Admin, Please login! ");
}

</script>