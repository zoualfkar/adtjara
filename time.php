<?php
$arr = array( 's'=>'ثانية',
'S'=>'ثوان' ,
'i'=>'دقيقة' ,
'I'=>'دقائق' ,
'h'=>'ساعة' ,
'H'=>'ساعات' ,
'd'=>'يوم' ,
'D'=>'أيام' ,
'w'=>'أسبوع' ,
'W'=>'أسابيع' ,
'm'=>'شهر' ,
'M'=>'شهور' ,
'y'=>'سنة' ,
'Y'=>'سنوات' );
function getElapsedTime ($t)
{
	$timeDiff =time()-$t;
	if($timeDiff < 60)
	{
	if($timeDiff<1)
	{
	$arr[] = 's';
	$arr[] = '0';
	}
	else if($timeDiff<3 or $timeDiff>10)
	{
	$arr[] = 's';
	$arr[] = $timeDiff;
	}
	else
	{
	$arr[] = 'S';
	$arr[] = $timeDiff;
	}
	}
	else if(($temp=(int)($timeDiff/60)) < 60)
	{
	if($temp<3 or $temp>10)
	{
	$arr[] = 'i';
	}
	else
	{
	$arr[] = 'I';
	}
	$arr[] = $temp;
	}
	else if(($temp=(int)($timeDiff/(60*60))) < 24)
	{
	if($temp<3 or $temp>10)
	{
	$arr[] = 'h';
	}
	else
	{
	$arr[] = 'H';
	}
	$arr[] = $temp;
	}
	else if(($temp=(int)($timeDiff/(60*60*24))) < 7)
	{
	if($temp<3)
	{
	$arr[] = 'd';
	}
	else
	{
	$arr[] = 'D';
	}
	$arr[] = $temp;
	}
	else if(($temp=(int)($timeDiff/(60*60*24*7))) < 4)
	{
	if($temp<3)
	{
	$arr[] = 'w';
	}
	else
	{
	$arr[] = 'W';
	}
	$arr[] = $temp;
	}
	else if(($temp=(int)($timeDiff/(60*60*24*7*4))) < 12)
	{
	if($temp<3 or $temp>10)
	{
	$arr[] = 'm';
	}
	else
	{
	$arr[] = 'M';
	}
	$arr[] = $temp;
	}
	else
	{
	$temp = (int)($timeDiff/(60*60*24*30*12));
	if($temp<3 or $temp>10)
	{
	$arr[] = 'y';
	}
	else
	{
	$arr[] = 'Y';
	}
	$arr[] = $temp;
	}
	return $arr;
}
?>
