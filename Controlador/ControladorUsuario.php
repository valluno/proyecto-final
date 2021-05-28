<?php
  require_once "../Modelo/usuario.php";
  require_once "../Controlador/ecriptar.php";
  require_once "../Controlador/session.php";
  $accion = $_GET['accion'];

  
  switch($accion){
    case 'iniciar-session':
    $usuario = new Usuario();
    //echo "<br>"."Datos ingresados"."<br>".$_GET['usuario']."<br>".$_GET['contrasena']."<br>";
    $emcr = new emcriptar();
    $pass = $emcr::obtenerEncriptacion($_GET['contrasena']);
    //echo $pass;
    $resultado = $usuario->iniciarSession($_GET['usuario'],$pass);
    if($resultado != false){
      //echo "MENSAJE TRUE";
      //creamos session
      $id_usuario = $resultado['id_usuario'];
      $id_rol = $resultado['id_rol'];
      $nombre = $resultado['nombre'];
      $usuario = $resultado['usuario'];
      $contrasena = $resultado['contrasena'];
      $sexo = $resultado['sexo'];
      $estado = $resultado['estado'];
      $session = new session();
    

       if($estado == 'Activo'){//usuario activo
        $session->crear($id_usuario,$id_rol,$nombre,$usuario,$contrasena,$sexo,$estado);
        $respuesta = array(
          'respuesta' => 'Activo',
          'rol' => $id_rol
         );
         echo json_encode($respuesta);
       }else if($estado == 'Inactivo'){
        $respuesta = array(
          'respuesta' => 'inactivo'
         );
         echo json_encode($respuesta);
       }
       //echo json_encode($respuesta);
    }else{
      $respuesta = array(
        'respuesta' => $resultado
       );
       echo json_encode($respuesta);
    }
    
    break;
  }

?>
