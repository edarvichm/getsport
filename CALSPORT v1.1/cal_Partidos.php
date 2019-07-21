<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Correo Pichangas Dominicales</title>
</head>

<body>
<p>
<?php /*

$servername = "localhost";
$username = "root";
$password = "dlasociados";

try {
    $conn = new PDO("mysql:host=$servername;dbname=CALSPORT", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
	
//tomamos los datos del archivo conexion.php  
//include("conexion.php");   
//$link = Conectarse();  
//se envia la consulta 
$result = mysql_query("SELECT * FROM usuarios ORDER BY codigo_usuario ASC", $conn);  
//se despliega el resultado  
echo "<table>";  
echo "<tr>";  
echo "<th>Nombre</th>";  
echo "<th>email</th>";  
echo "</tr>";  
while ($row = mysql_fetch_row($result)){   
    echo "<tr>";  
    echo "<td>$row[0]></td>";  
    echo "<td>$row[1]</td>";  
    echo "</tr>";  
}  
echo "</table>"; 
	 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
  
 
 */

?>

<?php
require_once("Modulos/email/fns_mail.php");
require_once("Modulos/email/class.phpmailer.php");
require_once("Modulos/email/class.smtp.php");
	$de = "erikdm@gmail.com";
	//$para = "erikdm@gmail.com";
	//$para = "marcelo@ixion.cl";
	//$para_copia = "contraloria@mornasco.cl";
	$next_sunday = date('d-M-y', strtotime('next sunday'));
	$ns = date('Ymd', strtotime('next sunday'));
	$asunto = "Partido SI / Domingo ".$next_sunday." / 10:30 AM";
	$cuerpo = "<h1><strong>Partido Domingo ".$next_sunday." / San Ignacio / 10:30 AM</strong></h1>"
			."<br><br>"
			."<a href='http://www.google.com/calendar/event?action=TEMPLATE&text=Pichanga+Dominical&dates=".$ns."T133000Z/".$ns."T153000Z"."&details=Pichanga!!&location=San+Ignacio+del+bosque,+santiago&trp=false&sprop=&sprop=name:'target='_blank' rel='nofollow'><img src='dlasociados.dyndns.info/CALSPORT/gmail_event/gc_button6.gif' width='114' height='36' alt=''/></a>";
			
	
	
if(isset($_GET["enviar"]) or $argv[1]="enviar"){
	if(enviar_mail2($de,$para,$asunto,$cuerpo,"")){		
		echo "&nbsp;&nbsp;<b><h2><font face='Verdana'>Mensaje enviado</font></h2></b>";
	}else{
		echo "Mensaje no enviado<br>";
	}
}else{
	echo "Envio desactivado<br>";
}
?>
</p>
<p>Sistema de Envío Automático  de Correo para Organizar Partidos de Baby Futbol.</p>
<form id="form1" name="form1" method="post">
  <p>
    <label for="textfield">Asunto:</label>
    <input name="textfield" type="text" disabled id="textfield" value="<?php echo "Partido SI / Domingo ".$next_sunday." / 10:30 AM" ?>" size="100">
  </p>
  <p>
    <label for="agr_nombre">Agregar Jugador:</label>
    (PROXIMAMENTE)<br>
    Nombre:
<input type="text" name="agr_nombre" id="agr_nombre">
    <br>
    <label for="agr_email">Email:</label>
    <input type="email" name="agr_email" id="agr_email">
  </p>
  <p>
    <input type="submit" name="ingjug" id="ingjug" value="Ingresar Jugador">
  </p>
</form>
<p><a href="http://dlasociados.dyndns.info/CALSPORT/cal_Partidos.php?enviar"><strong>Enviar Correo</strong></a></p>
<p>
  <?php 
include("conn/conectar.php");
if ($db_found) {

$SQL = "SELECT * FROM usuarios ORDER BY codigo_usuario ASC";
$result = mysql_query($SQL);

if($result)
        {
            echo("Lista de Invitados<br>");
            
			echo "<table>";  
			echo "<tr>";  
			echo "<th>ID</th>";  
			echo "<th>Nombre</th>";  
			echo "</tr>";  
			while ($row = mysql_fetch_row($result)){   
				echo "<tr>";  
				echo "<td>$row[0]></td>";  
				echo "<td>$row[1]</td>";  
				echo "</tr>";  
			}  
			echo "</table>";

/*while ( $db_field = mysql_fetch_assoc($result) ) {

print $db_field['ID'] . "<BR>";
print $db_field['First_Name'] . "<BR>";
print $db_field['Surname'] . "<BR>";
print $db_field['Address'] . "<BR>";
*/
}

mysql_close($conn);

}
else {

print "Database NOT Found ";
mysql_close($db_handle);

}

/*if($conn)
{
  //  echo("Connection Successfully<br>");
	echo("<br>");
    $seldb=mysql_select_db("CALSPORT",$conn);
    if($seldb)
    {
       // echo("Database selected successfully<br>");
        $retrive=mysql_query("SELECT * FROM usuarios ORDER BY codigo_usuario ASC",$conn);
        if($retrive)
        {
            echo("Lista de Invitados<br>");
            
			echo "<table>";  
			echo "<tr>";  
			echo "<th>ID</th>";  
			echo "<th>Nombre</th>";  
			echo "</tr>";  
			while ($row = mysql_fetch_row($retrive)){   
				echo "<tr>";  
				echo "<td>$row[0]></td>";  
				echo "<td>$row[1]</td>";  
				echo "</tr>";  
			}  
			echo "</table>";                     
        }
        else
        {
        echo "Table not inserted";
        }
        }
        else
        {
            die("database not selected");
        }
    }
    else
    {
        die("connection faild");    
    }
    mysql_close($conn);*/ ?>
</p>
<p>&nbsp;</p>
<form id="form2" name="form2" method="post">
  <label for="textfield2">correo:</label>
  <input type="text" name="textfield2" id="textfield2">
  <input type="button" name="button" id="button" value="Enviar">
</form>
</body>
</html>
