<?php 
	namespace App\Nucleo;
	class Fecha{
		public static function _voltearFecha($fecha,$sep="-"){
			if(empty($fecha)){
				throw new Exception("FECHA MAL FORMATEADA");
			}else{
				$arrFecha = explode($sep,$fecha);
				if(count($arrFecha)!=3) throw new Exception("FECHA MAL FORMATEADA");
				else{
					return implode("-", array_reverse($arrFecha));
				}
			}
			return;
		}
		public static function _restarFechas($fecha1,$fecha2){

		}
		public static function _sumarFechas($fecha1,$fecha2){

		}
		public static function _compararFecha($fecha1,$fecha2){

		}
		public static function _obtenerFechaHora(){
			$mes = array("-","enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre");
			$dia = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");

			$gisett=(int)date("w");
			$mesnum=(int)date("m");
			$hora = date(" H:i",time());

			$arreglo = array("diaLetra"=>$dia[$gisett],"mes"=>$mes[$mesnum],"hora"=>$hora);

			return $arreglo;
		}
	}

 ?>