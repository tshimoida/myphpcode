<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Informe de Servicio (GRUPO MARPOLE)</title>
    </head>
    <body>


<style>
.error {color: #FF0000;}
</style>
<hr>

<?php
        // define variables and set to empty values
$nameErr = $monthErr = $publicationsErr =  $videoErr =  $hrsErr =  $rvsErr =  $studiesErr = $commentsErr="";
$name = "" ;$month = ""; $publications = 0; $videos = 0; $hrs = 0; $rvs  = 0; $studies = 0; $comments="";
$email="";
$error = false;

//if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (!empty($_POST['submitted']))
{
    
      if (empty($_POST["name"])) {
        $nameErr = "Escriba su nombre";
        $error = true;
      } else {
        $name = test_input($_POST["name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
          $nameErr = "Solo se permite letras y espacios en blanco";
          $error = true;
        }
      }
  
      if (empty($_POST["month"])) {
        $monthErr = "Escriba el mes";
        $error = true;
      } else {
        $month = test_input($_POST["month"]);
      // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$month)) {
          $monthErr = "Solo se permite letras. Ej: Enero, Jan, etc."; 
            $error = true;
        }
      }
    
      if (empty($_POST["publications"])) {
        $publications = 0;
      } else {
        $publications = test_input($_POST["publications"]);
        // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
        if (!preg_match('/^[0-9]*$/',$publications)) {
          $publicationsErr = "Ingrese la cantidad de publicaciones en numeros";
           $error = true;
        }
      }
  
      if (empty($_POST["videos"])) {
        $videos = 0;
      } else {
        $videos = test_input($_POST["videos"]);
        if (!preg_match('/^[0-9]*$/',$videos)) {
          $videoErr = "Ingrese la cantidad de videos en numeros";
           $error = true;
        }    
      }

        if (empty($_POST["hrs"])) {
        $hrsErr = "Por favor ingrese el numero de horas";
        $error = true;
      } else {
        $hrs = test_input($_POST["hrs"]);
        if (!preg_match('/^[0-9]*$/',$hrs)) {
          $hrsErr = "Ingrese la cantidad de horas en numeros";
           $error = true;
        }
      }
 
        if (empty($_POST["rvs"])) {
        $rvs = 0;
      } else {
        $rvs = test_input($_POST["rvs"]);
        if (!preg_match('/^[0-9]*$/',$rvs)) {
          $rvsErr = "Ingrese la cantidad revisitas en numeros";
           $error = true;
        }
      }
  
    if (empty($_POST["studies"])) {
        $studies = 0;
      } else {
        $studies = test_input($_POST["studies"]);
        if (!preg_match('/^[0-9]*$/',$studies)) {
          $studiesErr = "Ingrese la cantidad de estudios en numeros";
           $error = true;
        }
      }
  
      if (empty($_POST["comments"])) {
        $comments = "";
      } else {
        $comments = test_input($_POST["comments"]);
      }

      if (empty($_POST["email"])) {
        $email = "";
      } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
             $emailErr = "No parece ser un correo electronico valido"; 
             $error = true;
            }        
      }


    
    if ($error==false)
    {
        echo "<img src='muchas_gracias.jpg' alt='Reporte' style='width:140;height:120px;'>";
        echo '<strong> Por su informe </strong> ' . $name . '!';
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
         
        $sql = "INSERT INTO tbl_informe (name,month,publications,videos,hrs,rvs,studies,comments,email) VALUES ('". $name. "','". $month ."',".$publications .",". $videos . "," .$hrs . "," . $rvs . "," .$studies .",'" . $comments . "','" . $email . "')" ;
        
        if (mysqli_query($conn, $sql)) 
            {    echo "<br><br> <strong>" . $name . " su reporte de  <u>" . $month . "</u> ha sido enviado exitosamente a su conductor. </strong><br><br>";
                 ?>&nbsp &nbsp <button type="button"   onclick="window.open('', '_self', ''); window.close();">Cerrar Ventana</button> <?php
                
            } else 
                {    
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn); 
                }
            
            
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
        //echo '<br><br> <nav>     <a href="/"><= Regresar a la pagina principal</a>     </nav>';
        //echo '<br><br> <a href="/" target="_blank"><button><= Regresar a la pagina principal</button> </a>';
        die();
        
    }

  }


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

    <h2>INFORME DE PREDICACION</h2>
    <img src='service_report.jpg' alt='Reporte' style='width:60;height:60px;'>
    <p><span class="error">* Campos mandatorios (required field)</span></p>

    <form action='?' id='entryform' method="post">
          Nombre: <input type="text" name="name" value="<?php echo $name;?>">
          <span class="error">* <?php echo $nameErr;?></span>
          <br><br>
          Mes: <input type="text" name="month" value="<?php echo $month;?>">
          <span class="error">* <?php echo $monthErr;?></span>
          <br><br>
          Publicaciones: <input type="text" name="publications" value="<?php echo $publications;?>">
          <span class="error"><?php echo $publicationsErr;?></span>
          <br><br>
          Presentaciones de videos: <input type="text" name="videos" value="<?php echo $videos;?>">
          <span class="error"><?php echo $videoErr;?></span>
          <br><br>
           Horas: <input type="text" name="hrs" value="<?php echo $hrs;?>">
          <span class="error">* <?php echo $hrsErr;?></span>
          <br><br>
          Revisitas: <input type="text" name="rvs" value="<?php echo $rvs;?>">
          <span class="error"><?php echo $rvsErr;?></span>
          <br><br>  
          Numero de diferentes estudios biblicos dirigidos: <input type="text" name="studies" value="<?php echo $studies;?>">
          <span class="error"><?php echo $studiesErr;?></span>
          <br><br>  
          Comentarios: <textarea name="comments" rows="5" cols="40"><?php echo $comments;?></textarea>
          <br><br>
          Quiero recibir una copia de mi informe por email: <input type="email" name="email" value="<?php echo $email;?>"> (Por ejemplo: juanita@gmail.com)
          <span class="error"><?php echo $emailErr;?></span>
          <br><br>
             <div style="background-color:lightblue">
                 <input type="submit" name="submitted" id='submit' value="Enviar">  
             </div>
    </form>
<br><br><br>
<img src="https://qrtag.net/api/qr_4.png?url=https://toshi.000webhostapp.com/service_report/index.php" alt="qrtag">

