<?php
session_start();


$do = (isset($_GET['do'])) ? $_GET['do'] : '';

switch($do){
    case 'r':
        $user = trim($_POST['user']);  
        $pass = trim($_POST['pass']); 
        $tipoUsuario = trim($_POST['tipoUsuario']);        
        

        if($user === "" || $pass === ""){
            $r["resp"] = false;
            $r["mensaje"] = "Tiene campos vacios";
        }else{
            if($tipoUsuario == 1){
                require_once('../modelo/Cliente.php');
                $u = new Cliente(); 
                $u->__set("clienteRut", $user);
                $u->__set("clientePassword", $pass);
    
                $resultado = $u->iniciarSesion();
    
                if($resultado){
                    
                    $_SESSION["user"] = array(
                        "auth" => true,
                        "cliente" => $resultado["clienteRut"],
                        "nombre" => $resultado["clienteNombre"],
                        "monto" => $resultado["clienteMonto"]
                    );
    
                    $r["resp"] = true;
                    $r["mensaje"] = "Iniciando sesion";
    
                }else{
                    $r["resp"] = false;
                    $r["mensaje"] = "Usuario o contraseña incorrectos";
                }
            }else{
                require_once('../modelo/Tecnico.php');
                $u = new Tecnico(); 
                $u->__set("tecnicoRut", $user);
                $u->__set("tecnicoPassword", $pass);
    
                $resultado = $u->iniciarSesion();
    
                if($resultado){
                    
                    $_SESSION["user"] = array(
                        "auth" => true,
                        "tecnico" => $resultado["tecnicoRut"],
                        "nombre" => $resultado["tecnicoNombre"],
                        "tipo" => $resultado["tecnicoTipo"]
                    );
    
                    $r["resp"] = true;
                    $r["mensaje"] = "Iniciando sesion";
    
                }else{
                    $r["resp"] = false;
                    $r["mensaje"] = "Usuario o contraseña incorrectos";
                }

            }   
        
        }

        echo json_encode($r);

        break;
}

?>