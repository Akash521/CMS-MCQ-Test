
<?php
	//checking connection and connecting to a database
	require_once('config.php');
	$db_error=false;
	//Connect to mysql server
	$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if(!$link) {
		$db_error=true;
		$error_msg="Failed to connect to server: " . mysql_error();
	}
	
	//Select database
	$db = mysql_select_db(DB_DATABASE);
	if(!$db) {
		$db_error=true;
		$error_msg="Unable to select database: " . mysql_error();
		}
?>
<?php
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
?>

<?php
	if(isset($_POST['Submit']) AND $db_error==false){
		//fetch admin details from the form and sanitize the POST values
		$adminName = clean($_POST['adminName']);
		$adminPass = clean($_POST['adminPass']);

		//Create INSERT query
		$qry = "INSERT INTO mst_admin(loginid,Pass) VALUES('$adminName','$adminPass')";
		$result = @mysql_query($qry);
		
		//Check whether he query was successful or not and only print if it failed
		if($result) {
			$okay_msg= "<p>Admin account created successfully.</p>";
			echo '<script type="text/javascript">alert("Admin account created successfully");window.location=\'/exam/index.php\';</script>';
			//header("location: /exam/index.php");
			exit();
		}else {
			$error_msg="<p>Creating the admin account failed! Something went wrong somewhere. 
			Here is the MySQL error: </p>" . mysql_error();
		}
	}
?>

 <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sign Up Form</title>
        <link rel="stylesheet" type="text/css" href="admin.css">
    </head>
    <body background = "bg1.jpg">

	<form id="adminForm" name="adminForm" method="post" action="administration.php" onsubmit="return adminValidate(this)">
	<?php if(!empty($error_msg) AND $db_error==true) 
				echo "<span style='color:red;'>$error_msg</span>"; 
				else if(!empty($error_msg)) 
				echo "<span style='color:red;'>$error_msg</span>";?>
      
        <h1>Sign Up</h1>
        
        <fieldset>
          <legend><span class="number">2</span>Database Connection</legend>
          <label for="name">Admin Username</label>
         <input name="adminName" type="text" class="textfield" id="adminName" maxlength="25" placeholder="enter admin username" required/>
          
          <label for="mail">Admin Password</label>
          <input name="adminPass" type="password" class="textfield" id="adminPass" maxlength="25" placeholder="enter admin password" required/>
          
          </fieldset>
        
        
        </fieldset>
        <button type="submit" name="Submit" >Finish</button>
	
      </form>
      
	<style type="text/css">
      	
      </style>
      
    </body>
</html>
