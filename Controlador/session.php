<?php 
 
 class session{
   public function crear($id_usuario,$id_rol,$nombre,$usuario,$contrasena,$sexo,$estado){
    session_start();
    $_SESSION['id_usuario'] = $id_usuario;
    $_SESSION['id_rol'] = $id_rol;
    $_SESSION['nombre'] = $nombre;
    $_SESSION['usuario'] = $usuario;
    $_SESSION['contrasena'] = $contrasena;
    $_SESSION['sexo'] = $sexo;
    $_SESSION['estado'] = $estado;
   }  
 }
?>