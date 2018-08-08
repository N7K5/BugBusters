<?php include '../common/ev_details_aka.php';
/*if(!isset($in_index))
{
	header('location:../index.php') ;
	exit ;
}*/
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>
		<?php echo $event_name; ?>
	</title>
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

	$varsql='SELECT lvl_1 FROM players WHERE ip_info="'.$myip.'"';
	$res=$pdo->query($varsql)->fetch();
	$lvl_1=$res['lvl_1'];

	if($lvl_1=='0' || $lvl_1=='')
	{
		$varsql='UPDATE players SET lvl_1="'.time().'" WHERE ip_info="'.$myip.'"';
		$pdo->exec($varsql);
		$varsql='UPDATE players SET score=score+"'.$lvl_1_score.'" WHERE ip_info="'.$myip.'"';
		$pdo->exec($varsql);

		
		header('location:index.php');
	}
	else
	{
		header('location:index.php');
	}
?>

</body>
</html>