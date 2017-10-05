<?php

include 'db_connection.php';
$conn=opencon();
$sql='TRUNCATE TABLE vote';
$result = $conn->query($sql);
if ($result) {
	echo '<div style="background-color: blue;color: white;padding: 10px"><center><h1>Success</h1></center></div>';
	echo "
<script type='text/javascript'>
	setTimeout(fun,4000);
	function fun(){
		location.href = 'adhome.html';
	}
</script>";
}
else{
	echo '<div style="background-color: blue;color: white;padding: 10px"><center><h1>Failed</h1></center></div>';
	echo "
<script type='text/javascript'>
	setTimeout(fun,4000);
	function fun(){
		location.href = 'adhome.html';
	}
</script>";
}
?>