<html>
	<head>
		<title>Wel come to Online Exam</title>
		<link rel="stylesheet" type="text/css" href="admin.css">
	</head>
	<body >
<br/>
	
<?php
session_start();


if(!isset($_SESSION['login']))
{
	echo '<script type="text/javascript">alert("Session expired, please login again");window.location=\'./index.php\';</script>';
}
 
include("header.php");
echo "<h1 class='style8' align=center>Wel come to Online Exam</h1>";

				
				echo '
					<br/>
					<br/>
					<br/>
					
  				
    					<table><tr><tr>
    					<a href="sublist.php" class="button"><button name="Subject" type="button">Subject for Quiz</button> </a>
  				
  				
    					
    					<align="bottom"> <a href="result.php" class="button"><button name="Subject" type="button">Result</button> </a>
  					</td></tr></table>
				     </table>';
			?>
	</body>
</html>

