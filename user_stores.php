	<?php
		include_once('connect.php');
		$query="SELECT markets.id,img_market.small,markets.name FROM markets,users , img_market WHERE markets.id=img_market.id_market and markets.id_user=users.id and users.id=".$_GET['id_user'].";";
		$sql=mysqli_query($check,$query);
		if(mysqli_num_rows($sql)>=1)
		{
			while($row=mysqli_fetch_array($sql))
			{
				$store[] =array(
				"s_id"=>$row['id'],
				//"s"=>$row['type'],
				//"id_user"=>$row['id_user'],
				"s_name"=>$row['name'],
				"s_icon"=>$row['small']);
	
			}
		}else//return null store
		{
				$store[] =array(
				"s_id"=>'null',
				//"s"=>$row['type'],
				//"id_user"=>$row['id_user'],
				"s_name"=>'null',
				"s_icon"=>'null');
		}

        echo'{"store":'.json_encode($store,JSON_UNESCAPED_UNICODE).'}';
        exit;
    ?>