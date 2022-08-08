<?php 

$month = str_replace("m", "", $_POST['month']);



$date=date('Y-'.$month.'-01');
$timestamp = strtotime($date);
$day = date('D', $timestamp);


if ($day=='Mon'){
    $day2=1;

}elseif ($day=='Tue'){
    $day2=2;

}elseif ($day=='Wed'){
    $day2=3;

}elseif ($day=='Thu'){
    $day2=4;

}elseif ($day=='Fri'){
    $day2=5;

}elseif ($day=='Sat'){
    $day2=6;

}elseif ($day=='Sun'){
    $day2=7;

}




echo '<br>';
$day=str_replace("d", "", $_POST['day']);
$day=intval($day);
$day=$day2-$day;


$day=str_replace("ld", "", $_POST['day']);

$day=$day+1;

$day3= $day-$day2;

$start_time= $_POST['start_time'];

$t=str_replace("t", "", $_POST['time']);

$time_to_add=15*($t-1);
$endTime = strtotime("+". $time_to_add." minutes", strtotime($start_time));

$endTime= date('H:i', $endTime);

echo 'Selected Time <br>'.$endTime.'<br>'.$day3.'.'.$month.'.2022';


?>