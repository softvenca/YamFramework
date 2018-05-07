<?php 
	namespace App\Sistema;
	if ( ! defined('SEGURIDAD')) exit('Error, no tiene permiso para acceder');
	use \App\Nucleo\base_modelo;
	class clsConfiguracion extends base_modelo{
		private $tabla;
		public function __construct(){
			parent::__construct();
			$this->tabla = "configuracion";
		}
		public function _listar(){
			return $this->bd->_arreglo("SELECT * FROM ".$this->tabla,"assoc");
		}
		public function _buscarPersonas(){
			return $this->bd->_matriz("SELECT * FROM persona","assoc","persona");
		}
	}