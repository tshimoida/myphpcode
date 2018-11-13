<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>EDITAR LUGAR PUBLICO</title>
    </head>
    <body>


<style>
.error {color: #FF0000;}
</style>


<?php

session_start();

global $record_key;
global $lugar;
if (isset($_GET['record_key'])) {
    $record_key = $_GET['record_key'];
    
    }
    
echo '  <table id="entrytable">';
echo '<tr>';
echo '<th>  Editando Lugar: ' . $record_key .'</th>';
echo '</tr> </table>';
echo 'your ip address: ' . $_SERVER['REMOTE_ADDR'] ;
$lugar = $record_key;


        // define variables and set to empty values

$mo01 = "" ;$mo02  = ""; $mo03  = ""; $tu01  = ""; $tu02 = ""; $tu03  = ""; $we01 = ""; $we02=""; $we03="";$ju01 = ""; $ju02=""; $ju03="";
$vi01 ="" ; $vi02 =""; $vi03 =""; $sa01=""; $sa02="";$sa03=""; $do01 =""; $do02=""; $do03;
$email="";
$error = false;

//if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (!empty($_POST['submitted']))
{
    
      //if (empty($_POST["mo01"])) 
     // {
            //nothing
     // } else {
        $mo01 = test_input($_POST["mo01"]);
        $tu01 = test_input($_POST["tu01"]);
        $we01 = test_input($_POST["we01"]);
        $ju01 = test_input($_POST["ju01"]);
        $vi01 = test_input($_POST["vi01"]);
        $sa01 = test_input($_POST["sa01"]);
        $do01 = test_input($_POST["do01"]);

        $mo02 = test_input($_POST["mo02"]);
        $tu02 = test_input($_POST["tu02"]);
        $we02 = test_input($_POST["we02"]);
        $ju02 = test_input($_POST["ju02"]);
        $vi02 = test_input($_POST["vi02"]);
        $sa02 = test_input($_POST["sa02"]);
        $do02 = test_input($_POST["do02"]);

        $mo03 = test_input($_POST["mo03"]);
        $tu03 = test_input($_POST["tu03"]);
        $we03 = test_input($_POST["we03"]);
        $ju03 = test_input($_POST["ju03"]);
        $vi03 = test_input($_POST["vi03"]);
        $sa03 = test_input($_POST["sa03"]);
        $do03 = test_input($_POST["do03"]);

        $mo04 = test_input($_POST["mo04"]);
        $tu04 = test_input($_POST["tu04"]);
        $we04 = test_input($_POST["we04"]);
        $vi04 = test_input($_POST["vi04"]);
        $sa04 = test_input($_POST["sa04"]);
        $do04 = test_input($_POST["do04"]);

        $notes = test_input($_POST["notes"]);

        
        $record_key = test_input($_POST["key"]);
        $lugar = test_input($_POST["key"]);
        $TimeStamp = test_input($_POST['TimeStamp']);
        //echo 'test record_key!: ' . $record_key;
    
      //}

      
    
    if ($error==false)
    {
        echo '<strong> Gracias por su fiel servicio en: </strong> ' . $record_key . '<br>';
       
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
        
    
    $query = "SELECT TimeStamp from tbl_horario_publico where record_key='" . $record_key. "'";


   if ($data_set = mysqli_query($conn, $query)) 
        {   
 
            echo '<br><br>';
            while ($row = mysqli_fetch_array($data_set))
            {
                $LatestTimeStamp = $row['TimeStamp'];
                         }
            echo '</table>';
        } else 
            {    
                echo "Error: " . $sql . "<br>" . mysqli_error($conn); 
            }
    
        if ($LatestTimeStamp > $TimeStamp)
        {
            //echo 'latest '.$LatestTimeStamp . ' lasttimestamp '.$TimeStamp;
            //echo '<br> Somebody has edited a new record. Try again! <br>';
            echo "<script type='text/javascript'>alert('Otro publicador(a) acaba de actualizar este lugar público. Inténtelo otra vez por favor.');</script>";
             echo '<META HTTP-EQUIV=REFRESH CONTENT="4; index.php">';
             die("try updating again");
        }
    
        
        $sql = "DELETE FROM tbl_horario_publico where record_key='" . $record_key ."'";
        if (mysqli_query($conn, $sql)) 
            {    
                //echo "<br> delete success <br>" ;
                
            } else 
                {    
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn); 
                }        
         
        $sql = "INSERT INTO tbl_horario_publico (record_key, lugar, mo01, mo02, mo03, tu01, tu02, tu03, we01, we02, we03, ju01, ju02, ju03, vi01, vi02, vi03, vi04, sa01, sa02, sa03, do01, do02, do03,Notes)
        VALUES ('". $record_key . "','". $lugar ."','".$mo01 ."','". $mo02 . "','" .$mo03 . "','" . $tu01 . "','" .$tu02 ."','" . $tu03 . "','" . $we01 . "','"  .  $we02 . "','" . $we03 . "','".  $ju01 . "','" . $ju02 . "','". $ju03 . "','".  $vi01 . "','" . $vi02 . "','". $vi03 . "','" . $vi04 . "','". $sa01 . "','" . $sa02 . "','" . $sa03 . "','" . $do01 . "','" . $do02 . "','" . $do03 . "','" . $notes . "')";
        
        
        if (mysqli_query($conn, $sql)) 
            {    echo "<br>" . $name . " horario publico  " . $month . " ha sido exitosamente actualizado.";
                
            } else 
                {    
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn); 
                }
    
    
        echo '<br><br> <nav>     <a href="index.php"><= Regresar a la pagina principal</a>     </nav>';
        
        // header("Location: https://toshi.000webhostapp.com/public_wit/index.php");
        echo '<META HTTP-EQUIV=REFRESH CONTENT="1; index.php">';
        //  exit();

       /*     
        $msg = "Service Report " . "\r\n";
        $msg = $msg  . "\r\n";
        $msg = $msg . $name . " submitted his/her for " . $month . " service report." . "\r\n";$msg = $msg . "Mes: " . $month . "\r\n" ;
        $msg = $msg . "Publicaciones: " . $publications . "\r\n" ;
        $msg = $msg . "Videos: " . $videos . "\r\n";$msg = $msg . "Horas: " . $hrs . "\r\n";$msg = $msg . "Revisitas: " . $rvs . "\r\n";$msg = $msg . "Estudios: " . $studies . "\r\n";$msg = $msg . "Comentarios: " . $comments . "\r\n";
        mail("hola.toshi@gmail.com","Service Report",$msg);
        
         if ($email != '') {
                mail($email,"Su informe de Servicio",$msg);
         }
        
        mysqli_close($conn);
        
        echo '<br><br> <a href="/" target="_blank"><button><= Regresar a la pagina principal</button> </a>';
        die();
        */
    }

  }


