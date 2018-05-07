<?php 
	namespace App\Nucleo;
	if ( ! defined('SEGURIDAD')) exit('Error, no tiene permiso para acceder');
	/**
	* clase que maneja el motor de plantillas
	* @author Leonardo Alvarado
	* @package Nucleo
	* @subpackage base
	*/
	class motorPlantilla{

		public function _usarPlantilla($variables){
			extract($variables);
			$controlArchivo = fopen(PLANTILLA."cabecera.html","r");
	        $cabecera = fread($controlArchivo,2048);
			foreach($variables as $llave => $valor){
	        	$cabecera =str_replace("{{".$llave."}}", $valor,$cabecera);
	        }
	        echo $cabecera;
		}
		public function _tomarPie(){
			require_once(PLANTILLA."pie.html");
		}

		function mostrarVariable($name) {
	        if (isset($this->dato[$name])) {
	            echo $this->dato[$name];
	        } else {
	            echo '{{' . $name . '}}';
	        }
	    }
	    function apilar($elemento) {
	        $this->pila[] = $this->dato;
	        foreach ($elemento as $k => $v) {
	            $this->dato[$k] = $v;
	        }
	    }
	    function desapilar() {
	        $this->dato = array_pop($this->pila);
	    }
	    function renderizar($ruta, $dato) {
	    	ob_start();
	    	include $ruta;
	        $plantilla = ob_get_contents();
	        $this->dato = $dato;
	        $this->pila = array();
	        foreach($this->dato as $llave => $valor){	        	
	        	$plantilla =str_replace("{{".$llave."}}", $valor,$plantilla);
	        	if(is_array($valor)){
	        		//$plantilla = str_replace("{{CICLO:".$llave."}}", "", $plantilla);
	        		//$plantilla = str_replace("{{ENDCICLO:".$llave."}}", "", $plantilla);
	        		/*foreach($valor as $key => $matriz){
	        			foreach($matriz as $index => $value){
	        				$plantilla =str_replace("{{".$index."}}", $value,$plantilla);
	        			}	
	        		}*/
	        		
	        	}
	        }
	        /*
	        	$plantilla = preg_replace('~\{{CICLO:(\w+)\}}~', '<?php foreach ($this->dato[\'$1\'] as $elemento): $this->apilar($elemento); ?>', $plantilla);
	        	$plantilla = preg_replace('~\{{ENDCICLO:(\w+)\}}~', '<?php $this->desapilar(); endforeach; ?>', $plantilla);
	        */
	        ob_end_clean();
	        return $plantilla;
	    }


	}
 ?>