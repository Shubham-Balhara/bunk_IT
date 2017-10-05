<?php
$name=$_POST['user'];
$pass=$_POST['pass'];
if ($name=="hostofit"&&$pass=="crazy0122") {
	echo "<script type='text/javascript'>location.href = 'adhome.html';</script>";
}
else{
	echo "Fake Login";
	echo "<br/>";
	echo "<script type='text/javascript'>location.href = 'index.html';</script>";
}
?>