<?
include('include/chk_auth.php');
//include('../include/stcnn.php');
include('dbconnect.php');

$pid = $_GET['pid'];
$tid = $_GET['tid'];

$sql = "update task set status = 'x' where tid = $tid";
mysqli_query($conn,$sql);

header('Location: tasks.php?pid=' . $pid);
exit();
?>