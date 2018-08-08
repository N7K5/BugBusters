<?php
if(isset($_COOKIE['logged_in']) && $_COOKIE['logged_in']=='true')
	setcookie('logged_in','',time()-50000);
else
{
	header('location:../');
	exit ;
}
include '../common/ev_details_aka.php';

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

$varsql='UPDATE players SET lvl_3="'.time().'" WHERE ip_info="'.$_SERVER['REMOTE_ADDR'].'"';
$pdo->exec($varsql);
$varsql='UPDATE players SET score=score+"'.$lvl_3_score.'" WHERE ip_info="'.$_SERVER['REMOTE_ADDR'].'"';
$pdo->exec($varsql);
header('location:../'.$lvl_4_location);
exit();

?>