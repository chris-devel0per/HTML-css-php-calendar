<?php 

 $blocked_dates=array('12.04.2022|14:30|15:00','08-03-2022|16:45','08-03-2023|17:00','07-04-2022|15:00'); 




echo '<style> '; // Start style | Starte den Style

for ($i = 0; $i < count($blocked_dates); $i++){// Make it for every Date in $blocked_dates | Mache es für jeden Tag in $blocked_dates

    $date = explode("|", $blocked_dates[$i]);// Make the a $blocked_date from String to array | Mache ein blockiertes Datum von einem String zu einem Array 
    $date_main = explode("|", $blocked_dates[$i]);// Make the a $blocked_date from String to array | Mache ein blockiertes Datum von einem String zu einem Array 
    $time=strtotime($date[1]);// Get the time from the stop_date | Mache die endzeit von einem String zu einer Zeit variable  
    
    $timestamp = strtotime($date[0]);// Date from String to Date variable | Datum von String zu Date variable 
    $month= date("m", $timestamp);// Get the month from the $timestamp variable | Bekomme den Monat von der $timestamp variable
    $day= date("d", $timestamp);// Get the Day from the $timestamp variable | Bekomme den Tag von der $timestamp variable
    $day3=(int)$day;// Make a int variable from the $day variable | Mache eine Int variable von der $day variable 
    $month=(int)$month;// Make a int variable from the $month variable | Mache eine Int variable von der $month variable 

    $date=date('Y-'.date("m", $timestamp).'-01');//Get the first day of the month of the blocked date | Bekomme den ersten Tag des Monats des blockierten Tages
    $timestamp = strtotime($date);//Make a time var from $date | Mache eine time variable von $date 
    $day = date('D', $timestamp);//Get the name of the first day | Bekomme den Name des ersten Tages

    $h=date('H', $time);//Get the hour of the blocked time | Bekomme die Stunde der blockierten Zeit 
    $time2= $h.':'.date('i', $time);
    $min=idate('i', $time);
    $time_mod= (($h-9)*4)+1;
    $min_mod= $min/15;
    $t=$time_mod+$min_mod;


    if ($day=='Mon'){// if $day is Monday | Falls der Tag Montag ist 
        $day2=1;// sets $day2 to 1 | setzt $day2 auf 1

    }elseif ($day=='Tue'){// if $day is Tuesday | Falls der Tag Dienstag ist 
        $day2=2;// sets $day2 to 2 | setzt $day2 auf 2

    }elseif ($day=='Wed'){// if $day is Wednesday | Falls der Tag Mittwoch ist 
        $day2=3;// sets $day2 to 3 | setzt $day2 auf 3

    }elseif ($day=='Thu'){// if $day is Thursday | Falls der Tag Donnerstag ist 
        $day2=4;// sets $day2 to 4 | setzt $day2 auf 4

    }elseif ($day=='Fri'){// if $day is Friday | Falls der Tag Freitag ist 
        $day2=5;// sets $day2 to 5 | setzt $day2 auf 5

    }elseif ($day=='Sat'){// if $day is Saturday | Falls der Tag Samstag ist 
        $day2=6;// sets $day2 to 6 | setzt $day2 auf 6

    }elseif ($day=='Sun'){// if $day is Sunday | Falls der Tag Sontag ist 
        $day2=7;// sets $day2 to 7 | setzt $day2 auf 7

    }
    $day2=$day2-1;



    if(isset($date_main[2])){
        $time3=strtotime($date_main[2]);
        $h2=date('H', $time3);
        $time22= $h2.':'.date('i', $time3);
        $min2=idate('i', $time3);
        $time_mod2= (($h2-9)*4)+1;
        $min_mod2= $min2/15;
        $t2=$time_mod2+$min_mod2;
        

        for ($a = 0; $a < $t2-$t+1; $a++){
                echo 'input[id="m'.$month.'"]:checked ~ input[id="ld'.$day3+$day2.'"]:checked ~ div div table label[for="t'.$a+$t.'"] {
                    '.$color.'
                    opacity:0.5;
                    color:grey;
                    pointer-events: none;
                }';
                echo "\n";
                
        }
    }else{
        echo 'input[id="m'.$month.'"]:checked ~ input[id="ld'.$day3+$day2.'"]:checked ~ div div table label[for="t'.$t.'"] {
            '.$color.'
            opacity:0.5;
            color:grey;
            pointer-events: none;
        }';
        echo "\n";
    }
    

    

    
}



for ($i = 1; $i < 13; $i++){
    for ($c = 1; $c < 43; $c++){
            $a_date = "2022-".$i."-1";
            $date2= date('D', strtotime($a_date));
            
            if ($date2=='Mon' and $c==1){
                $d1=0;
            }elseif ($date2=='Tue' and $c==1){
                $d1=1;
            }elseif ($date2=='Wed' and $c==1){
                $d1=2;
            }elseif ($date2=='Thu' and $c==1){
                $d1=3;
            }elseif ($date2=='Fri' and $c==1){
                $d1=4;
            }elseif ($date2=='Sat' and $c==1){
                $d1=5;
            }elseif ($date2=='Sun' and $c==1){
                $d1=6;
            }
            $d=$c+$d1;
            echo 'input[id="m'.$i.'"]:checked ~ div table tbody tr td label[for="ld'.$d.'"]:after {';
            $max_date = date("t", strtotime($a_date));
            if($max_date<$d-$d1){
                $d2='"\00a0"';
            }else{
                if($d-$d1<10){
                    $d2="'0".$d-$d1."'";
                }else{
                    $d2="'".$d-$d1."'";
                }
                
            }
            echo "content:".$d2.";";
            echo '}';
            echo "\n";
    }
    
        

}

for ($f = 0; $f < 42; $f++){
        echo 'input[id="ld'.$f.'"]:checked ~ div table tbody tr td label[for="ld'.$f.'"]{
                padding: 5%;
                '.$color.'
                border-radius:30%;
            }';
}

for ($g = 1; $g < 13; $g++){
    echo 'input[id="m'.$g.'"]:checked ~ div table tbody tr td label[for="m'.$g.'"]{
            padding: 5%;
            '.$color.'
            border-radius:20%;
        }';
}

for ($h = 1; $h < 36; $h++){
    echo 'input[id="t'.$h.'"]:checked ~ div div  table tbody tr td label[for="t'.$h.'"]{
            padding: 5%;
            '.$color.'
            border-radius:20%;
        }';
}

echo '</style>';
?>