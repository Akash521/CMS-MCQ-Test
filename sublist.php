<?php
session_start();


if(!isset($_SESSION['login']))
{
	echo '<script type="text/javascript">alert("Session expired, please login again");window.location=\'./index.php\';</script>';
}


?>
<html>
	<head>
		<title>Online Quiz - Quiz List</title>
		<link rel="stylesheet" type="text/css" href="admin.css">
	</head>
	<body>
		<?php
			include("header.php");
			include("database.php");
			echo "<center><h2 class=button> Select Subject to Give Quiz </h2></center>";
			echo"<br/><br/><br/><br/>";
			$rs=mysql_query("select * from mst_subject");
			echo "<table align=left>";
			while($row=mysql_fetch_row($rs))
			{
				echo "<h4><a href=showtest.php?subid=$row[0]><button name ='exam' type='button'><font size=3>$row[1]</font></button></a></h4>";
			}
				echo "</table>";
		?>
	</body>
</html>
