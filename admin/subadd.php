<?php
session_start();
if(!isset($_SESSION['alogin']))
{
	echo '<script type="text/javascript">alert("Session expired, please login again");window.location=\'/exam/index.php\';</script>';
}
require("../database.php");
include("header.php");
error_reporting(1);
extract($_POST);

echo "<BR>";
if (!isset($_SESSION['alogin']))
{
	echo "<br><h2><div  class=head1>You are not Logged On Please Login to Access this Page</div></h2>";
	echo "<a href=index.php><h3 align=center>Click Here for Login</h3></a>";
	exit();
}
echo "<BR><h3 class=head1>Subject Add </h3>";

//echo "<table width=100%>";
//echo "<tr><td align=center></table>";
if($submit=='submit' || strlen($subname)>0 )
{
$rs=mysql_query("select * from mst_subject where sub_name='$subname'");
if (mysql_num_rows($rs)>0)
{
	echo '<script type="text/javascript">alert("Subject Name Already Exist, Plz Type again");window.location=\'/exam/admin/subadd.php\';</script>';
	exit;

}
mysql_query("insert into mst_subject(sub_name) values ('$subname')",$cn) or die(mysql_error());
echo "<p align=center>Subject  <b> \"$subname \"</b> Added Successfully.</p>";
echo '<script type="text/javascript">alert("Subject add SuccesFully.. Now Please Click On Test Add For Give Test Nme  ");window.location=\'/exam/admin/login.php\';</script>';
$submit="";
}
?>
<SCRIPT LANGUAGE="JavaScript">
function check() {
mt=document.form1.subname.value;
if (mt.length<1) {
alert("Please Enter Subject Name");
document.form1.subname.focus();
return false;
}
return true;
}
</script>

	<title>Add Subject</title>
	<link href="../admin.css" rel="stylesheet" type="text/css">
	<body bgcolor ="90EE90">
	<form name="form1" method="post" onSubmit="return check();">
	<strong>Enter Subject Name </strong>
        <input name="subname" placeholder="enter language name" type="text" id="subname">
        <button class="button" name="submit" value="Add" >Add</button>
	</form>
</body>
