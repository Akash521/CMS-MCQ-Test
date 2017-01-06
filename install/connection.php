<?php
include("config.php");
	if(isset($_POST['Submit'])){
		$db_error=false;
		// try to connect to the DB, if not display error
		if(!@mysql_connect ($_POST['dbHost'],$_POST['dbUser'],$_POST['dbPass'])){
			$db_error=true;
			$error_msg="Sorry, these details are not correct:".mysql_error();
		}
		 
		if(!$db_error and !@mysql_select_db($_POST['dbName'])){
			$db_error=true;
			$error_msg="But something is wrong with the given database :".mysql_error();
		}
	}
?>
<?php
	if(isset($_POST['Submit']) AND $db_error==false){
		//create a connection handler if connection was successful
		$connect_code="<?php
		define('DB_HOST', '$_POST[dbHost]');
		define('DB_USER', '$_POST[dbUser]');
		define('DB_PASSWORD', '$_POST[dbPass]');
		define('DB_DATABASE', '$_POST[dbName]');
		?>";
	}
?>
<?php
	if(isset($_POST['Submit']) AND !empty($connect_code) AND $db_error==false){
		//if connection was established successfully, import tables into the database
		$mysqlDatabaseName =$_POST['dbName'];
		$mysqlUserName =$_POST['dbUser'];
		$mysqlPassword =$_POST['dbPass'];
		$mysqlHostName =$_POST['dbHost'];
	
		
		switch($worked){
			case 0:
				$okay_msg="<p>Import file <b>$mysqlImportFilename</b> successfully imported to database <b>$mysqlDatabaseName</b>.</p>";
				@header("Location: quiz_new.php");
				break;
			case 1:
				$error_msg="<p>There was an error when the installer attempted to populate the database. 
				Please repeat this step carefully with appropriate connection details.</p>";
				break;
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

	<form id="conForm" name="conForm" method="post" action="connection.php">
	<?php if(!empty($error_msg) AND $db_error==true) 
				echo "<span style='color:red;'>$error_msg</span>"; 
				else if(!empty($error_msg)) 
				echo "<span style='color:red;'>$error_msg</span>";?>
      
        <h1>Examination System</h1>
        
        <fieldset>
          <legend><span class="number">1</span>Database Connection</legend>
          <label for="name">Database Name</label>
          <input name="dbName" type="text" class="textfield" id="dbName" placeholder="enter database name" required/>
          
          <label for="mail">Database Host</label>
          <input name="dbHost" type="text" class="textfield" id="dbHost"  placeholder="enter database host name" required/>
          
          <label for="password">Database User</label>
          <input name="dbUser" type="text" class="textfield" id="dbUser" placeholder="enter database user name" required/>
          
	  <label for="password">Database Password</label>
          </font><input name="dbPass" type="password" class="textfield" id="dbPass" placeholder="enter database password"/>
          
          </fieldset>
        
        
        </fieldset>
        <button type="submit" name="Submit">Next</button>
      </form>
 </html>     
