<?php
session_start();


if(!isset($_SESSION['login']))
{
	echo '<script type="text/javascript">alert("Session expired, please login again");window.location=\'./index.php\';</script>';
}

?>
<html>
	<head>
		<title>Online Quiz  - Result </title>
		<link href="admin.css" rel="stylesheet" type="text/css">
	</head>

	<body bgcolor="90EE90">
		<?php
			include("header.php");
			include("database.php");
			extract($_SESSION);
			$rs=mysql_query("select t.test_name,t.total_que,r.test_date,r.score from mst_test t, mst_result r where
			t.test_id=r.test_id and r.login='$login'",$cn) or die(mysql_error());
			echo "<h1 class=head1> Result </h1>";
			if(mysql_num_rows($rs)<1)
			{
				echo "<br><br><h1 class=head1> You have not given any quiz</h1>";
				exit;
			}
			echo "<table border=5 align=center><tr class=style2><td width=300>Test Name <td> Total<br> Question <td> Score";
			while($row=mysql_fetch_row($rs))
			{
			echo "<tr class=style8><td>$row[0] <td align=> $row[1] <td align=> $row[3]";
			}
			echo "</table>";
		?>
	</body>
</html>
