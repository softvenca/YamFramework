<?php 
	namespace App\Nucleo;
	if ( ! defined('SEGURIDAD')) exit('Error, no tiene permiso para acceder');
	
	/**
	* prevenir el hackeo mediante SQLInjection
	* @author Leonardo Alvarado
	* @package Nucleo
	* @subpackage base
	*/
	class Hacking{
		public static function _analizar($dato){
			$ok = 0;
			$arraySQL = array("SELECT",";","INSERT","DROP","UPDATE","UNION","--","*","OR","'","=","WHERE","\\","\/","/","FROM","()","(",")","CONCAT","CONCAT_WS","user","version","database");
			$arrDatos = explode(" ",$dato);
			foreach ($arrDatos as $index => $valor) {
				$valorPreguntar = trim(strtoupper($valor));
				if(in_array($valorPreguntar, $arraySQL)){
					$ok = "1"; break 1;
				}
			}
			return $ok;
		}

		public static function _sanear($dato){
			$arraySQL = array("SELECT",";","INSERT","DROP","UPDATE","UNION","--","*","OR","'","=","WHERE","\\","\/","/","FROM","()","(",")","CONCAT","CONCAT_WS","user","version","database");
			$saneado = str_replace($arraySQL, "", $dato);
			return $saneado;
		}

		public static function _analizarURL($url){
			$url = $_SERVER["HTTP_HOST"];
		}

		public static function _sanearURL(){

		}
	}
?>