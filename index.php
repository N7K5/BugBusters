<?php include 'common/ev_details_aka.php';
$in_index=1 ; ?>


<!DOCTYPE html>
<html>
<head>
	<title>
		<?php echo $event_name; ?>
	</title>
	<link href="script/common.css" type="text/css" rel="stylesheet" />
	<link href="script/index.css" type="text/css" rel="stylesheet" />
	<link rel="icon" href="res/icon.png">
</head>


<body>

<?php

	include 'common/ev_details_aka.php';
	
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
	if(isset($_POST['name']) && strlen($_POST['name'])>2)
	{
		if($_POST['name']!=htmlspecialchars($_POST['name']) || $_POST['id']!=htmlspecialchars($_POST['id']))
		{
			exit ;
		}

		$varsql='SELECT start_time FROM players where ip_info="'.$myip.'"';
		$res=$pdo->query($varsql)->fetch();
		if($res['start_time']==0 || $res['start_time']=='')
		{
			$varsql='SELECT * FROM players WHERE uid="'.$_POST['id'].'"';
			$res_x=$pdo->query($varsql);
			if($res_x->fetch())
			{
				$varsql='UPDATE players SET ip_info="'.$myip.'" WHERE uid="'.$_POST['id'].'"';
				$pdo->exec($varsql);
				header('Location:index.php');
				exit ;
			}

			$varsql='SELECT * FROM ip_data WHERE uid="'.$_POST['id'].'"';
			$res_x=$pdo->query($varsql);

			if($re_=$res_x->fetch())
			{

				/*$varsql='SELECT id FROM ip_data WHERE uid="'.$_POST['id'].'"';
			$res_x=$pdo->query($varsql);

			$varsql3='SELECT i_score FROM ip_data WHERE uid="'.$_POST['id'].'"';
			$res_3=$pdo->exec($varsql3)->fetch();
			$cur_score=$res_3['i_score'];*/



				$varsql='INSERT INTO players SET 
				name="'.$_POST['name'].'",
				uid="'.$_POST['id'].'", 
				ip_info="'.$myip.'", 
				start_time="'.time().'",
				score="'.$re_['i_score'].'"';
				$pdo->exec($varsql);
			}
			else
			{
				header('Location:index.php');
				exit ;
			}
		}
		else
			echo '<span class="msg"> You Have Already Started Your Season... </span>';
			header('Location:'.$lvl_1_location);
	}
	else
	{
		$varsql='SELECT start_time FROM players where ip_info="'.$myip.'"';
		$res=$pdo->query($varsql)->fetch();
		if($res['start_time']==0 || $res['start_time']=='')
		{
			include 'welcome.php';
		}
		else
		{
			header('Location:'.$lvl_1_location);
		}
	}


?>


</body>
</html>