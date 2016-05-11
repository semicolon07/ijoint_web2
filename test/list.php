<? //include('../../include/stcnn.php'); 
include('../dbconnect.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>List</title>
</head>
<body>
	<?
	$i = 0;
	$sql = "select * from rotation_vector group by performDateTime order by performDateTime asc";
	$query = mysqli_query($conn, $sql);
	while ($row = mysqli_fetch_array($query)){
		if ($i > 0){
			echo '<a href="result.php?pdt=' . $row['performDateTime'] . '">' . $row['performDateTime'] . '</a><br />';
		}
		$i++;
	}
	?>
</body>
</html>