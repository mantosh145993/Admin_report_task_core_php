<?php
include( 'db.php' );
// include('user_login.php');
session_start();
// $id = $_SESSION['id'];
$_SESSION['logged_in_datetime'] = date("d M Y H:i");
// print_r($_SESSION['logged_in_datetime']);
if ( isset( $_POST[ 'submit' ] ) ) {

    $start_time = $_POST[ 'start_time' ];
    $user_id = $_POST['user_id'];
    $stop_time = $_POST[ 'stop_time' ];
    $notes = $_POST[ 'notes' ];
    $description = $_POST[ 'description' ];

    $sql = " INSERT INTO task(user_id,start_time,stop_time,notes,description)values('$user_id','$start_time','$stop_time','$notes','$description')";

    $result = mysqli_query( $conn, $sql );

    if ( $result ) {
        echo 'Task added Successfully';
    } else {
        echo 'Failed'.mysqli_error( $conn );
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
<title>Dashboard</title>
</head>

<body>

<h1 class = 'mid'> Add Task</h1> 

<form method="post" action="add_task.php" >
<button class="logout" onclick="on()" type="submit" name="logout" value="logout" >Log Out</button>
</form>

<form method = 'post'>
<table border = "2" align="center">


<input type = 'text' name = 'user_id' value="<?php echo $_SESSION['name']; ?>" hidden >



<td>Start Time</td>
<td><input type = 'text' name = 'start_time' ></td>
</tr>
<tr>
<td>End Time</td>
<td><input type = 'text' name = 'stop_time'></td>
</tr>
<tr>
<td>Notes</td>
<td><input type = 'text' name = 'notes'></td>
</tr>
<tr>
<td>Description</td>
<td><textarea   name="description" ></textarea></td>
</tr>
<tr>
<td></td>
<td><button type = 'submit' name = 'submit' values = 'submit'>Add Task</button></td>
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
<?php 

if(isset($_POST['logout'])){

    header('location:logout.php');
    
}

?>
<script>
    function on(){
        alert("Logout Successfully?");
    }
</script>