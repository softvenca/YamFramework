<?php if ( ! defined('SEGURIDAD')) exit('Error, no tiene permiso para acceder');
	/**
	* Core de la base inicial
	* @author Leonardo Alvarado
	* @package Nucleo
	*/
	require_once("nucleo/config.php");
	require_once("nucleo/constantes.php");
	error_reporting(ERRORES);
	date_default_timezone_set(TIMEZONE);
	putenv('TZ='.TIMEZONE);
	switch (AMBIENTE) {
		case 'desarrollo':
			ini_set("display_errors","on");
		break;
		case 'testeo':
		case 'produccion':
			ini_set("display_errors","off");
		break;
		default:
			throw new Exception("ambiente no definido, corregir esto en nucleo/constantes.php") ;
			exit;
	}
	/*FUNCIONES INICIALES PARA EL ARRANQUE*/
	require_once(COREPATH . "funciones.php");
	require_once(COREPATH . "bd/base_bd.php");
	require_once(COREPATH . "bd/index.php");
	/*BASE DE YAMFRAMEWORK*/
	require_once(COREPATH . "base/Hacking.php");
	require_once(COREPATH . "base/modelos.php");
	require_once(COREPATH . "base/plantilla.php");
	require_once(COREPATH . "base/controladores.php");
	/*LIBRERIAS THIRDPARTY*/
	//require_once(COREPATH . "libreria/GenerarCombos.php");
	//require_once(COREPATH . "libreria/Fecha.php");
	//require_once(COREPATH . "libreria/Validaciones.php");