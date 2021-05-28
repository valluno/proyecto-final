<?php 
 include_once "../../Modelo/conexion.php";
 include_once "../../Controlador/ecriptar.php";
 $accion = $_GET['accion'];
 switch($accion){
  case 'nuevo':
    
    $cone = new Conexion();
    $conexion = $cone->abrir_conexion();
    $enc = new emcriptar();

    $nombre = $_GET['nombres'];
    $usuario = $_GET['usuario'];
    $contra = $_GET['contra'];
    $repContra = $_GET['repContra'];
    $sexo = $_GET['sexo'];
    $rol = $_GET['rol']; 
    $pass = $enc::obtenerEncriptacion($contra);

    $mysqli = new mysqli("localhost", "root", "", "valluno");
    $sql = "INSERT INTO usuarios(id_rol,nombres,usuarios,contrasenas,sexo,estado)VALUES('$rol','$nombre','$usuario','$pass','$sexo','Activo')";
    $query = $mysqli->query($sql);
    if($query){
      $respuesta = array(
        'respuesta' => 'Usuario registrado satisfactoriamente'
      );
 
    }else{
      $respuesta = array(
        'respuesta' => 'Error: '.$mysqli->error
      );
    }
    
    echo json_encode($respuesta);
    break;
    case 'mostrar':
      $cone = new Conexion();
      $conexion = $cone->abrir_conexion();
      $sql = "SELECT usuarios.id_usuario,roles.nombre,usuarios.nombres,usuarios.usuarios,usuarios.sexo,usuarios.estado FROM usuarios,roles WHERE roles.id_rol = usuarios.id_rol";
      $query = $conexion->query($sql);
      if($query){
       $vector = array();
       while($fila = $query->fetch_assoc()){
        $vector[] = $fila;
       }
       echo json_encode($vector);
      }else{
        $respuesta = array(
          'respuesta' => 'Error: '.$mysqli->error
        ); 
        echo json_encode($respuesta);
      }
      
      break;
      case 'borrar':
        $cone = new Conexion();
        $conexion = $cone->abrir_conexion();
        $sql = "";
        $codigo = $_GET['codigo'];
        $sql = "UPDATE usuarios SET estado = 'Inactivo'  WHERE id_usuario = '$codigo'";
        $query = $conexion->query($sql);
        if($query){
          $respuesta = array(
            'respuesta' => 'correcto'
          ); 
         echo json_encode($respuesta);
        }else{
          $respuesta = array(
            'respuesta' => 'Error: '.$mysqli->error
          ); 
          echo json_encode($respuesta);
        }
        
        break;
        case 'cerrar':
          session_start();
          session_destroy();//BORRA TODAS LAS SESSIONES
          $respuesta = array(
            'respuesta' => 'cerrado'
          ); 
          echo json_encode($respuesta);
          break;

          case 'actualizar':
         $cone = new Conexion();
         $conexion = $cone->abrir_conexion();
         $codigo = $_GET['codigo'];
         $sql = "SELECT id_usuario,nombres,usuarios,sexo FROM usuarios WHERE id_usuario='$codigo'";
         $query = $conexion->query($sql);
         if($query){
          $fila = $query->fetch_assoc();
          $respuesta = array(
            'id_usuario' => $fila['id_usuario'],
            'usuario' => $fila['usuarios'],
            'nombres' => $fila['nombres'],
            'sexo' => $fila['sexo']
          ); 
         }else{
          $respuesta = array(
            'respuesta' => 'El codigo: '. $codigo . ", no existe"
          ); 
         }

            echo json_encode($respuesta);
            break;

           case 'modificar':
            $cone = new Conexion();
            $conexion = $cone->abrir_conexion();

            $codigo = $_GET['codigo'];
            $nombre = $_GET['nombres'];
            $usuario = $_GET['usuario'];
            $sexo = $_GET['sexo'];
            $cone = new Conexion();
            $conexion = $cone->abrir_conexion();

            $sql = "UPDATE usuarios SET nombres='$nombre',usuarios='$usuario',sexo='$sexo' WHERE id_usuario='$codigo'";
            $query = $conexion->query($sql);
            if($query){
              $respuesta = array(
                'respuesta' => 'Datos actualizados'
              );
            }else {
              $respuesta = array(
                'respuesta' => 'Error: '.$mysqli->error
              );
            }
            echo json_encode($respuesta);
            break;
 } 
 
?>