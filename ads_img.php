<?php
// return image if call this api
//for ads image 
// create by mosaab
header('Content-Type: application/json');
include('connect.php');
if(isset($_GET['id_ad']))
{
	$hand = "SELECT * FROM `images` WHERE id_ad ='".$_GET['id_ad']."';";
	if(isset($_GET['size']))
	{
		switch($_GET['size'])
		{
			case 1://small
			$size = "small";
			break;

			case 2://midum
			$size='medium';
			break;

			case 3://larg
			$size = "larg";
			break;


		}
	}else
	{
		$size='medium';
	}
	
}
else
{
		$data[] =array(
		"erorr"=>'not set id-image',
		"id"=>'null',
		//"s"=>$row['type'],
		//"id_user"=>$row['id_user'],
		"img_string"=>'null');
		echo'{"image":'.json_encode( $data,JSON_UNESCAPED_UNICODE).'}'; 
		exit();
}
$temp = mysqli_query($check,$hand);
if(isset($_GET['count']))//count of image 
if($_GET['count']==1)
{
	while($img=mysqli_fetch_array($temp))
	{
		$data[] =array(
		"erorr"=>'null',
		"id"=>$img['id'],
		//"s"=>$row['type'],
		//"id_user"=>$row['id_user'],
		"img_string"=>$img[$size]);
	}
}
else
{
	$img=mysqli_fetch_array($temp);
	$data[] =array(
	"erorr"=>'null',
	"id"=>$img['id'],
	//"s"=>$row['type'],
	//"id_user"=>$row['id_user'],
	"img_string"=>$img[$size]);
}

echo'{"image":'.json_encode( $data,JSON_UNESCAPED_UNICODE).'}'; 
exit;
?>

