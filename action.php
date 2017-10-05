<?php
include 'db_connection.php';
$conn=opencon();
$roll=$_POST['roll'];
$user=$_POST['name'];
$choice=$_POST['choice'];
if ($choice=='Bunk') {
	$vote='1';
}
else{
	$vote='-1';
}
$z=0;
$sql = "SELECT roll_no,name,vote from vote";
$result = $conn->query($sql);
$t=0;
$array = array();
$arrayp= array();
$arrayn= array();
$bunk=0;$nobunk=0;
if($result){
while($row = $result->fetch_assoc()) {
         $array[$t] = $row["roll_no"];
         $arrayp[$t] = $row["vote"]  ;
         $arrayn[$t] = $row["name"];
         $t++;}
     }

while ($t--) {
	if ($array[$t]==$roll) {
		$z=1;
	}
	if ($arrayp[$t]=='1') {
		$bunk++;
	}
	else if($arrayp[$t]=='-')
	{
		$nobunk++;
	}
}
if ($choice=="Bunk") {
			    	$bunk++;
			    }
			    else if($choice=="No-Bunk"){
			    	$nobunk++;
			    }
if ($z) {
	echo "<div style='width: 100%;height: 60px;background-color: #5b0972;border-radius: 50px;'><center><h2 style='color: white;padding-top: 20px'>NO CHEATING --> You have Voted.</h2></center></div>";
			echo "<br/>";
			echo '<div><label style="background-color: black;color: white;font-family: cursive;font-weight: bold;margin-left: 300px;padding:15px">Bunk : '.$bunk. '</label>
<label style="background-color: black;color: white;font-family: cursive;padding:15px;font-weight: bold;margin-left: 300px;">No-Bunk : '.$nobunk.'</label></div>';
			
			echo "
<script type='text/javascript'>
	setTimeout(fun,4000);
	function fun(){
		location.href = 'index.html';
	}
</script>";

		return;
}

$conn->close();
$conn=opencon();

$sql = "INSERT INTO vote (roll_no, name,vote)
			VALUES ('$roll', '$user', '$vote')";

			if ($conn->query($sql) === TRUE) {
			    echo "<div style='width: 100%;height: 60px;background-color: #5b0972;border-radius: 50px;'><center><h2 style='color: white;padding-top: 20px'>Your vote is recorded --> Enjoy.</h2></center></div>";

			echo "<br/>";
			echo '<div><label style="background-color: black;color: white;font-family: cursive;font-weight: bold;margin-left: 300px;">Bunk : '.$bunk.'</label>
<label style="background-color: black;color: white;font-family: cursive;font-weight: bold;margin-left: 300px;">No-Bunk : '.$nobunk.'</label></div>';

			} else {
			    echo "<div style='width: 100%;height: 60px;background-color: #5b0972;border-radius: 50px;'><center><h2 style='color: white;padding-top: 20px'>Error --> Try Again.</h2></center></div>";
			}
echo "
<script type='text/javascript'>
	setTimeout(fun,4000);
	function fun(){
		location.href = 'index.html';
	}
</script>";



$conn->close();

?>