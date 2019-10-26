<?php
session_start();
include("../cache/notifaction.php");
include_once('connect.php');
$query_check="SELECT * FROM users where mail='".htmlentities ($_POST['mail'])."'";
$result = mysqli_query($check,$query_check);
if(mysqli_num_rows($result)==1)
{
	include_once('close.php');
	$data[] =array(
		"erorr"=>'البريد الإلكتروني مستخدم من قبل',
		"state"=>false,);
 }
}
else
{
	if(empty($_SESSION['country']))
	 $difult="افتراضي";
	 else
	 $difult=$_SESSION['country'];
	 $query="";
	 
	$temp = $check->query($query);
	 if (!$temp)
	 {
		$data[] =array(
			"erorr"=>'أعد المحاولة لاحقا المخدم لايستجيب',
			"state"=>false);
	}
	else
	 {
		$data[] =array(
			"erorr"=>null,
			"state"=>true);
	 }
	
}
echo'{"state_task":'.json_encode($data,JSON_UNESCAPED_UNICODE).'}';
exit();
?>