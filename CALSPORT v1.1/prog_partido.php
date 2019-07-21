<!doctype php>
<?php
//Modulo de envío de correo
funtion enviar($lista_jug,$de){
	require_once("Modulos/email/test_mail.php");
	require_once("Modulos/email/class.phpmailer.php");
	require_once("Modulos/email/class.smtp.php");
	$de = "erikdm@gmail.com";
	$para = "erikdm@gmail.com";
	$next_sunday = date('d-M-y', strtotime('next sunday'));
	$ns = date('Ymd', strtotime('next sunday'));
	$asunto = "Partido SI / Domingo ".$next_sunday." / 10:30 AM";
	$lista = "<h1><strong>Partido Domingo ".$next_sunday." / San Ignacio / 10:30 AM</strong></h1>"
			."<br><br>"
			. $lista_jug . "<br>"
			."<a href='http://www.google.com/calendar/event?action=TEMPLATE&text=Pichanga+Dominical&dates=".$ns."T133000Z/".$ns."T153000Z"."&details=Pichanga!!&location=San+Ignacio+del+bosque,+santiago&trp=false&sprop=&sprop=name:'target='_blank' rel='nofollow'><img src='dlasociados.dyndns.info/CALSPORT/gmail_event/gc_button6.gif' width='114' height='36' alt=''/></a>";
	if(isset($_GET["enviar"]) or $argv[1]="enviar"){
		if(enviar_mail2($de,$para,$asunto,$lista,"")){		
			echo "&nbsp;&nbsp;<b><h2><font face='Verdana'>Mensaje enviado</font></h2></b>";
			}else{
				echo "Mensaje no enviado<br>";
			}
		}else{
			echo "Envio desactivado<br>";
		}
	}

funtion consulta_jug($id_partido){
	include("conn/conectar.php");
	if ($db_found) {

	$SQL = "SELECT jugadores.ing_partido, usuarios.nombre, jugadores.asiste FROM usuarios,jugadores WHERE idpartido = ".$id_partido." ORDER BY ing_partido ASC";
	$result = mysql_query($SQL);
	$lista = "";

	if($result)
	        {
	            $lista = "Lista de Invitados<br>";
	            
				$lista = $lista . "<table>";  
				$lista = $lista .  "<tr>";  
				$lista = $lista .  "<th>#</th>";  
				$lista = $lista .  "<th>Nombre</th>"; 
				$lista = $lista .  "<th>Confirmado</th>";
				$lista = $lista .  "<th> Confirmar" 
				$lista = $lista .  "</tr>";  
				while ($row = mysql_fetch_row($result)){   
					$lista = $lista .  "<tr>";  
					$lista = $lista .  "<td>".$row[0]."</td>";  
					$lista = $lista .  "<td>".$row[1]."</td>";  
					$lista = $lista .  "<td>".$row[2]."</td>";
					if($row[2] = "no"){
					$lista = $lista .  "<td><a href='http://dlasociados.dyndns.info/CALSPORT/aceptar_partido.php?id_partido=".$id_partido.",nombre=".$row[1]."> Confirmar </a>"; 	
					}
					$lista = $lista .  "</tr>";  
				}  
				$lista = $lista .  "</table>";

	}
	enviar($lista,"erikdm@gmail.com")
	mysql_close($conn);

	}
	else {

	print "Database NOT Found ";
	mysql_close($db_handle);

	}
}


?> 
