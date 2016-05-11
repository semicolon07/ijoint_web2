<?
//include('../../include/stcnn.php');
include('../dbconnect.php');

$list = $_POST['tid_list'];

$sql = "update task set status = 's' where tid in ($list)";
mysqli_query($conn, $sql);
?>