

<?php 
$i=0;

$result = json_decode(exec('python test1.py'), true);
foreach($result as $results){
    foreach($results as $key => $val){
        $myarray[$i] = $val;
		$i=$i+1;
					
    }
}
foreach($myarray as $arr){
	echo $arr;
}

#echo $result['Name'];

?>