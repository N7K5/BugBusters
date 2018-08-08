
<?php

 include '../common/ev_details_aka.php';
$in_index=1;
?>


<!DOCTYPE html>
<html>
<head>
	<title>
		<?php echo $event_name; ?>
	</title>
	<link href="../script/common.css" type="text/css" rel="stylesheet" />
	<link href="index.css" type="text/css" rel="stylesheet" />
	<link rel="icon" href="../res/icon.png">
</head>

<body>

<?php

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

	$myip=$_SERVER['REMOTE_ADDR'];

	$varsql='SELECT lvl_4 FROM players WHERE ip_info="'.$myip.'"';
	$res=$pdo->query($varsql)->fetch();
	$lvl_4=$res['lvl_4'];
	$varsql='SELECT lvl_5 FROM players WHERE ip_info="'.$myip.'"';
	$res=$pdo->query($varsql)->fetch();
	$lvl_5=$res['lvl_5'];

	if($lvl_4=='' || $lvl_4=='0')
	{
		header('location:../index.php');
		//echo "here";
		exit ;
	}
	else
	if($lvl_5>0)
	{
		if(((int)$lvl_5-(int)$lvl_4)>0)
		{
			header('location:../'.$lvl_6_location);
			//echo "nope here";
			exit ;
		}
		else
		{
			header('location:../error.php');
			//echo "na na here";
			exit ;
		}
	}
	else
	{
		include 'submit_7852145.php';
		include 'body_753869421.php';
	}
?>

</body>
</html>
