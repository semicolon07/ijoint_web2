<?
//include('../../include/stcnn.php');
include('../dbconnect.php');

$list = $_POST['tid_list'];
$perform_datetimes = $_POST['perform_datetimes'];

foreach ($list as $key => $elem){
	$perform_datetime = date('Y-m-d', strtotime($perform_datetimes[$key]));

	$conn->update("task",array("status"=>"d","perform_datetime"=>$perform_datetime),array("tid"=>$elem));
}