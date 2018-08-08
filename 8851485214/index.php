
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

	$varsql='SELECT lvl_5 FROM players WHERE ip_info="'.$myip.'"';
	$res=$pdo->query($varsql)->fetch();
	$lvl_5=$res['lvl_5'];
	$varsql='SELECT lvl_6 FROM players WHERE ip_info="'.$myip.'"';
	$res=$pdo->query($varsql)->fetch();
	$lvl_6=$res['lvl_6'];

	if($lvl_5=='' || $lvl_5=='0')
	{
		header('location:../index.php');
		//echo "here";
		exit ;
	}
	else
	if($lvl_6>0)
	{
		if(((int)$lvl_6-(int)$lvl_5)>0)
		{
			header('location:../'.$lvl_7_location);
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
		if(isset($_REQUEST['pin']) && strlen($_REQUEST['pin'])>1)
		{
			if($_REQUEST['pin']==1107)
			{
				$varsql='UPDATE players SET lvl_6="'.time().'" WHERE ip_info="'.$_SERVER['REMOTE_ADDR'].'"';
				$pdo->exec($varsql);
				$varsql='UPDATE players SET score=score+"'.$lvl_6_score.'" WHERE ip_info="'.$myip.'"';
				$pdo->exec($varsql);
				header('location:../'.$lvl_7_location);
				exit();
			}
			else
			{
				echo '<a class="wrong"> PIN DOESNOT MATCH </a>';
				include 'body_75325895148.php';
			}
		}
		else
		{
			include 'body_75325895148.php';
		}
	}

?>

</body>
</html>
