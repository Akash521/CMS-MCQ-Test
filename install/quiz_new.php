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


if ($db_error==false){
	$query ="CREATE TABLE IF NOT EXISTS `mst_admin` (
  		`id` int(11) NOT NULL AUTO_INCREMENT,
  		`loginid` varchar(50) NOT NULL,
  		`pass` varchar(50) NOT NULL,
  		PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ";
		mysql_query($query);



		$query="INSERT INTO `mst_admin` (`id`, `loginid`, `pass`) VALUES
		(1, 'Akash', 'Akash')";
		mysql_query($query);


		


// Table structure for table `mst_question`


	$query="CREATE TABLE IF NOT EXISTS `mst_question` (
  		`que_id` int(5) NOT NULL AUTO_INCREMENT,
  		`test_id` int(5) DEFAULT NULL,
  		`que_desc` varchar(150) DEFAULT NULL,
  		`ans1` varchar(75) DEFAULT NULL,
  		`ans2` varchar(75) DEFAULT NULL,
  		`ans3` varchar(75) DEFAULT NULL,
  		`ans4` varchar(75) DEFAULT NULL,
  		`true_ans` int(1) DEFAULT NULL,
  		PRIMARY KEY (`que_id`)
		) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ";
		mysql_query($query);


// Table structure for table `mst_result`


	$query="CREATE TABLE IF NOT EXISTS `mst_result` (
  		`login` varchar(20) DEFAULT NULL,
  		`test_id` int(5) DEFAULT NULL,
  		`test_date` date DEFAULT NULL,
  		`score` int(3) DEFAULT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=latin1";
		mysql_query($query);



// Table structure for table `mst_subject`


	$query="CREATE TABLE IF NOT EXISTS `mst_subject` (
	 	`sub_id` int(5) NOT NULL AUTO_INCREMENT,
  		`sub_name` varchar(25) DEFAULT NULL,
  		PRIMARY KEY (`sub_id`)
		) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ";
		mysql_query($query);



$query="CREATE TABLE IF NOT EXISTS `mst_site` (
	 	`id` int(5) NOT NULL AUTO_INCREMENT,
  		`site` varchar(50) DEFAULT NULL,
  		PRIMARY KEY (`id`)
		) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ";
		mysql_query($query);


		$query="INSERT INTO `mst_site` (`id`, `site`) VALUES ('1', 'Examination System')";
		mysql_query($query);




// Table structure for table `mst_test`


	$query="CREATE TABLE IF NOT EXISTS `mst_test` (
  		`test_id` int(5) NOT NULL AUTO_INCREMENT,
  		`sub_id` int(5) DEFAULT NULL,
  		`test_name` varchar(30) DEFAULT NULL,
  		`total_que` varchar(15) DEFAULT NULL,
  		PRIMARY KEY (`test_id`)
		) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ";
		mysql_query($query);


// Table structure for table `mst_user`

	$query="CREATE TABLE IF NOT EXISTS `mst_user` (
  		`user_id` int(5) NOT NULL AUTO_INCREMENT,
  		`login` varchar(20) DEFAULT NULL unique,
  		`pass` varchar(20) DEFAULT NULL,
  		`username` varchar(30) DEFAULT NULL Unique,
  		`address` varchar(50) DEFAULT NULL,
  		`city` varchar(15) DEFAULT NULL,
  		`phone` int(10) DEFAULT NULL,
  		`email` varchar(30) DEFAULT NULL unique,
  		PRIMARY KEY (`user_id`)
		) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15";
		mysql_query($query);

// Table structure for table `mst_useranswer`


	$query="CREATE TABLE IF NOT EXISTS `mst_useranswer` (
  		`sess_id` varchar(80) DEFAULT NULL,
  		`test_id` int(11) DEFAULT NULL,
  		`que_des` varchar(200) DEFAULT NULL,
  		`ans1` varchar(50) DEFAULT NULL,
  		`ans2` varchar(50) DEFAULT NULL,
  		`ans3` varchar(50) DEFAULT NULL,
  		`ans4` varchar(50) DEFAULT NULL,
  		`true_ans` int(11) DEFAULT NULL,
  		`your_ans` int(11) DEFAULT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=latin1";
		mysql_query($query);


@header("Location: /exam/install/administration.php");
}
else{
	@header("Location: ../connection.php");
}
?>
