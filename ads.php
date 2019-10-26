<?php
header('Content-Type: application/json');
include('time.php');
include_once('connect.php');
	if(isset($_GET['qt']))
		$query="SELECT * FROM ad where  ad.show='0' and type LIKE '%".$_GET['qt']."%' or textad LIKE '%".$_GET['qt']."%'; ";
	elseif(isset($_GET['id_ad']))// saved ad
		$query="SELECT * FROM ad where  ad.show='0' and id = ".$_GET['id_ad']." order by id DESC limit 16;";
	elseif(isset($_GET['id_us']))//ad users
		$query="SELECT * FROM ad where  ad.show='0' and user = '".$_GET['id_user']."' order by id DESC limit 16;";
	elseif(isset($_GET['load']))//more random ads
		$query="SELECT * FROM ad where  ad.show='0' and  id < ".$_GET['load']." and country='aDmin' order by id DESC limit 16;";
	else// random ads when start site
		$query="SELECT * FROM ad where  ad.show='0' and id > 0 order by id DESC limit 16;";

$sql=mysqli_query($check,$query);
while($row=mysqli_fetch_array($sql))
{
		
	$retArr = getElapsedTime(strtotime($row['date']));

	$data[] =array(
	"id"=>$row['id'],
	"type"=>$row['type'],
	"user"=>$row['user'],
	"textad"=>$row['textad'],
	"date"=>$retArr[1],
	"country"=>$row['country'],
	"date_word"=>$arr[$retArr[0]],
	"visits"=>$row['visits'],);

}
//echo json_encode($data);
echo'{"ads":'.json_encode($data,JSON_UNESCAPED_UNICODE).'}';
//echo json_encode(array('image' => $encoded));

?>