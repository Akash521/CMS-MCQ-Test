<style type="text/css">
</style>
<br/>
<br/>
<br/>



<br/>
<br/>
     <Table width="100%">
  <tr>
  
	
			<?php
				if(isset($_SESSION['alogin']))
				{
	 				echo "<div align=\"right\"><a href=\"login.php\"><h4>Admin Home</h4></a>
					     <a href=\"/exam/admin/signout.php\"><h4>Signout</h4></a>
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
