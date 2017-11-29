<?php





date_default_timezone_set('Asia/kolkata');
$time=date('H:i:s');
$time1=strtotime($time);
$new_time = date("Y-m-d H:i:s", strtotime('+2 minutes'));
$new_time1 = date("H:i:s",strtotime($new_time));
$time2=strtotime($new_time1);
$diff=abs($time1-$time2);
$new=date("H:i:s", $diff);
echo $time ; 
echo $new_time1;
echo "--------".$time1. "-----";
echo "--------".$time2. "-----";

echo $diff;
echo $new;

?>