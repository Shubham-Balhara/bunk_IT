<?php
include 'db_connection.php';
$conn=opencon();

$sql = "SELECT roll_no,vote from vote";
$result = $conn->query($sql);
$t=0;
$array = array();
$arrayn= array();
$bunk=0;$nobunk=0;
if($result){
while($row = $result->fetch_assoc()) {
         $array[$t] = $row["roll_no"];
         $arrayn[$t] = $row["vote"]  ;
         $t++;}
     }

while ($t--) {
	if ($arrayn[$t]=='1') {
		$bunk++;
	}
	else if($arrayn[$t]=='-')
	{
		$nobunk++;
	}
}
$bunk=$bunk*10;
$nobunk=$nobunk*10;

echo '<div style="background-color: black">
	<div style="background-color: black;padding: 15px">
		<h2 style="color: white;font-family: cursive;float: left;font-weight: bold;margin-left: 50px;">BUNK : </h2>
		<div style="height: 30px;width: '.$bunk.'px;border-radius: 5px 20px 20px 5px;background-color: green;margin-left: 250px;margin-top: 23px"></div>
	</div>
	<hr>
	<div style="background-color: black;padding: 15px">
		<h2 style="color: white;font-family: cursive;float: left;font-weight: bold;margin-left: 50px;">NO-BUNK : </h2>
		<div style="height: 30px;width: '.$nobunk.'px;border-radius: 5px 20px 20px 5px;background-color: orange;margin-left: 250px;margin-top: 23px"></div>
	</div>
</div>';

if ($bunk>$nobunk) {
	echo '<center><div style="width: 800px;padding: 50px 20px 50px 20px;border-radius:50px;margin-top:50px; background-color: #035b2f"><marquee scrollamount="10"><h2 style="font-family: cursive;font-weight: bold;color: white">HURRY BUNK...!!!</h2></marquee></div></center>';
}
else{
	echo '<center><div style="width: 800px;padding: 50px 20px 50px 20px;border-radius:50px;margin-top:50px; background-color: #872802"><marquee scrollamount="10"><h2 style="font-family: cursive;font-weight: bold;color: white">OHH.. NO-BUNK...!!!</h2></marquee></div></center>';	
}

echo "
<script type='text/javascript'>
	setTimeout(fun,6000);
	function fun(){
		location.href = 'adhome.html';
	}
</script>";

$conn->close();
?>