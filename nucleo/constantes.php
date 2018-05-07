<?php if ( ! defined('SEGURIDAD')) exit('Error, no tiene permiso para acceder');
	/**
	* Constantes para iniciar la aplicación que no será vista desde el cliente
	* @author Leonardo Alvarado
	* @package Nucleo
	* @subpackage constantes
	*/
	define("DS",DIRECTORY_SEPARATOR);
    define("PATH",dirname(dirname(__FILE__)).DS);
	define("AMBIENTE","desarrollo");
	define("ERRORES",E_ALL & ~E_STRICT & ~E_DEPRECATED);
	define("COREPATH",PATH . "nucleo/");
	define("APPPATH",PATH . "aplicacion/");
	define("CORPATH",APPPATH . "controlador/");
	define("CLASESPATH",APPPATH . "modelo/");
	define("VISTAPATH",APPPATH . "vista/");
	define("CCSPATH",PATH . "public/css/");
	define("PLANTILLA",COREPATH."plantilla/base/");
	define("JSPATH",PATH . "public/js/");
	define("JPGPATH",PATH . "public/img/jpg/");
	define("GIFPATH",PATH . "public/img/png/");
	define("PNGPATH",PATH . "public/img/gif");
	define("TIMEZONE","America/Caracas");
	define("motorbd",$config["motorbd"]);
	define("servidor",$config["servidor"]);
	define("usuario",$config["usuario"]);
	define("clave",$config["clave"]);
	define("bd",$config["bd"]);
?>