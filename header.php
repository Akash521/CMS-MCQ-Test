<?php
include("database.php");
$rs=mysql_query("select * from mst_site");
$row=mysql_fetch_array($rs);

	echo"<center><table><tr><td>";

echo "<button class='button2'><h1>".$row['site']."</h1></button>";

	echo "</td</tr></table></center>";


?>
<html>
<head>
		<title>Wel come to Online Exam</title>
		<link rel="stylesheet" type="text/css" href="admin.css">
	</head>
<br/>
<br/>
     <Table width="100%">
  <tr>
  
<?php @$_SESSION['login']; 
  error_reporting(1);
  ?>
    
  <td>
	<?php
	if(isset($_SESSION['login']))
	{
	 echo  "<div align=\"right\"><a href=\"index2.php\"><h4>Home</h4></a>
						<a href=\"/exam/Instructions.txt\"><h4>Instructions</h4></a>
					     <a href=\"/exam/signout.php\"><h4>Signout</h4></a>
					     </div>";
	 }
	 else
	 {
	 	echo "&nbsp;";
	 }
	?>
	</td>
	
  </tr>
  
</table>
</html>
