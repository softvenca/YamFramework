<?php 
	namespace App\Nucleo;
	if ( ! defined('SEGURIDAD')) exit('Error, no tiene permiso para acceder');
	use App\Nucleo\BD;
	/**
	* base para inicializar todos los modelos de la aplicacion
	* @author Leonardo Alvarado
	* @package Nucleo
	* @subpackage base
	*/
	class base_modelo{
		private $intentoHackeo;
		protected $bd;
		public function __construct(){
			$this->bd = new BD;
		}
		public function __set($variable,$valor) {
	    	if (property_exists(__CLASS__, $variable)) {
	    		$hackeo = Hacking::_analizar($valor);
	    		if($hackeo==1) $this->intentoHackeo=1;
	    		$saneado = Hacking::_sanear($valor);
	    		$this->$variable = trim(filter_var($saneado,FILTER_SANITIZE_STRING));
	    	}
		}
		public function revisarHackeo(){
			return $intentoHackeo;
		}
	}