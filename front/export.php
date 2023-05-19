<?php
include( 'db.php' );
ob_start();
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=csv_export.csv');

$header_args = array( 'ID', 'USER_NAME', 'START_TIME', 'STOP_TIME', 'NOTES', 'DESCRIPTION' );

$sql =" SELECT * FROM task ";
$result = mysqli_query($conn,$sql);
ob_end_clean();
$output = fopen( 'php://output', 'w' );
fputcsv( $output, $header_args );
foreach( $result as $data_item ){
    fputcsv( $output, $data_item );
}
fclose( $output );
exit;
?>