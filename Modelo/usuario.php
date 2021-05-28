
<?php
 require_once("../Modelo/Conexion.php");
  class Usuario extends Conexion{


    public function iniciarSession($usuario,$contrasena){
     $this->abrir_conexion();
     $sql = "SELECT * FROM usuarios where usuarios = '$usuario' AND contrasenas = '$contrasena'";
     $resultado = $this->conexion->query($sql);
     $fila = $resultado->fetch_assoc();
     if($fila){
      $respuesta = array(
        'id_usuario' => $fila['id_usuario'],
        'id_rol' => $fila['id_rol'],
        'nombre' => $fila['nombres'],
        'usuario' => $fila['usuarios'],
        'contrasena' => $fila['contrasenas'],
        'sexo' => $fila['sexo'],
        'estado' => $fila['estado']
       );
       return $respuesta;
     }else return false;
   }

  }

  /*$usuario = new Usuario();
  $contrasena = 'admin1020';
  $usuario->iniciarSession("admin",'$2y$15$ZAJZcQxryEoW4.u6S6BuH.QskJKaSCiXmgDDsEvEVIcETOJIBRumW');*/