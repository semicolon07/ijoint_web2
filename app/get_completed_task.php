<?
//include('../../include/dbconnect.php');
include('../dbconnect.php');


//$pid = $_POST['pid'];
$tid = $_GET['tid'];
$sql = "select a.tid, a.time as time, a.angle, b.side, b.exercise_type FROM result_item a INNER JOIN task b where a.tid = b.tid and a.tid = $tid";
$query = $conn->queryRaw($sql);
$i=0;
foreach($query as $row){
	$task['number'] = $i;
	$i++;
	$task['tid'] = $row['tid'];
	$task['time'] = $row['time'];
	$task['angle'] = $row['angle'];
	$task['side'] = $row['side'];
	$task['exercise_type'] = $row['exercise_type'];
	$tasks[] = $task;
}

echo json_encode($tasks);
