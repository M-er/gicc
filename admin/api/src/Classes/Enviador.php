<?php
namespace App;


/**
*
Clase Mailer para envio de mails de contacto
*
**/
class Enviador
{

	public function __construct($logger) {
		$this->logger = $logger;
		$this->logger->addInfo("inicializo enviador" );
	}
	public function enviar($request,  $response, array $args) {
		$this->logger->addInfo("entro en enviar" );
		$todo = $request->getParsedBody();
		$to = 'Secretaria GICC <gicc_recepcion@hotmail.com>';
		//$to = 'gicc_recepcion@hotmail.com';
		$subject = 'Mensaje del sitio GICCcom';
		$txt = 'Mensaje de '.$todo['nombre'].'. Telefono: '.$todo['telefono']. '\n Mensaje: '.$todo['mensaje'];
		$headers = "From: administracion@gicc.com.ar" . "\r\n";
		$exito=false;
		$exito=mail($to,$subject,$txt,$headers);
		if($exito)
		$rta="El correo ha sido enviado correctamente";
		else
		$rta="Hubo un problema, intentelo nuevamente.";
         return $response->withJson($rta);

	}

}