function test_input($data) {
  $data = trim($data);
  //$data = stripslashes($data);
 // $data = htmlspecialchars($data);
  return $data;
}


      
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


$query = "SELECT record_key,lugar,mo01,mo02,mo03,tu01,tu02,tu03,we01,we02,we03,ju01,ju02,ju03,vi01,vi02,vi03,vi04,sa01,sa02,sa03,do01,do02,do03,Notes,TimeStamp from tbl_horario_publico where record_key='" . $record_key. "'";


   if ($data_set = mysqli_query($conn, $query)) 
        {   
 
            echo '<br><br>';
            while ($row = mysqli_fetch_array($data_set))
            {
                $mo01 = $row['mo01'];
                $mo02 = $row['mo02'];
                $mo03 = $row['mo03'];
                $tu01 = $row['tu01'];
                $tu02 = $row['tu02'];
                $tu03 = $row['tu03'];
                $we01 = $row['we01'];
                $we02 = $row['we02'];
                $we03 = $row['we03']; 
                $ju01 = $row['ju01'];
                $ju02 = $row['ju02'];
                $ju03 = $row['ju03'];                 
                $vi01 = $row['vi01'];
                $vi02 = $row['vi02'];
                $vi03 = $row['vi03'];             
                $vi04 = $row['vi04'];
                $sa01 = $row['sa01'];
                $sa02 = $row['sa02'];
                $sa03 = $row['sa03'];    
                $do01 = $row['do01'];
                $do02 = $row['do02'];
                $do03 = $row['do03'];           
                $notes = $row['Notes']; 
                $TimeStamp = $row['TimeStamp'];
            }
            echo '</table>';
        } else 
            {    
                echo "Error: " . $sql . "<br>" . mysqli_error($conn); 
            }
echo 'timestamp ' . $TimeStamp;
?>


<style>
    table, th, td {
     border:  2px double black;
    border-collapse: collapse;
    }
table th {
        background-color: grey;
        color: white;
     }  
    </style>


