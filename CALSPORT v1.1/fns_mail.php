<?PHP

function enviar_mail($de,$para,$asunto,$cuerpo,$archivo='')
	{
/*$mail­>CharSet = "UTF­8";
$mail­>Encoding = "quoted­printable";*/
	global $cuerpo_enviado;
	if (is_array($de))
		{
		foreach ($de as $de_nombre => $de_correo)
			{
		    }
		}
	else
		{
		$de_correo = $de;
		$de_nombre = $de_correo;
		}
	$cuerpo = str_replace("\r\n", '<br>',$cuerpo);
	//cambiar fuente de texto al cuerpo
	$cuerpo = '<font face="Verdana" size="2">'.$cuerpo.'</font>';
	$cuerpo = '<html><head>'.$cuerpo.'</body></html>';
	// Enviarlo
	$mail = new PHPMailer();
	$mail->IsSMTP();                                   // send via SMTP
	$mail->Host     = "200.63.97.46"; //"200.63.99.229";    //"200.63.97.46"; // SMTP servers pueden ser 2 "mail.arquicomp.org;smtp2.site.com"
	$mail->SMTPAuth = true;     // turn on SMTP authentication
	//$mail->SMTPSecure = "tls";
	$mail->Username = "documentoselectronicos@mornasco.cl";  // SMTP username
	$mail->Password = "doc2014"; // SMTP password
	$mail->From     = "documentoselectronicos@mornasco.cl";
	if($archivo) {

             $mail->AddAttachment($archivo);

   	}
	//$mail->From     = $de;
	//$mail->FromName = "CREAWEB";
	if (is_array($de))
	{
		foreach ($de as $de_nombre => $de_correo)
		{
			$mail->FromName = $de_correo;
		}
	}
	else
	{
		$mail->FromName = $de;
	}
	if (is_array($para))
	{
		foreach ($para as $nombre => $correo)
		{
			$mail->AddAddress($correo,$nombre);
		}
	}
	else
	$mail->AddAddress($para);
	if (is_array($de))
	{
		foreach ($de as $de_nombre => $de_correo)
		{
			$mail->AddReplyTo($de_correo,$de_nombre);
		}
	}
	else
	{
		$de_correo = $de;
		$de_nombre = $de_correo;
		$mail->AddReplyTo($de_correo,$de_nombre);
	}
	$mail->WordWrap = 50;                              // set word wrap
	//$mail->AddAttachment("/var/tmp/file.tar.gz");      // attachment
	//$mail->AddAttachment("/tmp/image.jpg", "new.jpg");
	$mail->IsHTML(true);                               // send as HTML
    //agregar copia oculta
   	//$mail->AddBcc('estrelladebelen@arquicomp.cl');
	$mail->Subject  =  $asunto;
	$mail->Body     =  $cuerpo;
	$mail->AltBody  =  "";//$cuerpo_txt.$firma_txt;
	if(!$mail->Send())
	return false;
	else
	$cuerpo_enviado = $cuerpo;
	return true;
	}


function enviar_mail2($de,$para,$asunto,$cuerpo,$archivo=''){
$mail             = new PHPMailer();

$body             = $cuerpo;
$body             = eregi_replace("[\]",'',$body);

$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host       = "mail.yourdomain.com"; // SMTP server
$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
                                           // 1 = errors and messages
                                           // 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
//$mail->Host = 'ssl://smtp.gmail.com';
$mail->Port       = 465;                   // set the SMTP port for the GMAIL server
$mail->Username   = "erikdm@gmail.com";  // GMAIL username
$mail->Password   = "pdvfgqumnbohkhgn";            // GMAIL password

$mail->SetFrom($de, 'Erik Darvich M.');

$mail->AddReplyTo("","Erik Darvich M.");

$mail->Subject    = $asunto;

$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

$mail->MsgHTML($body);

$address = $para;
//correos en duro, se debe agregar funcionalidad para que se obtengan desde BD CALSPORT
$mail->AddAddress("fjdonoso1@gmail.com", "Francisco Donoso");
$mail->AddCC("erikdm@gmail.com", "Erik Darvich Matte");
$mail->AddCC("deathster.gb@gmail.com", "Gabriel Andrés Del Canto Lagos");
$mail->AddCC("sbichett@gmail.com", "Sebastián León");
$mail->AddCC("alejandropardo72@gmail.com", "Alejandro Pardo");
$mail->AddCC("freyesc@gmail.com", "Felipe Reyes Cosmelli");

$mail->AddCC("gesteffa@gmail.com", "Gabriel Esteffan");
$mail->AddCC("matias.gonzalmar@gmail.com", "matias gonzalez");
$mail->AddCC("mperezsaavedra@gmail.com", "manuel perez saavedra");
$mail->AddCC("condornoe@hotmail.com", "Cristian Donoso");
$mail->AddCC("herrerov@gmail.com", "Victor Herrero");
$mail->AddCC("rolecat@gmail.com", "Rodrigo Leppe");
$mail->AddCC("fjdonoso1@gmail.com", "Francisco Donoso");
$mail->AddCC("lucas_he_fu@hotmail.com", "lucas herrero");
$mail->AddCC("marcovalenzuela14@hotmail.com", "Marco Antonio Valenzuela");
$mail->AddCC("felipe.pumarino@gmail.com", "Felipe Pumarino");
$mail->AddCC("jorgeleonbichett@gmail.com", "Jorge León");
$mail->AddCC("jose0latorre@gmail.com", "José Latorre Muzzio");

//$mail->AddAttachment("images/phpmailer.gif");      // attachment
//$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment

if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo; return false;
} else {
  echo "Message sent! Juegue!!!"; return true;	
}

}	
?>