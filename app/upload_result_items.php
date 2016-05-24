<?
//include('../../include/dbconnect.php');
include('../dbconnect.php');

$json = json_decode(stripslashes($_POST['json']));

$score = $json->score;
$perform_datetime = $json->perform_datetime;
$tasks = $json->result;

$tid = $tasks[0]->tid;

$sql = "select * from task where tid = " . $tid;
$row = $conn->queryRaw($sql,true);

if ($row['status'] != "d"){
	foreach ($tasks as $key => $task){
		$value = array(
			"time"=>$task->time
			,"angle"=>$task->angle
			,"rawAngle"=>$task->rawAngle
			,"azimuth"=>$task->azimuth
			,"pitch"=>$task->pitch
			,"roll"=>$task->roll
			,"accX"=>$task->accX
			,"accY"=>$task->accY
			,"accZ"=>$task->accZ
			,"gyroX"=>$task->gyroX
			,"gyroY"=>$task->gyroY
			,"gyroZ"=>$task->gyroZ
			,"magX"=>$task->magX
			,"magY"=>$task->magY
			,"magZ"=>$task->magZ
		);

	$conn->create("result_item",$value);
	}

	$conn->update("task",array("status"=>"d","perform_datetime"=>$perform_datetime,"score"=>$score),array("tid"=>$tid));
}