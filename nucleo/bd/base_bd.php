<?php 
	namespace App\Nucleo;
	/**
	* interface base de las funciones para los motores de bases de datos
	* @author Leonardo Alvarado
	* @package bd
	* @subpackage base_bd
	*/
	interface base_bd{
		public function _conexion();
		public function _ejecutarSQL($sql);
		public function _arreglo($sql,$tipo);
		public function _matriz($sql,$tipo,$posicion);
		public function _filasAfectadas();
	}