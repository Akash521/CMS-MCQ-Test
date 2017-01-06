
<html>
	<head>
		<title>Wel come to Online Exam</title>
		<link rel="stylesheet" type="text/css" href="admin.css">
	</head>

	<body background="bg1.jpg">
		<?php


		session_start();
		session_unset();
		include("header.php");
		include("database.php");
		extract($_POST);

		if(isset($submit))
		{
				//echo "ADmin CHeck :".$admin;
				if($admin)
				{
				$rs=mysql_query("select * from mst_admin where loginid='$loginid' and pass='$pass'") or die(mysql_error());
				//echo mysql_fetch_array($rs)['loginid'];	
				if(mysql_num_rows($rs)<1)	
				{
					echo "<BR><BR><BR><BR><div class=head1> Invalid User Name or Password<div>";
					exit;
		
				}
				$_SESSION['alogin']="true";
				
				header("Location: /exam/admin/login.php");	
				
			}
				else{

				$rs=mysql_query("select * from mst_user where login='$loginid' and pass='$pass'");
			if(mysql_num_rows($rs)<1)
			{
				$found="N";
			}
			else
			{
				$_SESSION['login']=$loginid;
			}
		}
			if (isset($_SESSION[login]))
			{
			
			header("Location: /exam/index2.php");
				
 	exit;
			}
			}
		?>
			<center><table width="100%" border="0">
  				<tr>
    					<td width="70%" >&nbsp;</td>
    					<td  bgcolor="#90EE90"><div align="center" class="button"><h4>User Login </h4></div></td>
  				</tr>
  					<td height="100" align="top">
					<div align="center">
        				<td align="top"><form name="form1" method="post" ></center>
      			<table width="420" >
        			<tr>
          				<td><span class="button">Login ID </span></td>
          				<td><input name="loginid" type="text" id="loginid2"></td>
        			</tr>
        			<tr>
          				<td><span class="button">Password</span></td>
          				<td><input name="pass" type="password" id="pass2"></td>
        			</tr>
        			<tr>
          				<td colspan="2"><span class="errors">
            					<?php
		  					if(isset($found))
		  					{
		  						echo "Invalid Username or Password";
		  					}
		  				?>
          						</span>
					</td>
				</tr>
        			<tr>	
					<td colspan=8 align=center class="button">
						<input type="checkbox" name="admin" value="Bike">Login as Admin <br>						
						<button name="submit" type="submit" id="submit" valur="login" >Login</button>
					</td>
        			</tr>
        			<tr>
          				<td colspan="4"><div align="center"><span class="button">New User ? <a 						href="signup.php"><button name =" Click here for Signup" type= "button">Click here for Signup</button></a></span></div></td>
          			</tr>
      		</table>
      						</form>
					</td>
  				</tr>
		</table></center>

	</body>
</html>

