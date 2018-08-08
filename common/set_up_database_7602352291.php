<?php

include 'ev_details_aka.php';

	try
	{
		//total 3 places to change...
		$pdo = new PDO('mysql:host=localhost;dbname='.$db_name,$db_username,$db_password);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$pdo->exec('SET NAMES "utf8"');
	}
	catch(Excepton $e)
	{
		//include 'error.php';
		echo 'Unable to connect the database...';
		exit();
	}

$varsql='CREATE TABLE players
( id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	name TEXT,
	uid TEXT,
	ip_info TEXT,
	start_time TEXT,
	lvl_1 TEXT,
	lvl_2 TEXT,
	lvl_3 TEXT,
	lvl_4 TEXT,
	lvl_5 TEXT,
	lvl_6 TEXT,
	lvl_7 TEXT,
	extra TEXT,
	score INT NOT NULL,
	total_skips INT NOT NULL
)DEFAULT CHARACTER SET utf8 ENGINE=InnoDB';

$varsql2='CREATE TABLE ip_data
( id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	uid TEXT,
	i_score INT
) DEFAULT CHARACTER SET utf8 ENGINE=InnoDB';

$varsql3='CREATE TABLE cmnts
( id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
 name TEXT,
 cmnt TEXT,
	expires INT) DEFAULT CHARACTER SET utf8 ENGINE=InnoDB';

try
{
	$pdo->exec($varsql);
	$pdo->exec($varsql2);
	$pdo->exec($varsql3);
	echo "Done Creating Tables...";
}
catch(Exception $e)
{
	Echo 'Error in 7602352291';
}



?>