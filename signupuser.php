<html>
<head>
<title>User Signup</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="admin.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php
include("header.php");
extract($_POST);
include("database.php");
$rs=mysql_query("select * from mst_user where login='$lid'");
if (mysql_num_rows($rs)>0)
{
	echo '<script type="text/javascript">alert("This Login id is Already exist");window.location=\'./index.php\';</script>';
	exit;
}
$rs=mysql_query("select * from mst_user where username='$name'");
if (mysql_num_rows($rs)>0)
{
	echo '<script type="text/javascript">alert("This Username is Already exist");window.location=\'./index.php\';</script>';
	exit;
}


$query="insert into mst_user(user_id,login,pass,username,address,city,phone,email) values('$uid','$lid','$pass','$name','$address','$city','$phone','$email')";
if($rs=mysql_query($query))
{
	echo'<script type="text/javascript">alert("successfully Created");window.location=\'./index.php\';</script>';
	
}
else
{
echo'<script type="text/javascript">alert("Email id is already exist");window.location=\'./index.php\';</script>';
}

echo "<br><br><br><div class=head1>Your Login ID  $lid Created Sucessfully</div>";
echo "<br><div class=head1>Please Login using your Login ID to take Quiz</div>";
echo "<a href=index.php class=button><button name=login type=button>Login<button></a>";
?>
</body>
</html>

