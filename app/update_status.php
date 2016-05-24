<?
//include('../../include/stcnn.php');
include('../dbconnect.php');

$list = $_POST['tid_list'];

$conn->update("task",array("status"=>"s"),array("tid"=>$list));
