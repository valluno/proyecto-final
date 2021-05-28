
<?php 
 include_once "../../Modelo/conexion.php";
 include_once "../../Controlador/ecriptar.php";
 if($_GET['accion']){
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

        $pass = $enc::obtenerEncriptacion($contra);
    
        $sql = "INSERT INTO usuarios(id_rol,nombres,usuarios,contrasenas,sexo,estado)VALUES('7','$nombre','$usuario','$pass','$sexo','Activo')";
        $query = $conexion->query($sql);
        if($query){
          $respuesta = array(
            'respuesta' => 'Usuario registrado satisfactoriamente'
          );
     
        }else{
          $respuesta = array(
            'respuesta' => 'Error: '.$conexion->error
          );
        }
        
        echo json_encode($respuesta);
      

     break;

     case 'traer':

      $cone = new Conexion();
      $conexion = $cone->abrir_conexion();
      $sql = "SELECT * FROM usuarios WHERE id_rol = 7";
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
      case 'lista':
        $cone = new Conexion();
        $conexion = $cone->abrir_conexion();
        $codigo = $_GET['codigo'];
        $sql = "SELECT * FROM usuarios WHERE id_usuario = '$codigo'";
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
        $sql = "UPDATE usuarios SET nombres='$nombre',usuarios='$usuario',sexo='$sexo' WHERE id_usuario='$codigo'";
        $query = $conexion->query($sql);

        if($query){
          $respuesta = array(
            'respuesta' => 'Usuario actualizado satisfactoriamente'
          );
     
        }else{
          $respuesta = array(
            'respuesta' => 'Error: '.$conexion->error
          );
        }
        
        echo json_encode($respuesta);
      

      break;

   }
   
 }

?>