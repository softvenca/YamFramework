<?php 
	namespace App\Nucleo;
	if ( ! defined('SEGURIDAD')) exit('Error, no tiene permiso para acceder');
	
	use App\Nucleo\base_bd;
	/**
	* clase para el manejo del motor mysql mediante funciones nativas mysql de php
	* @author Leonardo Alvarado
	* @package bd
	* @subpackage mysql
	*/
	class mysql implements base_bd{
		private $Conex;
		public function _conexion() {
			$this->Conex = mysql_connect(servidor,usuario,clave);
			mysql_select_db(bd,$this->Conex);
		}
		public function _ejecutarSQL($sql) {
			if(AMBIENTE=="desarrollo"){
				$consulta = mysql_query($sql,$this->Conex);
				if(!$consulta){
					echo "SQL PROCESADA: <b>".$sql."</b><br />";
					exit($this->_error(mysql_error(),mysql_errno()));
				}
				return $consulta;
			}
			return mysql_query($sql,$this->Conex);
		}
		public function _filasAfectadas() {
			return mysql_affected_rows($this->Conex);
		}
		public function _arreglo($sql,$tipo="array") {
			$consulta = $this->_ejecutarSQL($sql);
			switch ($tipo) {
				case 'array': $arreglo = mysql_fetch_array($consulta); break;
				case 'assoc': $arreglo = mysql_fetch_assoc($consulta); break;
				case 'row': $arreglo = mysql_fetch_row($consulta); break;
				default:
					throw new Exception("EL TIPO DE ARREGLO QUE SOLICITA NO EXISTE");
			}
			return $arreglo;
		}
		public function _matriz($sql,$tipo,$posicion="") {
			$consulta = $this->_ejecutarSQL($sql);
			$matriz=array(); $matriz[$posicion] = array();
			switch ($tipo) {
				case 'array': 
					while($arreglo = mysql_fetch_array($consulta)) {
						array_push($matriz[$posicion], $arreglo);
					}
				break;
				case 'assoc': 
					while($arreglo = mysql_fetch_assoc($consulta)) {
						array_push($matriz[$posicion], $arreglo);
					}
				break;
				case 'row':   
					while($arreglo = mysql_fetch_row($consulta)) {
						array_push($matriz[$posicion], $arreglo);  
					}
				break;
				default:
					throw new Exception("EL TIPO DE ARREGLO QUE SOLICITA NO EXISTE");
			}
			return $matriz;
		}
		public function _error($error,$nro) {
			print("<font color='red' size='5'>ERROR de MySQL: {$error} Error No. {$nro}</font>");
		}
	}