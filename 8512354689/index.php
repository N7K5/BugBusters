<?php include '../common/ev_details_aka.php';
$in_index=1; ?>


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
	$varsql='SELECT lvl_1 FROM players where ip_info="'.$myip.'"';
	$res=$pdo->query($varsql)->fetch();
	$lvl_1=$res['lvl_1'];
	$varsql='SELECT start_time FROM players where ip_info="'.$myip.'"';
	$res=$pdo->query($varsql)->fetch();

	if(($lvl_1=='' || $lvl_1=='0') && (int)$res['start_time']>0)
	{
		include 'body_19731973.php';
	}
	else
	{
		if($res['start_time']=='' || $res['start_time']=='0')
		{
			header('location:../');
			exit();
		}
		else if(((int)$res['start_time']-(int)$lvl_1)<0)
		{
			header('location:../'.$lvl_2_location);
			exit();
		}
		else
		{
			header('location:../error.php');
		}
	}

?>

</body>
</html>