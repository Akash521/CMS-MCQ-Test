<?php
session_start();


if(!isset($_SESSION['alogin']))
{
	echo '<script type="text/javascript">alert("Session expired, please login again");window.location=\'/exam/home.php\';</script>';
}
require("../database.php");
include("header.php");
error_reporting(1);
?>
<link href="../admin.css" rel="stylesheet" type="text/css">
<?php

extract($_POST);

echo "<BR>";
if (!isset($_SESSION['alogin']))
{
	echo "<br><h2><div  class=head1>You are not Logged On Please Login to Access this Page</div></h2>";
	echo "<a href=index.php><h3 align=center>Click Here for Login</h3></a>";
	exit();
}
echo "<BR><h3 class=head1>Site Name </h3>";

//echo "<table width=100%>";
//echo "<tr><td align=center></table>";
if($submit=='submit' || strlen($subname)>0 )
{
$rs=mysql_query("select * from mst_site where site ='$subname'");
if (mysql_num_rows($rs)>0)
{
	echo "<br><br><br><div class=head1>Site Name is Already Exists</div>";
	echo '<script type="text/javascript">alert("SuccessFully Changed Your Site Name");window.location=\'/exam/admin/login.php\';</script>';
	exit;
}
mysql_query("update mst_site set site ='$subname'",$cn) or die(mysql_error());
echo "<p align=center>Subject  <b> \"$subname \"";
$submit="";
}
?>
<SCRIPT LANGUAGE="JavaScript">
function check() {
mt=document.form1.site.value;
if (mt.length<1) {
alert("Please Enter Site Name");
document.form1.subname.focus();
return false;
}
return true;
}
</script>

<title>Add Site Name</title>
<body bgcolor ="90EE90">
<form name="form1" method="post" onSubmit="return check();">
      <strong>Enter Site Name </strong>
        <input name="subname" placeholder="enter language name" type="text" id="site">
        
      <button class="button name="submit" value="Add" >Add</button>
    
  
</form>
</body>
