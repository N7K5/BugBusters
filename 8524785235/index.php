<?php include '../common/ev_details_aka.php'; 
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
	$varsql='SELECT lvl_1 FROM players WHERE ip_info="'.$myip.'"';
	$res=$pdo->query($varsql)->fetch();
	$lvl_1=$res['lvl_1'];

	if($lvl_2!='0' && $lvl_2!='' && $lvl_1!='')
	{
		if(((int)$lvl_2-(int)$lvl_1)>0)
		{
			header('location:../'.$lvl_3_location);
		}
		else
		{
			header('location:../error.php');
		}
	}
	else
	{
		if($lvl_1=='')
		{
			header('location:../');
			exit ;
		}
		else if(isset($_POST['name']) && isset($_POST['pass']))
		{
			if($_POST['name']=='admin' && $_POST['pass']=='admin')
			{
				$varsql='UPDATE players SET lvl_2="'.time().'" WHERE ip_info="'.$myip.'"';
				$pdo->exec($varsql);
				$varsql='UPDATE players SET score=score+"'.$lvl_2_score.'" WHERE ip_info="'.$myip.'"';
				$pdo->exec($varsql);
				header('location:../'.$lvl_3_location);
				exit ;
			}
			else
			{
				echo '<script> alert("wrong password..."); </script>';
				include 'body_19731973.php';
			}
		}
		else
		{
			include 'body_19731973.php';
		}
	}

?>
</body>
</html>