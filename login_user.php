<?php
	session_start();

	include('connect.php');
	$result =
			 mysqli_query($check,"SELECT * FROM users where 
			 number='".htmlentities ($_GET['number'])."' AND pass='".htmlentities ($_GET['pass'])."' ");
	if(mysqli_num_rows($result)==1)
	{
		$user=mysqli_fetch_array($result);
		//$img =mysqli_query($check,"SELECT * FROM profiles where id='".$user['profile_img']."';");
		//$img=mysqli_fetch_array($img);	 
		
		$data[] =array(
		"log"=>true,
		"id"=>$user['id'],
		"f_name"=>$user['name'],
		"l_name"=>$user['full'],
		//"old"=>$user['old'],
		//"pass"=>$user['pass'],
		"mail"=>$user['mail'],
		"enable"=>$user['active'],
		"country"=>$user['country']);
		//"visits"=>$user['visits'],
		//"profile_img"=>$img['pic']);
		mysqli_query($check,"INSERT INTO `log.user` (`id`, `id_user`, `device`, `date`) VALUES (NULL, '".$user['id']."', 'android', CURRENT_TIMESTAMP);");

	}else
	{
		$data[] =array(
		"log"=>false,
		"id"=>"null",
		"f_name"=>"null",
		"l_name"=>"null",
		//"pass"=>"null",
		"mail"=>"null",
		"country"=>"null",
		"enable"=>"null");
		//"post"=>"null",
		//"visits"=>"null",
		
	}
	echo'{"login":'.json_encode($data,JSON_UNESCAPED_UNICODE).'}';
	exit;

?>