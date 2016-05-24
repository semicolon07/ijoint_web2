<?
//include('../../include/stcnn.php');
include('../dbconnect.php');

$username = $_POST['username'];
$password = md5($_POST['password']);

//$username = 'Aran';
//$password = md5('1234');

$sql = "select * from patient where username = '" . $username . "' and password = '" . $password . "'";
$row = $conn->queryRaw($sql, true);
if ($row != null) {
    $result['status'] = true;
    $result['pid'] = $row['pid'];
    $result['pFirstName'] = $row['firstname'];
    $result['pLastName'] = $row['lastname'];
} else {
    $result['status'] = false;
}

echo json_encode($result);
