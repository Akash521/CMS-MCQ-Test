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
if (!isset($_SESSION[alogin]))
{
	echo "<br><h2><div  class=head1>You are not Logged On Please Login to Access this Page</div></h2>";
	echo "<a href=index.php><h3 align=center>Click Here for Login</h3></a>";
	exit();
}
	echo "<BR><h1>Add Question </h1>";
if($_POST[submit]=='Save' || strlen($_POST['testid'])>0 )
{
	extract($_POST);
 
	$mn=mysql_query("select count(que_desc)from mst_question where test_id =" .$testid,$cn) or die(mysql_error());

	$row=mysql_fetch_array($mn);

	$nm=mysql_query("select total_que from mst_test where test_id=".$testid,$cn) or die(mysql_error());
	$rw=mysql_fetch_array($nm);
	
	echo $row['count(que_desc)'];
	
	echo $rw['total_que'];

if($row['count(que_desc)']<$rw['total_que'])
{
	mysql_query("insert into mst_question(test_id,que_desc,ans1,ans2,ans3,ans4,true_ans) values ('$testid','$addque','$ans1','$ans2','$ans3','$ans4','$anstrue')",$cn) or die(mysql_error());
	
	unset($_POST);
}
	else
{
echo '<script type="text/javascript">alert("Maximum Question Reached");window.location=\'/exam/admin/login.php\';</script>';
echo "<p align=center>.</p>";

}
}
?>
<SCRIPT LANGUAGE="JavaScript">
function check() {
mt=document.form1.addque.value;
if (mt.length<1) {
alert("Please Enter Question");
document.form1.addque.focus();
return false;
}
a1=document.form1.ans1.value;
if(a1.length<1) {
alert("Please Enter Answer1");
document.form1.ans1.focus();
return false;
}
a2=document.form1.ans2.value;
if(a1.length<1) {
alert("Please Enter Answer2");
document.form1.ans2.focus();
return false;
}
a3=document.form1.ans3.value;
if(a3.length<1) {
alert("Please Enter Answer3");
document.form1.ans3.focus();
return false;
}
a4=document.form1.ans4.value;
if(a4.length<1) {
alert("Please Enter Answer4");
document.form1.ans4.focus();
return false;
}
at=document.form1.anstrue.value;
if(at.length<1) {
alert("Please Enter True Answer");
document.form1.anstrue.focus();
return false;
}
return true;
}
</script>
<body bgcolor="90EE90">
<link href="../admin.css" rel="stylesheet" type="text/css">
<form name="form1" method="post" onSubmit="return check();">
      <strong>Select Test Name </strong>
        
      <select name="testid" id="testid">
<?php
$rs=mysql_query("Select * from mst_test order by test_name",$cn);
	  while($row=mysql_fetch_array($rs))
{
if($row[0]==$testid)
{
echo "<option value='$row[0]' selected>$row[2]</option>";
}
else
{
echo "<option value='$row[0]'>$row[2]</option>";
}
}
?>
      </select>
        
        <strong>Question..? </strong>
        
	    <textarea name="addque" cols="60" rows="2" id="addque"></textarea>
    
 <strong>Enter Answer1 </strong>
      
      <input name="ans1" type="text" id="ans1" size="85" maxlength="85">
    
    
      <strong>Enter Answer2 </strong>
      
      <input name="ans2" type="text" id="ans2" size="85" maxlength="85">
    
      <strong>Enter Answer3 </strong>
      <input name="ans3" type="text" id="ans3" size="85" maxlength="85">
    
	<strong>Enter Answer4</strong>
      <input name="ans4" type="text" id="ans4" size="85" maxlength="85">
    	  
	<strong>Enter True Answer In Row Number </strong>
      <input name="anstrue" type="text" id="anstrue" size="50" maxlength="50">
    
      <button class="button" name="submit">Add</button>
    
  
</form>
</body>
