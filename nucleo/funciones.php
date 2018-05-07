<?php if ( ! defined('SEGURIDAD')) exit('Error, no tiene permiso para acceder');
	/**
	* funciones de uso global
	* @author Leonardo Alvarado
	* @package Nucleo
	* @subpackage funciones
	*/
	define("SEGUNDOS", 1);
    define("MINUTOS", 60 * SEGUNDOS);
    define("HORAS", 60 * MINUTOS);
    define("DIAS", 24 * HORAS);
    define("MESES", 30 * DIAS);

    function existe_modulo_apache($modulo){
        return (in_array($modulo, apache_get_modules()) ? true : false);
    }

	function obtenerModulo($nombreModulo){
		return in_array($nombreModulo, apache_get_modules());
	}
	function obtenerModulosApache(){
		return apache_get_modules();
	}

    function hacetiempo($time) {
    	$time = strtotime($time);
        $delta = time() - $time;

        if ($delta < 1 * MINUTOS){
            return $delta == 1 ? "en este momento" : "hace " . $delta . " segundos ";
        }
        if ($delta < 2 * MINUTOS){
            return "hace un minuto";
        }
        if ($delta < 45 * MINUTOS){
            return "hace " . floor($delta / MINUTOS) . " minutos";
        }
        if ($delta < 90 * MINUTOS){
            return "hace una hora";
        }
        if ($delta < 24 * HORAS){
            return "hace " . floor($delta / HORAS) . " horas";
        }
        if ($delta < 48 * HORAS){
            return "ayer";
        }
        if ($delta < 30 * DIAS){
            return "hace " . floor($delta / DIAS) . " dias";
        }
        if ($delta < 12 * MESES){
            $MESES = floor($delta / DIAS / 30);
            return $MESES <= 1 ? "el mes pasado" : "hace " . $MESES . " meses";
        }
        else{
            $years = floor($delta / DIAS / 365);
            return $years <= 1 ? "el año pasado" : "hace " . $years . " años";
        }
    	return 0;
    }

    function agregarModelos($path){
        $directorio = opendir(CLASESPATH);
        $noLeer = array(".","..");
        while($archivo = readdir($directorio)) {
            if(!in_array($archivo,$noLeer)) {
                if(is_dir($archivo)) {
                    agregarModelos($archivo);
                }else{
                    require CLASESPATH.$archivo;
                }    
            }
            
        }
        closedir($directorio);
    }