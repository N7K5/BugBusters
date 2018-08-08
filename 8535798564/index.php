
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

	$varsql='SELECT lvl_2 FROM players WHERE ip_info="'.$myip.'"';
	$res=$pdo->query($varsql)->fetch();
	$lvl_2=$res['lvl_2'];
	$varsql='SELECT lvl_3 FROM players WHERE ip_info="'.$myip.'"';
	$res=$pdo->query($varsql)->fetch();
	$lvl_3=$res['lvl_3'];

	if($lvl_2=='' || $lvl_2=='0')
	{
		header('location:../index.php');
		exit ;
	}
	else
	if($lvl_3>0)
	{
		if(((int)$lvl_3-(int)$lvl_2)>0)
		{
			header('location:../'.$lvl_4_location);
			exit ;
		}
		else
		{
			header('location:../error.php');
			exit ;
		}
	}
	else
	{

		if(isset($_COOKIE['logged_in']))
		{
			if($_COOKIE['logged_in']=='true')
			{
				header('location:login_success_159753.php');
				exit ;
			}
		}
		else
			setcookie('logged_in','false');

			include 'body_19731973.php';
	}


?>

</body>
</html>
