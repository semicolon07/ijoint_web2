<?php
include('dbconnect.php');

$pid = $_GET['pid'];
$tid = $_GET['tid'];

$time_list = array();
$angle_list = array();
$angle_list_txt = "";

$SQL = "select angle FROM result_item where tid = " + $tid;
$query = mysqli_query($conn,$SQL);
$i = 1;

$angle_list_txt = "";

$i = 1;
while ($row = mysqli_fetch_array($query)){
	$time_list[] = number_format( ($row['time']/1000), 1);
	$angle_list[] = $row['angle'];
	if($angle_list_txt != ""){
		$angle_list_txt = $angle_list_txt."|".$row['angle'];
	} else {
		$angle_list_txt = "angle:".$row['angle'];
	}
$i++; 
}

echo $angle_list_txt;
?>