<?php
include( 'db.php' );
// if ( isset( $_POST[ 'submit' ] ) ) {
//     $email = $_POST[ 'email' ];
//     $password = $_POST[ 'password' ];
// }
// $sql = 'SELECT  * from admin';

// $result = mysqli_query( $conn, $sql );
// echo '<pre>';
// return print_r( $result );
// die;
// if ( $result ) {
//     header( 'location: ./dashboard.php' );
// } else {
//     echo 'Error'. mysqli_error( $conn );
// }

if ( isset( $_POST[ 'submit' ] ) ) {
    $sql = mysqli_query( $conn,
    "      SELECT * FROM admin WHERE email='". $_POST[ 'email' ] . "'     AND password='" . $_POST[ 'password' ] . "'     " );

    $num = mysqli_num_rows( $sql );

    if ( $num > 0 ) {
        $row = mysqli_fetch_array( $sql );
        header( 'location:dashboard.php' );
        exit();
    } else {
        echo 'Admin Not found';
    }

}

?>

<!DOCTYPE html>
<html lang = 'en'>

<head>
<meta charset = 'UTF-8'>
<meta http-equiv = 'X-UA-Compatible' content = 'IE=edge'>
<meta name = 'viewport' content = 'width=device-width, initial-scale=1.0'>
<link href = 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css' rel = 'stylesheet'
integrity = 'sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ' crossorigin = 'anonymous'>
<title>Admin Login</title>
</head>

<body>

<h1 class = 'mid'> Admin Login</h1>
<form method = 'post'>
<table border = '2' align = 'center'>
<tr>
<td>Email</td>
<td><input type = 'text' name = 'email'></td>
</tr>
<tr>
<td>Password</td>
<td><input type = 'password' name = 'password'></td>
</tr>
<tr>
<td></td>
<td><button type = 'submit' name = 'submit'>Log In</button></td>
</tr>
<!-- <tr>
<td></td>
<td><a href = 'http://localhost/admin/front/register.html' >Registe Now</a></td>
</tr> -->

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