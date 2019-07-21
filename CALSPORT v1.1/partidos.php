<?php 
include("conn/conectar.php");
$next_sunday = date('d-m-y', strtotime("next Sunday"));
$hora="10:30 AM";
$lugar="San Ignacio";
$cant_jug=10;

crear_partido($next_sunday." / ".$hora,$lugar,$cant_jug);

function crear_partido($fecha_hora,$lugar,$cant_jug){
	if($conn)
	{
	  //  echo("Connection Successfully<br>");
		echo("<br>");
		$seldb=mysql_select_db("CALSPORT",$conn);
		if($seldb)
		{
		   // echo("Database selected successfully<br>");
			$retrive=mysql_query("INSERT INTO partidos (fecha-hora, lugar, cant_jug VALUES ('".$fecha_hora."','".$lugar."',".$cant_jug."",$conn);
		}
		mysql_close($conn);
	}
}


?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Registro de Partido</title>
</head>

<body>
</body>
</html>