<form action='?' id='entryform' method="post">

  <table align="left" cellspacing="5" cellpadding="8">
     <tr>
            <th align="left">Hora:</th>
            <th align="center" colspan="1" ><b>L u n e s </b></th>
            <th align="center" colspan="1" ><b>M a r t e s</b></th>
            <th align="center" colspan="1" ><b>M i e r c o l e s</b></th>
            <th align="center" colspan="1" ><b>J u e v e s</b></th>
            <th align="center" colspan="1" ><b>V i e r n e s  </b></th>     
            <th align="center" colspan="1" ><b>S a b a d o</b></th>
            <th align="center" colspan="1" ><b>D o m i n g o </b></th>
    </tr>
  <!---- </table>
  
 <table id="entrytable">
 -->
 
  <tr>
    <td style="background-color:lightgrey">   <b>8:00 / 10:00 </b>   </td> 
    <td> <textarea name="mo01" rows="4" cols="12"><?php echo  $mo01;?></textarea>       </td>
    <td>  <textarea name="tu01" rows="4" cols="12"><?php echo $tu01;?></textarea>       </td>
    <td>    <textarea name="we01" rows="4" cols="12"><?php echo $we01;?></textarea>     </td>
    <td>    <textarea name="ju01" rows="4" cols="12"><?php echo $ju01;?></textarea>     </td>
    <td>     <textarea name="vi01" rows="4" cols="12"><?php echo $vi01;?></textarea>    </td>
    <td>      <textarea name="sa01" rows="4" cols="12"><?php echo $sa01;?></textarea>   </td>
    <td>       <textarea name="do01" rows="4" cols="12"><?php echo $do01;?></textarea>  </td>
 </tr>
        
 
<tr>
    <td style="background-color:lightgrey"><b> 14: 00 </b></td>
    <td><textarea name="mo02" rows="4" cols="12"><?php echo $mo02;?></textarea>       </td>
    <td> <textarea name="tu02" rows="4" cols="12"><?php echo $tu02;?></textarea>      </td>
    <td>    <textarea name="we02" rows="4" cols="12"><?php echo $we02;?></textarea>   </td>
    <td>    <textarea name="ju02" rows="4" cols="12"><?php echo $ju02;?></textarea>   </td>    
    <td>     <textarea name="vi02" rows="4" cols="12"><?php echo $vi02;?></textarea>  </td>
    <td>      <textarea name="sa02" rows="4" cols="12"><?php echo $sa02;?></textarea> </td>
    <td>       <textarea name="do02" rows="4" cols="12"><?php echo $do02;?></textarea> </td>
</tr>

  <tr>
    <td style="background-color:lightgrey"><b> 16: 00 </b></td>
    <td><textarea name="mo03" rows="4" cols="12"><?php echo $mo03;?></textarea>     </td>
    <td> <textarea name="tu03" rows="4" cols="12"><?php echo $tu03;?></textarea>    </td>
    <td> <textarea name="we03" rows="4" cols="12"><?php echo $we03;?></textarea>  </td>
    <td> <textarea name="ju03" rows="4" cols="12"><?php echo $ju03;?></textarea>  </td>    
    <td> <textarea name="vi03" rows="4" cols="12"><?php echo $vi03;?></textarea> </td>
    <td> <textarea name="sa03" rows="4" cols="12"><?php echo $sa03;?></textarea>   </td>
    <td> <textarea name="do03" rows="4" cols="12"><?php echo $do03;?></textarea> </td>
  </tr>

  <tr>
    <td style="background-color:lightgrey"><b>18: 00 </b> </td>
    <td> <textarea disabled name="mo04" rows="4" cols="12"><?php echo $mo04;?></textarea>       </td>
    <td> <textarea disabled name="tu04" rows="4" cols="12"><?php echo $tu04;?></textarea>      </td>
    <td> <textarea disabled name="we04" rows="4" cols="12"><?php echo $we04;?></textarea> </td>
    <td> <textarea name="vi04" rows="4" cols="12"><?php echo $vi04;?></textarea>     </td>
    <td> <textarea disabled name="sa04" rows="4" cols="12"><?php echo $sa04;?></textarea>   </td>
    <td> <textarea disabled name="do04" rows="4" cols="12"><?php echo $do04;?></textarea>  </td>
  </tr>
 
   
 </table>  
 <br>
 <br><br><br><br><br>
 <br><br><br><br><br>
 <br><br><br><br><br>
 <br><br><br> <br><br>
 
 <table id="notes">
 
   <tr>
       

    <td style="background-color:lightblue"><b>Notas/Comentarios</b> </td>
    <td> <textarea name="notes" rows="1" cols="92"><?php echo $notes;?></textarea>       </td>
 
  </tr>

</table>
 

 <br><br>
     <input type="hidden" name="key" value="<?php $record_key; echo $record_key; ?>"> 
     <input type="hidden" name="TimeStamp" value="<?php $TimeStamp; echo $TimeStamp; ?>"> 

  <br><br>

  <div style="background-color:lightblue">

      &nbsp &nbsp   &nbsp &nbsp  <input type="submit" name="submitted" id='submit' value="Submit">  
         &nbsp   <input type="button" name="cancel" value="cancel" onClick="window.location='https://toshi.000webhostapp.com/public_wit/index.php';" />
</div>


</form>


