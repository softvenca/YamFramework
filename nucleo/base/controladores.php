<?php 
	namespace App\Nucleo;
	if ( ! defined('SEGURIDAD')) exit('Error, no tiene permiso para acceder');
	use App\Nucleo\motorPlantilla;

	/**
	* base para los controladores que debe ser extendida por todos los controladores del sistema para su respectivo funcionanmiento
	* @author Leonardo Alvarado
	* @package Nucleo
	* @subpackage base
	*/
	class base_controlador {
		public $plantilla;
		public function __construct() {
			$this->plantilla = new motorPlantilla;
		}

		public function imprimirVista($archivo,$variables,$variablesPlantilla) {
	        $vista = VISTAPATH.$archivo.".php";
	        $this->plantilla->_usarPlantilla($variablesPlantilla);
	        echo $this->plantilla->renderizar($vista,$variables);
	        $this->plantilla->_tomarPie();
		}
	}
?>