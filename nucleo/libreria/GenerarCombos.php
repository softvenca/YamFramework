<?php 
	namespace App\Nucleo;
	use App\Nucleo\base_modelo;
	class Combos{
		public function generarCombo($psSql,$psCampoClave,$pscampoDescripcion,$psMensaje=""){
			if($psMensaje!="") $lsDatos="<option value=''>".$psMensaje."</option>";
			$this->bd->ejecutar($psSql);
			while($laFila=$this->bd->arreglo()){
				$lsDatos.="<option value='".$laFila[$psCampoClave]."'>".trim($laFila[$pscampoDescripcion])."</option>";
			}
			echo $lsDatos;
		}
	}
?>