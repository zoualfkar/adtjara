<?php
header('Content-Type: application/json');
include_once('connect.php');

    if(isset($_GET['count']))
    {
		$query="SELECT * FROM markets , img_market WHERE markets.id=img_market.id_market  limit ".$_GET['count'].";";

		$sql=mysqli_query($check,$query);
        while($row=mysqli_fetch_array($sql))
        {
            $data[] =array(
            "erorr"=>'null',
            "s_id"=>$row['id'],
            "s_id_user"=>$row['id_user'],
            "s_type"=>$row['type'],
            "s_name"=>$row['name'],
            "s_img"=>$row['medium']);
        }
    }
    else
    {
        $data[] =array(
        "erorr"=>'not set count paramter',
        "s_id"=>'null',
        "s_id_user"=>'null',
		"s_type"=>'null',
		"s_name"=>'null',
        "s_img"=>'null');
    }

echo'{"stores":'.json_encode($data,JSON_UNESCAPED_UNICODE).'}';
exit;
?>