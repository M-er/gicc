<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes
/**
* Example GET route
*
* @param  \Psr\Http\Message\ServerRequestInterface $req  PSR7 request
* @param  \Psr\Http\Message\ResponseInterface      $res  PSR7 response
* @param  array                                    $args Route parameters
*
* @return \Psr\Http\Message\ResponseInterface
*/
$app->get('/hello/{name}', "saludador:hola");
$app->post('/contacto', "enviador:enviar");
