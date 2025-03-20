<?php

session_start();

require_once "autoload.php";

require "config/config.php";

//aplicacion de los namespace (espacio de nombre)
use controllers\AuthController;
use controllers\DocenteControlller;

require "controllers/AuthController.php";

$request_uri = $_SERVER['REQUEST_URI']; 
//obtiene la url que pidio desde el navegador omitiendo el dominio, incluyendo
//los parametros y rutas.
//http://localhost/Login/admin/login
//no se tiene en cuenta el http://localhost/
//extrae /Login/admin/login

$base_path = '/Login'; // Directorio base de la aplicación
$path = str_replace($base_path, '', $request_uri);

$path = trim(parse_url($path, PHP_URL_PATH), '/');
//para el parse_url($path, PHP_URL_PATH) resultado /admin/login
//para terminar el trim() permite quitar simbolo / tanto al comienzo como
//al final entonces en este caso quedaria la respuesta
//respuestas: admin/login

switch ($path) {

    case '':
    case 'login':
        // Ruta por defecto - login de estudiantes
        require_once 'controllers/AuthController.php';
        $authController = new controllers\AuthController();
        $authController->login();
        break;
    


}




