<?php 
	namespace App\Nucleo;
	if ( ! defined('SEGURIDAD')) exit('Error, no tiene permiso para acceder');
	/**
	* clase BD que será instanciada no heradad por cada motor
	* @author Leonardo Alvarado
	* @package bd
	* @subpackage index
	*/
	
	class BD {
		private $bd;
		private $consulta;
		private $motor;

		public function __construct() {
			if( defined(motorbd)) throw new Exception("no se ha definido el motor de base de datos por favor corregir esto en nucleo/config.php");
			$this->motor = motorbd;
			require_once($this->motor."/index.php");
			$instancia  = "App\Nucleo\\$this->motor";
			$this->bd = new $instancia;
			$this->bd->_conexion();
		}
		public function _ejecutar($sql) {
			$this->consulta = $this->bd->_ejecutarSQL($sql);
			return $this->bd->_filasAfectadas();
		}
		public function _arreglo($sql,$tipo) {
			return $this->bd->_arreglo($sql,$tipo);
		}
		public function _matriz($sql,$tipo,$posicion="") {
			return $this->bd->_matriz($sql,$tipo,$posicion);
		}
	}