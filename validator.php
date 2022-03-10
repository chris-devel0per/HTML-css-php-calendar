<?php

//echo htmlspecialchars($_POST['time']);

$week = $_POST['week'];
$year = date("Y");
$timestamp = mktime( 0, 0, 0, 1, 1,  $year ) + ( ($week-1) * 7 * 24 * 60 * 60 );
$timestamp_for_monday = $timestamp - 86400 * ( date( 'N', $timestamp )  );
$day = date( 'd', $timestamp_for_monday );
$month = date( 'm', $timestamp_for_monday );
$year = date( 'y', $timestamp_for_monday );

$day_to_add__array=explode("|", $_POST['time']);
$day_to_add=$day_to_add__array[0];
$time=$day_to_add__array[1];

$stop_date = '20'.$year.'-'.$month.'-'.$day;

$stop_date = date('d-m-Y', strtotime($stop_date . ' +'.$day_to_add.' day'));

echo 'Selected date and time:<br>';
echo $stop_date.'<br>';
echo $time;
?>