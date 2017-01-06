<?php

session_start();

if(!isset($_SESSION['alogin']))
{
	echo '<script type="text/javascript">alert("Session expired, please login again");window.location=\'/exam/index.php\';</script>';
}
include("header.php");
?>
<html>
	<head>
		<title>Adminstrative AreaOnline Quiz </title>
		<link href="../admin.css" rel="stylesheet" type="text/css">
	</head>

	

	<h1>Welcome Admin </h1>
	<center><table><tr><td>
	<a href="subadd.php"><button class="button" >Add Subject</button></a>
	<a href="testadd.php"><button class="button" >Add Test</button></a>
	<a href="questionadd.php"><button class="button" >Add Question</button></a>
	<a href="show_ques.php"><button class="button" >Delete Question</button></a>
	<a href="Change.php"><button class="button" >Change Site Name</button></a>
	</td></tr></table></center>
	
	</body>
</html>
