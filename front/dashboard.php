                        <?php
                        include( 'db.php' );

                        if ( isset( $_POST[ 'submit' ] ) ) {

                            $first_name = $_POST[ 'first_name' ];
                            $last_name = $_POST[ 'last_name' ];
                            $email = $_POST[ 'email' ];
                            $phone = $_POST[ 'phone' ];
                            // $password = $_POST[ 'password' ];
                            $password = password_hash( $_POST[ 'password' ], PASSWORD_DEFAULT );

                            $sql = " INSERT INTO user(first_name,last_name,email,phone,password)values('$first_name','$last_name','$email','$phone','$password' )";

                            $result = mysqli_query( $conn, $sql );

                            if ( $result ) {
                                echo 'User added Successfully';
                            } else {
                                echo 'Failed'.mysqli_error( $conn );
                            }

                        }

                        // echo '<pre>';
                        // print_r( $data );
                        // die;

                        ?>

                        <!DOCTYPE html>
                        <html lang = 'en'>

                        <head>
                        <meta charset = 'UTF-8'>
                        <meta http-equiv = "X-UA-Compatible' content='IE = edge">
                        <meta name = "viewport' content='width = device-width, initial-scale = 1.0">
                        <link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css' rel='stylesheet"
                        integrity = "sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ' crossorigin='anonymous">
                        <link rel = 'stylesheet' href = 'assets/bootstrap/bootstrap.min.css'>
                        <title>Dashboard</title>
                        </head>

                        <body>

                        <div class = 'class'>
                        <h1 class = 'mid'> Welcome in Admin Dashboard</h1>
                        <form method = 'post'>
                        <table border = '2'>
                        <tr>
                        <td>First Name</td>
                        <td><input type = 'text' name = 'first_name' ></td>
                        </tr>
                        <tr>
                        <td>Last Name</td>
                        <td><input type = 'text' name = 'last_name'></td>
                        </tr>
                        <tr>
                        <td>Email</td>
                        <td><input type = 'email' name = 'email'></td>
                        </tr>
                        <tr>
                        <td>Phone</td>
                        <td><input type = 'number' name = 'phone'></td>
                        </tr>
                        <tr>
                        <td>Password</td>
                        <td><input type = 'password' name = 'password'></td>
                        </tr>
                        <tr>
                        <td></td>
                        <td><button type = 'submit' name = 'submit' values = 'submit'>Add User</button></td>
                        </tr>
                        </table>
                        </form>

                        <h1 class = 'task' > List Of All Task </h1>

                        <a href = 'export.php' class = 'btn btn-success' > Export Csv</a>
                        <?php
                        $query = 'SELECT * from task';
                        // $query ="SELECT user.name,task.start_time,task.stop_time,task.notes,task.description from tasks 
                        //   join user ON task.user_id = user.id ";
                        $result = mysqli_query( $conn, $query );
                        ?>

                        </body>
                        <table>
                        <thead class = 'table'>

                        <tr class = 'right'>
                        <th>Id</th>
                        <th>Start_Time</th>
                        <th>Stop_Time</th>
                        <th>Notes</th>
                        <th>Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class = 'right'>
                        <?php while( $row = mysqli_fetch_assoc( $result ) ) {
                            ?>
                            <td><?php echo $row[ 'id' ];
                            ?></td>
                            <td><?php echo $row[ 'start_time' ];
                            ?></td>
                            <td><?php echo $row[ 'stop_time' ];
                            ?></td>
                            <td><?php echo $row[ 'notes' ];
                            ?></td>
                            <td><?php echo $row[ 'description' ];
                            ?></td>
                            </tr>
                            <?php }
                            ?>
                            </tbody>
                            </table>

                            </html>

                            <style>
                            /* .task {
                            text-align: center;
                            position: relative;
                        }
                        */
                        .table {
                            margin-top: 200px;
                            text-align: center;
                            position: relative;
                            font-weight: bold;
                        }

                        </style>