       <?php

        function generateCalendar(){

        /*******************************
        GREG'S CALENDAR GENERATOR (BETA)
        LAST UPDATED 12/31/2011 @ 21:20
        *******************************/

        // ESTABLISH THE CURRENT DATE INFORMATION
        $year   =   date('Y');
        $month  =   date('n');
        $day    =   date('j');

        if(isset($_GET['a'])){
            // CREATE INFORMATION WHEN THE USER USES THE PREVIOUS MONTH BUTTON
            if($_GET['a']   ==  "back") {
                $month  =   $_GET['m']-1;
                $year   =   $_GET['y'];
                if($month   <   1) {
                    $month  =   12;
                    $year   =   $_GET['y']-1;
                }
            } 
            // CREATE INFORMATION WHEN THE USER USES THE NEXT MONTH BUTTON
            if($_GET['a']   ==  "next") {
                $month  =   $_GET['m']+1;
                $year   =   $_GET['y'];
                if($month   >   12) {
                    $month  =   1;
                    $year   =   $_GET['y']+1;
                }
            }
        }

        // FIND THE NUMBER OF DAYS IN THE MONTH
        $daysInMonth    =   date('t', mktime(0,0,0,$month,1,$year));    
        // ESTABLISH THE FIRST DAY OF THE MONTH
        $firstDay       =   date('w', mktime(0,0,0,$month,1,$year));
        // CREATE A TITLE FOR THE NUMERIC MONTH
        $title          =   date('F', mktime(0,0,0,$month,1,$year));

        // GENERATE A TABLE FOR THE CALENDAR
        echo    "<table cellpadding=3 cellspacing=3 border=2>
                    <tr>
                        <td colspan=7>
                            <center><a href=calendar.php?a=back&m=$month&y=$year>Previous</a> <b>" . $title . " " . $year . "</b> <a href=calendar.php?a=next&m=$month&y=$year>Next</a></center>
                        </td>
                    </tr>
                    <tr>
                        <td>Sunday</td><td>Monday</td><td>Tuesday</td><td>Wednesday</td><td>Thursday</td><td>Friday</td><td>Saturday</td>
                    </tr>
                    <tr>";

        $dayCount = 0;
        // CREATE BLANK CELLS UNTIL THE STARTING DAY FOR THE CURRENT MONTH IS REACHED
        while($firstDay > 0){
            echo "<td></td>";
            $firstDay = $firstDay-1;
            $dayCount++;
        }

        // GENERATE CALENDAR INFORMATION
        for($i=1;$i<=$daysInMonth;$i++) {
            if($dayCount>6) {
                echo "</tr><tr>";
                $dayCount = 0;
            }
            // CREATE A HIGHLIGHTED CELL FOR THE CURRENT DATE
            if(($i==date('j')) && ($month==date('n')) && ($year==date('Y'))){
                echo "<td bgcolor=#ffff00><a href=calendar.php?a=view&m=$month&y=$year&d=$i>" . $i . "</a></td>";
            } else {
                echo "<td><a href=calendar.php?a=view&m=$month&y=$year&d=$i>" . $i . "</a></td>";
            }
            $dayCount++;
        }

        echo    "   </tr>
                </table><br>";

        }

        generateCalendar();

        ?>