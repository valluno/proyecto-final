
<?php
 include_once "../../../Modelo/conexion.php";
$cone = new Conexion();
      $conexion = $cone->abrir_conexion();
      $sql = "SELECT usuarios.id_usuario,roles.nombre,usuarios.nombres,usuarios.usuarios,usuarios.sexo,usuarios.estado FROM usuarios,roles WHERE roles.id_rol = usuarios.id_rol";
      $query = $conexion->query($sql);
      if($query){
       $vector = array();
       while($fila = $query->fetch_assoc()){
        $vector[] = $fila;
       }
       $respuesta = $vector;
       echo json_encode(array('data'=>$respuesta), JSON_UNESCAPED_UNICODE);
      }else{
        $respuesta = array(
          'respuesta' => 'Error: '.$mysqli->error
        ); 
        echo json_encode($respuesta);
      }

