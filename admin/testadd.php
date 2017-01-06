<?php
session_start();
if(!isset($_SESSION['alogin']))
{
	echo '<script type="text/javascript">alert("Session expired, please login again");window.location=\'/exam/index.php\';</script>';
}
error_reporting(1);
if (!isset($_SESSION['alogin']))
{
	echo "<br><h2>You are not Logged On Please Login to Access this Page</h2>";
	echo "<a href=index.php><h3 align=center>Click Here for Login</h3></a>";
	exit();
}
require("../database.php");
include("header.php");


echo "<br><h1>Add Test</h1>";
if($_POST[submit]=='Save' || strlen($_POST['subid'])>0 || strlen($testname)>0 )
{
extract($_POST);
mysql_query("insert into mst_test(sub_id,test_name,total_que) values ('$subid','$testname','$totque')",$cn) or die(mysql_error());
echo "<p align=center>Test <b>\"$testname\"";

echo '<script type="text/javascript">alert("Test Added Succsesfully, Plz Click On Add Question");window.location=\'/exam/admin/login.php\';</script>';

unset($_POST);
}
?>
<SCRIPT LANGUAGE="JavaScript">
function check() {
mt=document.form1.testname.value;
if (mt.length<1) {
alert("Please Enter Test Name");
document.form1.testname.focus();
return false;
}
tt=document.form1.totque.value;
if(tt.length<1) {
alert("Please Enter Total Question");
document.form1.totque.value;
return false;
}
return true;
}
</script>
	<body bgcolor="90EE90">
	<link href="../admin.css" rel="stylesheet" type="text/css">
	<form name="form1" method="post" onSubmit="return check();">
    
     	<strong>Select Subject ID </strong>
      	<select name="subid">
<?php
	$rs=mysql_query("Select * from mst_subject order by  sub_name",$cn);
while($row=mysql_fetch_array($rs))
{
	if($row[0]==$subid)
	{
	echo "<option value='$row[0]' selected>$row[1]</option>";
	}
	else
	{
	echo "<option value='$row[0]'>$row[1]</option>";
	}
}
?>
     	 </select>
        
    
	<strong> Enter Test Name </strong>
        <input name="testname" type="text" id="testname">
     
	<strong>Enter Total Question </strong>
      
      <input name="totque" type="text" id="totque">
    
	  
      <button class="button" name="submit" value="Add" >Add</button>
    
  
</form>
</body>
