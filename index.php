<HTML>
<a href="http://www.accuweather.com/en/ca/vancouver/v5r/weather-forecast/53286" class="aw-widget-legal">
<!--
By accessing and/or using this code snippet, you agree to AccuWeatherâs terms and conditions (in English) which can be found at http://www.accuweather.com/en/free-weather-widgets/terms and AccuWeatherâs Privacy Statement (in English) which can be found at http://www.accuweather.com/en/privacy.
-->
</a><div id="awcc1486197946925" class="aw-widget-current"  data-locationkey="53286" data-unit="c" data-language="en-us" data-useip="false" data-uid="awcc1486197946925"></div><script type="text/javascript" src="https://oap.accuweather.com/launch.js"></script>

</HTML>
<img src='underconstruction.gif' alt='Reporte' style='width:140;height:120px;'>
<?php

/* 
pub wit
 */

$str = 'ASIGNADO';
echo '<h2> HORARIO DE LA PREDICACION PUBLICA <h2>';
echo '<img src="https://qrtag.net/api/qr_4.png?url=http://spwest.vacau.com/public_wit/" alt="qrtag">';
echo '<style>
    table, th, td {
    border: 1px solid black;
    }
table th {
        background-color: grey;
        color: black;
     }    
    </style>';
            echo '<table align="left" cellspacing="5" cellpadding="8">
            <tr>
                <th align="left">LUGAR </th>
                <th align="center" colspan="3" style="background-color:lightblue" ><b>Lunes</b></th>
                <th align="center" colspan="3" style="background-color:lightyellow" ><b>Martes</b></th>
                <th align="center" colspan="3" style="background-color:lightgreen"><b>Miércoles</b></th>
                <th align="center" colspan="3" style="background-color:lightblue"><b>Jueves</b></th>
                <th align="center" colspan="4" style="background-color:lightyellow"><b>Viernes</b></th>     
                <th align="center" colspan="3" style="background-color:lightblue"><b>Sábado</b></th>
                <th align="center" colspan="3" style="background-color:lightgreen"><b>Domingo</b></th>
                <th align="center"><b>Notas</b></th>
            </tr>
            <tr> 
                <th>HORA SUGERIDA </th> 
                <td align="center" style="background-color:lightblue"><b>10:00</td><td style="background-color:lightblue">14:00</td><td style="background-color:lightblue">16:00 </td>
                <td align="center" style="background-color:lightyellow"><b>10:00</b></td><td style="background-color:lightyellow">14:00</td><td style="background-color:lightyellow">16:00</td>
                <td align="center" style="background-color:lightgreen" ><b>10:00</b></td style="background-color:lightgreen"><td style="background-color:lightgreen">14:00</td><td style="background-color:lightgreen">16:00</td>
                <td align="center" style="background-color:lightblue" ><b>10:00</b></td style="background-color:lightblue"><td style="background-color:lightblue">14:00</td><td style="background-color:lightblue">16:00</td>
                <td align="center" style="background-color:lightyellow"><b>10:00</b></td style="background-color:lightyellow"><td style="background-color:lightyellow">14:00</td><td style="background-color:lightyellow">16:00</td><td style="background-color:lightyellow">18:00</td>
                <td align="center" style="background-color:lightblue"><b>7:30</b></td style="background-color:lightblue"><td style="background-color:lightblue">13:00</td><td style="background-color:lightblue">16:00</td>
                <td align="center" style="background-color:lightgreen"><b>7:30</b></td style="background-color:lightgreen"><td style="background-color:lightgreen">13:00</td><td style="background-color:lightgreen">16:00</td>
                <td align="left"><b>Notas</b> </td>
             </tr>';
           //</table>';
             
            
    $servername = "localhost";
        $username = "id637619_shimotos";
        $password = "ma3dampv";
        $dbname = "id637619_jwpubwit";
        //Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        //Check connection
        if (!$conn) 
            {    
                die("Connection failed: " . mysqli_connect_error());
                
            }

//require_once('mysql_connect.php');
//mysql_select_db('test');
//$query = "SELECT week_no, line_no, Mon, Tue, Wed, Thu, Fri, Sat, Sun, Notes from tbl_horario";
$query = "SELECT record_key,lugar,mo01,mo02,mo03,tu01,tu02,tu03,we01,we02,we03,ju01,ju02,ju03,vi01,vi02,vi03,vi04,sa01,sa02,sa03,do01,do02,do03,Notes from tbl_horario_publico";


   if ($data_set = mysqli_query($conn, $query)) 
        {   
            //echo '<br><br><br><table align="left" cellspacing="5" cellpadding="8">';
                            /// <td> <a href="inputform.php?">' . $row['lugar'] . '</a> </td><td width="5%"> '. $row['mo01'] .  '</td> <td width="5%"> '. $row['mo02'] .  '</td>';
            echo '<br><br>';
            while ($row = mysqli_fetch_array($data_set))
            {
                echo '<tr>
                    <td> <a href="inputform.php?record_key='. $row['record_key'] .'">' . $row['record_key'] . '</a>  ';
                    echo  '</td> <td width="5%"> ' . $row['mo01'] .  '</td> <td width="5%">' . $row['mo02'] .  '</td>' . '<td width="5%">'. $row['mo03']  ;
                    echo  '</td> <td width="5%">' .  $row['tu01'] . '</td> <td width="5%">' . $row['tu02'] . '</td>' . '<td width="5%"> '. $row['tu03'] ;
                    echo  '</td> <td width="5%"> ' . $row['we01'] . '</td> <td width="5%"> ' . $row['we02'] . '</td>' .  '<td width="5%"> '. $row['we03'] ;
                    echo  '</td> <td width="5%"> ' . $row['ju01'] . '</td> <td width="5%"> ' . $row['ju02'] . '</td>' .  '<td width="5%"> '. $row['ju03'] ;
                    echo  '<td width="5%"> '. $row['vi01'] . '</td> <td width="5%"> '. $row['vi02'] . '</td>' . '</td> <td width="5%"> '. $row['vi03'] . '<td width="5%"> '. $row['vi04'] . '</td>';
                    echo  '</td>  <td width="5%"> '. $row['sa01'] . '</td> <td width="5%"> '. $row['sa02'] . '</td>'. '<td width="5%"> '. $row['sa03'] ;
                    echo  '</td>  <td width="5%"> '. $row['do01'] . '</td> <td width="5%"> ' . $row['do02'] . '</td>  <td width="5%"> ' . $row['do03'] . '</td> <td width="5%"> ' . $row['Notes'] . '</td>';
                echo '</tr>';
            }
            echo '</table>';
        } else 
            {    
                echo "Error: " . $sql . "<br>" . mysqli_error($conn); 
            }
            
?>
