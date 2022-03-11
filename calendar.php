<!DOCTYPE html>
<html>
<style>
  <?php 
  $blocked_dates=array('11-03-2022|09:15','08-03-2022|16:45','08-03-2023|16:45'); //You can add Dates with DD-MM-YYYY|h-i and don't forget the  ' because it has to be a string :)
  ?>

body{
  font-family: "Open Sans",Helvetica,Arial,sans-serif;
}

table, th, td {
  /* border:1px solid black; */
}
.week-label{
  width: 20px;
  display: none;
  border-radius: 50%;
  border-style:solid;
  border-color: lightgrey;
}


.controlls{
  width: 1%;
  white-space: nowrap;
}

th{
  border-bottom: lightgrey solid;
}
input[id="j1"]:checked ~  table tbody tr th .week-label label[for="j2"]{
        z-index: 400;
      
      } 
#year{
  width: 100%;
}

.inputs-to-hide{
  display: none !important;
}

.inputs-to-hide-time{
  display: none;
}

input[id="1|9:15"]:checked{
  display: block;
}

.time-in-table{
  text-align: center;
}
<?php 
  for ($i = 1; $i < 260; $i++){
      echo'input[id="w'.$i.'"]:checked ~ table tbody tr #d1:after {';
        $week = $i;
        $year = date("Y");

        $timestamp = mktime( 0, 0, 0, 1, 1,  $year ) + ( ($week-1) * 7 * 24 * 60 * 60 );
        $timestamp_for_monday = $timestamp - 86400 * ( date( 'N', $timestamp )  );
        $day = date( 'd', $timestamp_for_monday );
        $month = date( 'm', $timestamp_for_monday );
        $year = date( 'y', $timestamp_for_monday );
        
        echo '  content: "'.$day.'.'.$month.'.'.$year.'";
        }';

        $stop_date = date( 'y-m-d', $timestamp_for_monday  );

      for ($a = 1; $a < 8; $a++){

        $date= date('d-m-y', strtotime($stop_date . ' +'.$a.' day'));

        echo'input[id="w'.$i.'"]:checked ~ table tbody tr #d'.$a.':after {';
          echo '  content: "'.$date.'";    
        }';
  

      }
      
      

  }
  echo"\n";
 

 for ($i = 0; $i < count($blocked_dates); $i++){
       $date = explode("|", $blocked_dates[$i]);
       $year = explode("-", $date[0]);
       $var= (date("Y")-$year[2])*-1;
      //  echo $var;
       $blocked_week= date("W", strtotime($year[2]))+1;
       if($var>0){
          for ($a = 0; $a < $var; $a++){

              $blocked_week=intval($blocked_week)+52;
            };
          
       };

        $date2 = $date[0];
        //Convert the date string into a unix timestamp.
        $unixTimestamp = strtotime($date2);
        //Get the day of the week using PHP's date function.
        $dayOfWeek = date("l", $unixTimestamp);
        $array = array(1 => 'Monday', 2 => 'Tuesday', 3 => 'Wednesday', 4 => 'Thursday', 5 => 'Friday', 6 => 'Saturday', 7 => 'Sunday');
        $key = array_search($dayOfWeek, $array);
        $time=$date[1];
       echo 'input[id="w'.$blocked_week.'"]:checked ~ table tbody tr td label[for="'.$key.'|'.$time.'"] {'."\n";
        echo '  display: none !important;'."\n".'    
      }'."\n";
 }
 

  for ($i = 1; $i < 260; $i++){
    $i2=$i+1;
      echo 'input[id="w'.$i.'"]:checked ~  table tbody tr th.controlls label#forwards-label.week-label[for="w'.$i2.'"]{
        display: block;
      
      } ';
  }

  for ($i = 1; $i < 260; $i++){
    $i2=$i-1;
      echo 'input[id="w'.$i.'"]:checked ~  table tbody tr th.controlls label#backwards-label.week-label[for="w'.$i2.'"]{
        display: block;
      
      } ';
  }

  
  
?>

</style>
<body>
<form action="validator.php" method="post">
 <?php 

  for ($i = 1; $i < 260; $i++){
    if(date("W")==$i-1){
      $checked='checked';
    }else{
      $checked='';
    }
        echo '<input id="w'.$i.'" value="'.$i.'" type="radio" class="inputs-to-hide" '.$checked.' name="week"/>';
    }
  for ($i = 0; $i < 5; $i++){
      echo '<input id="w'.$i.'" value="'.$i.'" type="radio" class="inputs-to-hide" '.$checked.' name="week"/>';
    }
  $selectedTime = "9:00";
  for ($i = 1; $i < 36; $i++){
    $time_to_add=15*$i;
    $endTime = strtotime("+". $time_to_add." minutes", strtotime($selectedTime));
        for ($a = 1; $a < 8; $a++){
            echo '<input id="'.$a.'|'.date('H:i', $endTime).'" value="'.$a.'|'.date('H:i', $endTime).'" type="radio" class="inputs-to-hide-time" name="time"/>'."\n";
              }
    }
  
  ?>
<table style="width:100%">
  <tr>
    <th class="controlls" >
        <?php 
        for ($i = 1; $i < 260; $i++){
              $i2=$i-1;
              echo '<label class="week-label" id="backwards-label" for="w'.$i2.'" ><</label> ';
            
        }
        ?>
           

    </th>
    <th id="d1"></th>
    <th id="d2"></th>
    <th id="d3"></th>
    <th id="d4"></th>
    <th id="d5"></th>
    <th id="d6"></th>
    <th id="d7"></th>
    <th class="controlls" >
        <?php 
        for ($i = 1; $i < 260; $i++){
              echo '<label class="week-label" id="forwards-label" for="w'.$i.'" >></label> ';
            
        }
        ?>
           

    </th>
  </tr>
  <?php 
  $selectedTime = "9:00";
  for ($i = 1; $i < 36; $i++){
    $time_to_add=15*$i;
    $endTime = strtotime("+". $time_to_add." minutes", strtotime($selectedTime));
        echo '<tr>
        <td></td>';
        for ($a = 1; $a < 8; $a++){
            echo '<td class="time-in-table"><label for="'.$a.'|'.date('H:i', $endTime).'" >'.date('H:i', $endTime).'</label></td>';
              }
      echo '</tr>';
    }
  
  ?>
</table>
<p><input type="submit" /></p>
</form>
</body>
</html>