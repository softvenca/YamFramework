<?php
    /*
    if(file_exists("install.php")){
        require_once("install.php");
    }else{
        if(isset($_SESSION["userTemporal"]) && !empty($_SESSION["userTemporal"])){ //inicia sesion por primera vez
    		include("temporal.php");
        }else{
    	    unset($_SESSION["userTemporal"]);
    	    if(isset($_SESSION["userActivo"]) && !empty($_SESSION["userActivo"])){
                if(isset($_SESSION["precargado"]) && $_SESSION["precargado"]==true)
                    require_once("vista/visIndex.php");
                else
                    require_once("preCarga.php");
    	    }else{
    	        require_once("vista/visLogin.php");
    	    }

    	}
    }
    */
    
    agregarModelos(CLASESPATH);

    if(isset($_GET["p"]) && !empty($_GET["p"])){
        $p = filter_input(INPUT_GET, "p",FILTER_SANITIZE_STRING);
        $controlador = "cor".ucfirst($p);
        $pathControlador = CORPATH."{$controlador}.php";
        if(is_file($pathControlador)) {
            require_once($pathControlador);
            $instancia = "\App\Sistema\\$controlador";
            $ObjControlador = new $instancia;
            if(isset($_GET["a"]) && !empty($_GET["a"])){
                call_user_method($_GET["a"], $ObjControlador);
            }else{
                $ObjControlador->inicio();
            }
        }else{
            exit("NO EXISTE LA VISTA");
        }
    }
    