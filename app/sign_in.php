<?
//include('../../include/stcnn.php');
include('../dbconnect.php');

$username = $_POST['username'];
$password = md5($_POST['password']);

//$username = 'Aran';
//$password = md5('1234');

$sql = "select * from patient where username = '" . $username . "' and password = '" . $password . "'";
$query = mysqli_query($conn,$sql);
$nr = mysqli_num_rows($query);

if ($nr > 0){
	$result['status'] = true;

	$query = mysqli_query($conn,$sql);
	while ($row = mysqli_fetch_array($query)){
		$result['pid'] = $row['pid'];
		$result['pFirstName'] = $row['firstname'];
		$result['pLastName'] = $row['lastname'];
	}
}
else{
	$result['status'] = false;
}

echo json_encode($result);
?>