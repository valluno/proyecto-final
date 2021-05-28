
<?php 
 include_once "../../Modelo/conexion.php";
 include_once "../../Controlador/ecriptar.php";
 if(isset($_GET['funcion'])){
  $funcion = $_GET['funcion'];
  $accion = $_GET['accion'];

  if($accion == "cerrar"){
    session_start();
    session_destroy();//BORRA TODAS LAS SESSIONES
    $respuesta = array(
      'respuesta' => 'cerrado'
    ); 
    echo json_encode($respuesta);
  }

  else if($funcion == "empleado"){
    
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

    $pass = $enc::obtenerEncriptacion($contra);
    $sql = "INSERT INTO usuarios(id_rol,nombres,usuarios,contrasenas,sexo,estado)VALUES(3,'$nombre','$usuario','$pass','$sexo','Activo')";

    $query = $conexion->query($sql);
      if($query){
        $respuesta = array(
            'respuesta' => 'Empleado registrado satisfactoriamente'
          ); 
          echo json_encode($respuesta);
      }else{
        $respuesta = array(
          'respuesta' => 'Error: '.$conexion->error
        ); 
        echo json_encode($respuesta);
      }


    break;

    case 'mostrar':
      $cone = new Conexion();
      $conexion = $cone->abrir_conexion();

      $sql = "SELECT * FROM usuarios where id_rol=2";
      $query = $conexion->query($sql);
      
      if($query){
        $vector = array();
        while($fila = $query->fetch_assoc()){
         $vector[] = $fila;
        }
        echo json_encode(array('data'=>$vector), JSON_UNESCAPED_UNICODE);
       }else{
         $respuesta = array(
           'respuesta' => 'Error: '.$conexion->error
         ); 
         echo json_encode($respuesta);
       }

      break;
  
   }

  }//empleado

  else if($funcion == "proveedor"){

   switch($accion){

    case 'nuevo':

        $cone = new Conexion();
        $conexion = $cone->abrir_conexion();
        $nombre = $_GET['nombre'];
        $direccion = $_GET['direccion'];
        $sql = "INSERT INTO proveedores(nombre_proveedor,dir_proveedor,estado)VALUES('$nombre','$direccion','Activo')";
        $query = $conexion->query($sql);
        if($query){
          $respuesta = array(
              'respuesta' => 'proveedor registrado satisfactoriamente'
            ); 
            echo json_encode($respuesta);
        }else{
          $respuesta = array(
            'respuesta' => 'Error: '.$conexion->error
          ); 
          echo json_encode($respuesta);
        }

       
      break;
      case 'mostrar':
        $cone = new Conexion();
        $conexion = $cone->abrir_conexion();
        $sql = "SELECT * FROM proveedores";
        $query = $conexion->query($sql);

        if($query){
          $vector = array();
          while($fila = $query->fetch_assoc()){
           $vector[] = $fila;
          }
          echo json_encode(array('data'=>$vector), JSON_UNESCAPED_UNICODE);
         }else{
           $respuesta = array(
             'respuesta' => 'Error: '.$conexion->error
           ); 
           echo json_encode($respuesta);
         }

        break;
        case 'listar':
          $cone = new Conexion();
          $conexion = $cone->abrir_conexion();
          $codigo = $_GET['codigo'];
          $sql = "SELECT * FROM proveedores where id_proveedor = '$codigo'";
          $query = $conexion->query($sql);

          if($query){
            $fila = $query->fetch_assoc();
            $respuesta = array(
              'id_proveedor' => $fila['id_proveedor'],
              'nombre' => $fila['nombre_proveedor'],
              'dir_proveedor' => $fila['dir_proveedor'],
              'estado' => $fila['estado']
            ); 
          }else {
            $respuesta = array(
              'respuesta' => 'No se pudo traer los datos'
            );  
          }

          echo json_encode($respuesta);

          break;

          case 'actualizar':
          $cone = new Conexion();
          $conexion = $cone->abrir_conexion();
          $codigo = $_GET['codigo'];
          $nombre = $_GET['nombre'];
          $direccion = $_GET['direccion'];

          $sql = "UPDATE proveedores SET nombre_proveedor ='$nombre',dir_proveedor='$direccion' WHERE id_proveedor='$codigo'";
          $query = $conexion->query($sql);

          if($query){
            $respuesta = array(
                'respuesta' => 'proveedor actualizado satisfactoriamente'
              ); 
              echo json_encode($respuesta);
          }else{
            $respuesta = array(
              'respuesta' => 'Error: '.$conexion->error
            ); 
            echo json_encode($respuesta);
          }

          break;

          case 'borrar':

            $cone = new Conexion();
            $conexion = $cone->abrir_conexion();
            $codigo = $_GET['codigo'];

            $sql = "UPDATE proveedores SET estado='Inactivo' WHERE id_proveedor='$codigo'";
            
            $query = $conexion->query($sql);
          if($query){
            $respuesta = array(
                'respuesta' => 'correcto'
              ); 
              echo json_encode($respuesta);
          }else{
            $respuesta = array(
              'respuesta' => 'Error: '.$conexion->error
            ); 
            echo json_encode($respuesta);
          }


          break;

   }

  }


 }

?>