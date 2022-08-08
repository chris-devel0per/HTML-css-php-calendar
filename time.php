<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="calendar.css"><!--Import of css | Import des Css-->
    </head>
    <body>
    <?php 
    //include '../mysql.php';//Import of Mysql login data| Importieren der Mysql Logindaten
    
    //$conn = new mysqli($servername , $username, $password, $dbname);//Connect to MYSQL database| Verbinde dich mit der Mysql Datenbank


    $start_time='12:00';//opening time | Öffnungszeit
    $end_time='16:00';//closing time | Schließzeit 
/*
    $sql = "SELECT * FROM `order_f".$_GET['id']."` WHERE `COL 1`='0'"; // SQL Query
    $stmt = $conn->prepare($sql); //Prepare SQL Query (Used to block sql injections)| Bereite die SQL Query vor (Wegen sql injections benutzt)
    $stmt->execute();//Run the SQL Query | Führe die SQL Query aus
    $result = $stmt->get_result();// Get the result | Bekomme das Ergebnis*/
    ?>

    <form action="submit.php?>" method="post"><!-- Form -->
            <?php 
            // css for the function of the calendar | CSS zur Funktion des Kalenders
            include 'maincss.php';
            include 'css4.php';

            //Inputs for the validation of the Calendar || Inputs zur Validierung des Kalenders

            for ($i = 1; $i < 13; $i++){//Do it 12 Times because of 12 Months | Mache es 12 Mal wegen 12 Monaten 
                if(date("m")==$i){//If it is the current Month | Falls es der aktuelle Monat ist 
                    $checked='checked';//Make the input checked | Mache den Input ausgewählt
                  }else{//If it is not the current Month | Falls es nicht der aktuelle Monat ist
                    $checked='';//Make the input not checked | Mache den nicht Input ausgewählt
                  }
                echo '<input type="radio" id="m'.$i.'" value="m'.$i.'" name="month" class="radio-hidden" '.$checked.'>'."\n"; // Echo the Inputs | Echo die Inputs

            }
            for ($b = 0; $b < 96; $b++){//Do it 96 Times because of there are 96 quarter per day  | Mache es 96 Mal weil es 96 Viertelstunden pro Tag 
                if($b==1){
                    $checked='checked';
                }else{
                    $checked='';
                }
                echo '<input type="radio" id="t'.$b.'" value="t'.$b.'" name="time" class="radio-hidden" '.$checked.'>'."\n";// Echo the Inputs | Echo die Inputs

            }


            for ($a = 0; $a < 42; $a++){//Do it 42 Times because of 6 weeks per month so 42 Days  | Mache es 42 Mal weil es 6 Wochen pro Monat gibt also 42 Tage
                $date2= date('D');//give $date2 the current day | gebe $date2 den aktuellen Tag
                $date=date('Y-m-01');//gives the date of the first day of the Month | Gibt $date das Datum des ersten Tages des Monats 
                $timestamp = strtotime($date);//Changes $date to a time variable | Wandelt die Variable $date zu einer Time Variable
                $day = date('D', $timestamp);// Gets the name of the date like Mon | Gibt $day den Namen des Tages wie z.b. Mon


                if ($day=='Mon' and $a==1){// if $day is Monday | Falls der Tag Montag ist 
                    $day2=1;// sets $day2 to 1 | setzt $day2 auf 1

                }elseif ($day=='Tue' and $a==1){// if $day is Tuesday | Falls der Tag Dienstag ist 
                    $day2=2;// sets $day2 to 2 | setzt $day2 auf 2

                }elseif ($day=='Wed' and $a==1){// if $day is Wednesday | Falls der Tag Mittwoch ist 
                    $day2=3;// sets $day2 to 3 | setzt $day2 auf 3

                }elseif ($day=='Thu' and $a==1){// if $day is Thursday | Falls der Tag Donnerstag ist 
                    $day2=4;// sets $day2 to 4 | setzt $day2 auf 4

                }elseif ($day=='Fri' and $a==1){// if $day is Friday | Falls der Tag Freitag ist 
                    $day2=5;// sets $day2 to 5 | setzt $day2 auf 5

                }elseif ($day=='Sat' and $a==1){// if $day is Saturday | Falls der Tag Samstag ist 
                    $day2=6;// sets $day2 to 6 | setzt $day2 auf 6

                }elseif ($day=='Sun' and $a==1){// if $day is Sunday | Falls der Tag Sontag ist 
                    $day2=7;// sets $day2 to 7 | setzt $day2 auf 7

                }

                $date2= date('d');// Gets the current day | Gibt den aktuellen Tag
                $d1=$date2+$day2-2;// Current day plus first day of month minus 2 | Aktueller Tag plus der erste Tag des Monats minus 2 

                $date=str_replace('0', "", date("d"));//Removes 0 from current day | Entfernt die 0 vom aktuellen Tag

            if($d1==$a-1){//if $d1 from line 103 is $a from line 72 minus 1 | Falls $d1 aus zeile 103 $a  aus Zeile 72 minus 1 ist 
                $checked='checked';// Make the Radio checked | Checke den Radio 
              }else{//else | Sonst 
                $checked='';//Dont check the Radio | Checke den Radio nicht 
              }
                echo '<input type="radio" id="ld'.$a.'" value="ld'.$a.'" name="day" class="radio-hidden" '.$checked.'>'."\n";//Echo the Radio | Echo den Radio 

            }
            echo '<input type="text" value="'.$start_time.'" name="start_time" class="radio-hidden" '.$checked.'>';//Input with the start time for the validation of the Form | Input mit der Start time ,wird wegen  der Validation des Kalenders gebraucht 
            ?>
            <div id="main-table"> <!-- Main Table of the Calendar | Haupttabelle des Kalenders -->
                <table  cellpadding="1" cellspacing="1" id="month-table" ><!-- Table with all the Months | Tabelle mit allen Monaten  -->
                    <tbody><!-- Table Body | Tabellen body-->
                		<tr><!--Table row | Tabellen reihe -->
                			<td><label for="m1">Jan</label></td><!-- Table column with label and monthname | Tabellenspalte mit Label und Name des Monats-->
                			<td><label for="m2">Feb</label></td><!-- Table column with label and monthname | Tabellenspalte mit Label und Name des Monats-->
                			<td><label for="m3">M&auml;r</label></td><!-- Table column with label and monthname | Tabellenspalte mit Label und Name des Monats-->
                			<td><label for="m4">Apr</label></td><!-- Table column with label and monthname | Tabellenspalte mit Label und Name des Monats-->
                			<td><label for="m5">Mai</label></td><!-- Table column with label and monthname | Tabellenspalte mit Label und Name des Monats-->
                			<td><label for="m6">Jun</label></td><!-- Table column with label and monthname | Tabellenspalte mit Label und Name des Monats-->
                			<td><label for="m7">Jul</label></td><!-- Table column with label and monthname | Tabellenspalte mit Label und Name des Monats-->
                            <td><label for="m8">Aug</label></td><!-- Table column with label and monthname | Tabellenspalte mit Label und Name des Monats-->
                            <td><label for="m9">Sep</label></td><!-- Table column with label and monthname | Tabellenspalte mit Label und Name des Monats-->
                            <td><label for="m10">Okt</label></td><!-- Table column with label and monthname | Tabellenspalte mit Label und Name des Monats-->
                            <td><label for="m11">Nov</label></td><!-- Table column with label and monthname | Tabellenspalte mit Label und Name des Monats-->
                            <td><label for="m12">Dez</label></td><!-- Table column with label and monthname | Tabellenspalte mit Label und Name des Monats-->
                		</tr><!--Table row end | Tabellen reihe end  -->
                    </tbody><!-- Table Body end  | Tabellen body-->
                </table><!-- Table with all the Months end | Tabelle mit allen Monaten end -->
                <table  cellpadding="1" cellspacing="1" id="day-table" ><!-- Table with all the Days | Tabelle mit allen Tagen  -->
                	<thead id="day-head"><!-- Tablehead | Tabellenkopf -->
                		<tr><!--Table row | Tabellen reihe -->
                			<th scope="col">Mo</th><!-- Tableheadcolumn | Tabellenkopfspalte -->
                			<th scope="col">Di</th><!-- Tableheadcolumn | Tabellenkopfspalte -->
                			<th scope="col">Mi</th><!-- Tableheadcolumn | Tabellenkopfspalte -->
                			<th scope="col">Do</th><!-- Tableheadcolumn | Tabellenkopfspalte -->
                			<th scope="col">Fr</th><!-- Tableheadcolumn | Tabellenkopfspalte -->
                			<th scope="col">Sa</th><!-- Tableheadcolumn | Tabellenkopfspalte -->
                			<th scope="col">So</th><!-- Tableheadcolumn | Tabellenkopfspalte -->
                		</tr><!--Table row end | Tabellen reihe end  -->
                	</thead><!-- Tablehead end | Tabellenkopfende -->
                	<tbody><!-- Table Body | Tabellen body-->
                		<tr>
                			<td><label for="ld1" ></label></td><!-- Table column for the days | Tabellenspalte der Tage -->
                			<td><label for="ld2" ></label></td><!-- Table column for the days | Tabellenspalte der Tage -->
                			<td><label for="ld3" ></label></td><!-- Table column for the days | Tabellenspalte der Tage -->
                			<td><label for="ld4" ></label></td><!-- Table column for the days | Tabellenspalte der Tage -->
                			<td><label for="ld5" ></label></td><!-- Table column for the days | Tabellenspalte der Tage -->
                			<td><label for="ld6" ></label></td><!-- Table column for the days | Tabellenspalte der Tage -->
                			<td><label for="ld7" ></label></td><!-- Table column for the days | Tabellenspalte der Tage -->
                		</tr>
                		<tr>
                			<td><label for="ld8"></label></td><!-- Table column for the days | Tabellenspalte der Tage -->
                			<td><label for="ld9"></label></td><!-- Table column for the days | Tabellenspalte der Tage -->
                			<td><label for="ld10" ></label></td><!-- Table column for the days | Tabellenspalte der Tage -->
                			<td><label for="ld11" ></label></td><!-- Table column for the days | Tabellenspalte der Tage -->
                			<td><label for="ld12" ></label></td><!-- Table column for the days | Tabellenspalte der Tage -->
                			<td><label for="ld13" ></label></td><!-- Table column for the days | Tabellenspalte der Tage -->
                			<td><label for="ld14" ></label></td><!-- Table column for the days | Tabellenspalte der Tage -->
                		</tr>
                		<tr>
                			<td><label for="ld15" ></label></td><!-- Table column for the days | Tabellenspalte der Tage -->
                			<td><label for="ld16" ></label></td><!-- Table column for the days | Tabellenspalte der Tage -->
                			<td><label for="ld17" ></label></td><!-- Table column for the days | Tabellenspalte der Tage -->
                			<td><label for="ld18" ></label></td><!-- Table column for the days | Tabellenspalte der Tage -->
                			<td><label for="ld19" ></label></td><!-- Table column for the days | Tabellenspalte der Tage -->
                			<td><label for="ld20" ></label></td><!-- Table column for the days | Tabellenspalte der Tage -->
                			<td><label for="ld21" ></label></td><!-- Table column for the days | Tabellenspalte der Tage -->
                		</tr>
                		<tr>
                			<td><label for="ld22" ></label></td><!-- Table column for the days | Tabellenspalte der Tage -->
                			<td><label for="ld23" ></label></td><!-- Table column for the days | Tabellenspalte der Tage -->
                			<td><label for="ld24" ></label></td><!-- Table column for the days | Tabellenspalte der Tage -->
                			<td><label for="ld25" ></label></td><!-- Table column for the days | Tabellenspalte der Tage -->
                			<td><label for="ld26" ></label></td><!-- Table column for the days | Tabellenspalte der Tage -->
                			<td><label for="ld27" ></label></td><!-- Table column for the days | Tabellenspalte der Tage -->
                			<td><label for="ld28" ></label></td><!-- Table column for the days | Tabellenspalte der Tage -->
                		</tr>
                		<tr>
                			<td><label for="ld29" ></label></td><!-- Table column for the days | Tabellenspalte der Tage -->
                			<td><label for="ld30" ></label></td><!-- Table column for the days | Tabellenspalte der Tage -->
                			<td><label for="ld31" ></label></td><!-- Table column for the days | Tabellenspalte der Tage -->
                			<td><label for="ld32" ></label></td><!-- Table column for the days | Tabellenspalte der Tage -->
                			<td><label for="ld33" ></label></td><!-- Table column for the days | Tabellenspalte der Tage -->
                			<td><label for="ld34" ></label></td><!-- Table column for the days | Tabellenspalte der Tage -->
                			<td><label for="ld35" ></label></td><!-- Table column for the days | Tabellenspalte der Tage -->
                		</tr>
                        <tr>
                			<td><label for="ld36" ></label></td><!-- Table column for the days | Tabellenspalte der Tage -->
                			<td><label for="ld37" ></label></td><!-- Table column for the days | Tabellenspalte der Tage -->
                			<td><label for="ld38" ></label></td><!-- Table column for the days | Tabellenspalte der Tage -->
                			<td><label for="ld39" ></label></td><!-- Table column for the days | Tabellenspalte der Tage -->
                			<td><label for="ld40" ></label></td><!-- Table column for the days | Tabellenspalte der Tage -->
                			<td><label for="ld41" ></label></td><!-- Table column for the days | Tabellenspalte der Tage -->
                			<td><label for="ld42" ></label></td><!-- Table column for the days | Tabellenspalte der Tage -->
                		</tr>
                	</tbody><!-- Table Body end | Tabellen body end-->
                </table><!-- Table end | Tabellen ende -->

                <!-- Timetable for Destktop start | Stundenplan für den Desktop start  -->
                <div id="time-div-desktop">
                    <h4>Select time </h4><!-- Heading | Überschrift -->
                    <?php 
                    $time_diff = strtotime($end_time) - strtotime($start_time); // Set $time_diff to end_time minus start time | Setzt $time_diff 
                    $count= (($time_diff/60)/60)*4;//Counts the Quater hours in the time the user has open | Zählt die Zeit in viertelstunden in der der User offen hat 
                    ?>
                    <table id="time-picker1">
                        <tbody>

                                <?php 
                                    $selectedTime = $start_time; // set $selectedTime to the selected time from the DB | Setzt $selectedTime auf die ausgewählte Zeit von der DB
                                    for ($i = 0; $i < intval($count/2)+1; $i++){ // do it $count/2 plus 1 times | Mache es $count/2 plus 1 mal 
                                        $time_to_add=15*$i;// multiply $i 15 times | Multipliziere $i 15 mal 
                                        $endTime = strtotime("+". $time_to_add." minutes", strtotime($selectedTime));// Add to $selectedTime $time_to_add minutes | Füge zu $seleccted time $time_to_add Minuten hinzu
                                        echo '<tr>';//Echo the Table row start | Echo der Tabellen Reihe start 
                                        echo '  <td><label for="t'.($i+1).'" >'.date('H:i', $endTime).'</label</td>';//Table column for the time | Tabellenspalte der Zeit
                                        echo '</tr>';//Echo the Table row end | Echo der Tabellen Reihe end 

                                    
                                    }
                                ?>
                        </tbody>
                    </table>
                    <table id="time-picker2">
                        <tbody>
                                
                                <?php 
                                    for ($i = intval($count/2)+1; $i < intval($count)+1; $i++){
                                        $time_to_add=15*$i;
                                        $endTime = strtotime("+". $time_to_add." minutes", strtotime($selectedTime));
                                        echo '<tr>';//Echo the Table row start | Echo der Tabellen Reihe start 
                                        echo '  <td><label for="t'.($i+1).'" >'.date('H:i', $endTime).'</label</td>';//Table column for the time | Tabellenspalte der Zeit
                                        echo '</tr>';//Echo the Table row end | Echo der Tabellen Reihe end 
                                    
                                    }
                                ?>
                                <?php 
                                $number=$count+1;
                                if ($number % 2 != 0) {
                                  echo '<tr>';
                                  echo '      <td>	&#8416;</td>';//Table column with blocked icon | Tabellenspalte mit Blockiert Icon
                                  echo '</tr>';
                                }
                                ?>
                                
                        </tbody>
                    </table>
                </div>
                <!-- Timetable for Destktop end | Stundenplan für den Desktop end  -->
                <div id="time-div-mobile">
                    <h4>W&auml;hlen sie die Uhrzeit von ihrem Termin</h4>
                    <table id="time-picker1">
                        <tbody>

                                <?php 
                                    for ($i = 0; $i < intval($count/4)+1; $i++){
                                        $time_to_add=15*$i;
                                        $endTime = strtotime("+". $time_to_add." minutes", strtotime($selectedTime));
                                        echo '<tr>';//Echo the Table row start | Echo der Tabellen Reihe start 
                                        echo '  <td><label for="t'.($i+1).'" >'.date('H:i', $endTime).'</label</td>';//Table column for the time | Tabellenspalte der Zeit
                                        echo '</tr>';//Echo the Table row end | Echo der Tabellen Reihe end 
                                    
                                    }
                                ?>
                                
                        </tbody>
                    </table>
                    <table id="time-picker2">
                        <tbody>
                                
                                <?php 
                                    for ($i = intval($count/4)+1; $i < intval($count/4+$count/4)+1; $i++){
                                        $time_to_add=15*$i;
                                        $endTime = strtotime("+". $time_to_add." minutes", strtotime($selectedTime));
                                        echo '<tr>';//Echo the Table row start | Echo der Tabellen Reihe start 
                                        echo '  <td><label for="t'.($i+1).'" >'.date('H:i', $endTime).'</label</td>';//Table column for the time | Tabellenspalte der Zeit
                                        echo '</tr>';//Echo the Table row end | Echo der Tabellen Reihe end 
                                    
                                    }
                                ?>
                                <?php 

                                $number=$count/4;

                                $number3=$number-intval($number);
                                // echo $number3*100;
                                if($number3*100==25){//if $number3*100 equals 25 | Falls $number*100 25 ist 
                                    echo '<tr>';
                                    echo '      <td>	&#8416;</td>';//Table column with blocked icon | Tabellenspalte mit Blockiert Icon
                                    echo '</tr>';
                                 
                                }elseif($number3*100==0){//if $number3*100 equals 0 | Falls $number*100 0 ist 
                                    echo '<tr>';
                                    echo '      <td>	&#8416;</td>';//Table column with blocked icon | Tabellenspalte mit Blockiert Icon
                                    echo '</tr>';
                                }
                                ?>
                        </tbody>
                    </table>
                    <table id="time-picker3">
                        <tbody>
                                
                                <?php 
                                    for ($i = intval($count/4+$count/4)+1; $i < intval($count/4+$count/4+$count/4)+1; $i++){
                                        $time_to_add=15*$i;
                                        $endTime = strtotime("+". $time_to_add." minutes", strtotime($selectedTime));
                                        echo '<tr>';//Echo the Table row start | Echo der Tabellen Reihe start 
                                        echo '  <td><label for="t'.($i+1).'" >'.date('H:i', $endTime).'</label</td>';//Table column for the time | Tabellenspalte der Zeit
                                        echo '</tr>';//Echo the Table row end | Echo der Tabellen Reihe end 
                                    
                                    }
                                ?>
                                <?php 
                                $number=$count/4;

                                $number3=$number-intval($number);
                                
                                // echo $number3*100;
                                if($number3*100==25){//if $number3*100 equals 25 | Falls $number*100 25 ist 
                                    echo '<tr>';
                                    echo '      <td>	&#8416;</td>';//Table column with blocked icon | Tabellenspalte mit Blockiert Icon
                                    echo '</tr>';
                                 
                                }elseif($number3*100==50){//if $number3*100 equals 50 | Falls $number*100 50 ist 
                                    echo '<tr>';
                                    echo '      <td>	&#8416;</td>';//Table column with blocked icon | Tabellenspalte mit Blockiert Icon
                                    echo '</tr>';

                                }elseif($number3*100==100){//if $number3*100 equals 100 | Falls $number*100 100 ist 
                                    echo '<tr>';
                                    echo '      <td>	&#8416;</td>';//Table column with blocked icon | Tabellenspalte mit Blockiert Icon
                                    echo '</tr>';
                                }elseif($number3*100==0){//if $number3*100 equals 0 | Falls $number*100 0 ist 
                                    echo '<tr>';
                                    echo '      <td>	&#8416;</td>';//Table column with blocked icon | Tabellenspalte mit Blockiert Icon
                                    echo '</tr>';
                                }
                                ?>
                        </tbody>
                    </table>
                    <table id="time-picker4">
                        <tbody>
                                
                                <?php 
                                    for ($i = intval($count/4+$count/4+$count/4)+1; $i < intval($count)+1; $i++){
                                        $time_to_add=15*$i;
                                        $endTime = strtotime("+". $time_to_add." minutes", strtotime($selectedTime));
                                        echo '<tr>';//Echo the Table row start | Echo der Tabellen Reihe start 
                                        echo '  <td><label for="t'.($i+1).'" >'.date('H:i', $endTime).'</label</td>';//Table column for the time | Tabellenspalte der Zeit
                                        echo '</tr>';//Echo the Table row end | Echo der Tabellen Reihe end 
                                    
                                    }
                                ?>
                                <?php 
                                $number=$count/4;

                                $number3=$number-intval($number);
                                
                                // echo $number3*100;
                                if($number3*100==100){
                                    echo '<tr>';
                                    echo '      <td>	&#8416;</td>';//Table column with blocked icon | Tabellenspalte mit Blockiert Icon
                                    echo '</tr>';
                                }elseif($number3*100==0){
                                    echo '<tr>';
                                    echo '      <td>	&#8416;</td>';//Table column with blocked icon | Tabellenspalte mit Blockiert Icon
                                    echo '</tr>';
                                }
                                ?>
                        </tbody>
                    </table>
                </div>
                <input type="submit" id="button">
            </div>
        </form>
    </body>
</html>