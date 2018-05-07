<?php 
	namespace App\Sistema;
	if ( ! defined('SEGURIDAD')) exit('Error, no tiene permiso para acceder');
	use \App\Nucleo\base_controlador;
	use App\Sistema\clsConfiguracion;
	class corConfiguracion extends base_controlador{
		private $nombreClase;
		private $objConfiguracion;
		public function __construct(){
			parent::__construct();
			$this->objConfiguracion = new clsConfiguracion;
		}
		public function inicio(){
			$datos = $this->objConfiguracion->_listar();
			$datos = array_merge($datos);
			$this->imprimirVista("configuracion",$datos,array("titulo"=>"configuracion","h1"=>"Leonardo Alvarado"));
		}
		public function guardar(){
			$this->imprimirVista("configuracion.guardar",array(),array("titulo"=>"configuracion","h1"=>"Leonardo Alvarado"));
		}

	}
 ?>