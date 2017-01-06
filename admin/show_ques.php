<html>
	<head>
		<title>Adminstrative AreaOnline Quiz </title>
		<link href="../admin.css" rel="stylesheet" type="text/css">
	</head>

	<body bgcolor="#90EE90">
</body>
</html>
<?php
 

session_start();

if(!isset($_SESSION['alogin']))
{
	echo '<script type="text/javascript">alert("Session expired, please login again");window.location=\'/exam/index.php\';</script>';
}
include("database.php");
include("header.php");

echo"<h1 align='center'>View All Questions</h1> ";
echo "<br/> <br/>";
$run_post=mysql_query("select * from mst_question ",$cn);


echo "<table border='2' width='500' cellspacing='2' cellpadding='2' align='center' >
                <thead>
					<col width='170'>
					<col width='170'>
                    <tr>
                        <th >Question... </th>
						
						<th>DELETE</th>
                    </tr>
                </thead> <tbody>";
	while($row_post=mysql_fetch_array($run_post))
{	$que_id=$row_post['que_id'];
	
	$menu_title=$row_post['que_desc'];
	


	echo "	 <tr>
                        <td>$menu_title</td>
						<td><a href='delete_ques.php?que_id=$que_id'>DELETE</a>
                    </tr>

";
}
 echo"               				
                   
                </body>
            </table>		"



?>
