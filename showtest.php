<?php
session_start();


if(!isset($_SESSION['login']))
{
	echo '<script type="text/javascript">alert("Session expired, please login again");window.location=\'./index.php\';</script>';
}

?>
<html>
	<head>
		<title>Online Quiz - Test List</title>
		<link href="admin.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<?php
			include("header.php");
			include("database.php");
			extract($_GET);
			$rs1=mysql_query("select * from mst_subject where sub_id=$subid");
			$row1=mysql_fetch_array($rs1);
			echo "<button name='exam' type='button'><h1 align=center class=button><font > $row1[1]</font></h1></button>";
			$rs=mysql_query("select * from mst_test where sub_id=$subid");
			if(mysql_num_rows($rs)<1)
			{
				echo "<br><br><h2 class=head1> No Quiz for this Subject </h2>";
				exit;
			}
			echo "<h2 class=head1> Select Quiz Name to Give Quiz </h2>";
			echo "<table align=left>";

			while($row=mysql_fetch_row($rs))
			{
				echo "<h4><a href=quiz.php?testid=$row[0]&subid=$subid><button name ='exam' type='button'><font size=4>$row[2]</font></button</a></h4>";
			}
			echo "</table>";
		?>
	</body>
</html>
