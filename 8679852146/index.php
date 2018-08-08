
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

	$varsql='SELECT lvl_3 FROM players WHERE ip_info="'.$myip.'"';
	$res=$pdo->query($varsql)->fetch();
	$lvl_3=$res['lvl_3'];
	$varsql='SELECT lvl_4 FROM players WHERE ip_info="'.$myip.'"';
	$res=$pdo->query($varsql)->fetch();
	$lvl_4=$res['lvl_4'];

	if($lvl_3=='' || $lvl_3=='0')
	{
		header('location:../index.php');
		exit ;
	}
	else
	if($lvl_4>0)
	{
		if(((int)$lvl_4-(int)$lvl_3)>0)
		{
			header('location:../'.$lvl_5_location);
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
		if(isset($_POST['username']) && isset($_POST['password']) && strlen($_POST['username'])>0 &&  strlen($_POST['password'])>0)
		{

			$varsql='SELECT id FROM players WHERE name="' . $_POST['username'] . '" AND lvl_1="' . $_POST['password'] . '"';
			//echo $varsql;
			//echo '<!--Passed_SQL= '.$varsql.'-->';
			$res=$pdo->query($varsql)->fetch();
			if($res['id'])
			{
				$varsql='UPDATE players SET lvl_4="'.time().'" WHERE ip_info="'.$_SERVER['REMOTE_ADDR'].'"';
					$pdo->exec($varsql);
					$varsql='UPDATE players SET score=score+"'.$lvl_4_score.'" WHERE ip_info="'.$myip.'"';
					$pdo->exec($varsql);
					header('location:../'.$lvl_4_location);
					exit();
			}
			else
			{
				echo '<a class="wrong">Wrong Username or Password</a>';
				include 'body_85254565.php';
				
			}
		}
		else
		{
			if(isset($_POST['username']) && isset($_POST['password']))
			{
				echo '<a class="wrong"> No Input Provided.. </a>';
			}
			include 'body_85254565.php';
		}
	}


?>

</body>
</html>
