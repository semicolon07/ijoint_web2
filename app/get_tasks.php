<?
//include('../../include/dbconnect.php');
include('../dbconnect.php');


$pid = $_POST['pid'];

$sql = "select * from task where pid = $pid and status IN ('c', 'e', 's')";
$query = $conn->queryRaw($sql);
foreach($query as $row){
	$task['tid'] = $row['tid'];
	$task['pid'] = $row['pid'];
	$task['date'] = $row['date'];
	$task['side'] = $row['side'];
	$task['target_angle'] = $row['target_angle'];
	$task['number_of_round'] = $row['number_of_round'];
	$task['is_abf'] = $row['is_abf'];
	$task['status'] = $row['status'];
	$task['exercise_type'] = $row['exercise_type'];

	$tasks[] = $task;
}
echo json_encode($tasks);
