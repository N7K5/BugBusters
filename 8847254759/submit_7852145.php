<?php
	if(!isset($in_index) || $in_index!=1)
	{
		header('location:../');
		exit ;
	}
	if(isset($_POST['name']) && isset($_POST['password']) && strlen($_POST['name'])>0)
	{
		$varsql='SELECT * FROM players WHERE name="'.$_POST['name'].'"';
		$res=$pdo->query($varsql)->fetch();
		if($res['id']==$_POST['password'])
		{
			$varsql='UPDATE players SET lvl_5="'.time().'" WHERE ip_info="'.$_SERVER['REMOTE_ADDR'].'"';
			$pdo->exec($varsql);
			$varsql='UPDATE players SET score=score+"'.$lvl_5_score.'" WHERE ip_info="'.$myip.'"';
				$pdo->exec($varsql);
			header('location:../'.$lvl_6_location);
			exit();
		}
		else
		{
			echo '<a id="dnm"> Username or Password doesnot Match...';
		}
	}

?>