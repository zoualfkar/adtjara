<?php
header('Content-Type: application/json');
//include('time.php');
include_once('connect.php');

	if(isset($_GET['id_store']))
	{
		$query="SELECT * FROM markets , img_market WHERE markets.id=img_market.id_market and markets.id='".$_GET['id_store']."'";

		$sql=mysqli_query($check,$query);
		$row=mysqli_fetch_array($sql);
		$data[] =array(
		"erorr"=>'',
		"s_id"=>$row['id'],
		"s_type"=>$row['type'],
		"owner"=>$row['id_user'],
		"s_name"=>$row['name'],
		"s_phone"=>$row['phone'],
		"s_mail"=>$row['mail'],
		"s_addres"=>$row['addres'],
		"s_link"=>$row['link'],
		"s_start_store"=>$row['start_market'],
		"s_end_work"=>$row['end_work'],
		"s_start_work"=>$row['start_work'],
		"s_state"=>$row['link'],
		"s_web"=>$row['web'],
		"s_img"=>$row['larg']);
	}
	else
	{
		$data[] =array(
			"erorr"=>'not set id_store',
			"s_id"=>'null',
			"s_type"=>'null',
			"owner"=>'null',
			"s_name"=>'null',
			"s_phone"=>'null',
			"s_mail"=>'null',
			"s_addres"=>'null',
			"s_link"=>'null',
			"s_start_store"=>'null',
			"s_end_work"=>'null',
			"s_start_work"=>'null',
			"s_state"=>'null',
			"s_web"=>'null',
			"s_img"=>'null');
	}
		
echo'{"store":'.json_encode($data,JSON_UNESCAPED_UNICODE).'}';
//echo json_encode(array('image' => $encoded));

?>