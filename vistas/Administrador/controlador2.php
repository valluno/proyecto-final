<?php 
 include_once "../../Modelo/conexion.php";
 include_once "../../Controlador/ecriptar.php";
if(isset($_GET['funcion'])){
    $funcion = $_GET['funcion'];
    $accion = $_GET['accion'];


    if($funcion == "pais"){

     switch($accion){
      case 'nuevo':
      $nombre = $_GET['nombre'];
      $descripcion = $_GET['descripcion'];

      $cone = new Conexion();
      $conexion = $cone->abrir_conexion();

      $sql = "INSERT INTO paises(nombres,descripcion,estado)VALUES('$nombre','$descripcion','Activo')";
      $query = $conexion->query($sql);
      if($query){
        $respuesta = array(
            'respuesta' => 'Se registro el pais'
          );
      }else{
        $respuesta = array(
            'respuesta' => 'Error: '.$conexion->error
          );
      }
      echo json_encode($respuesta);
      break;
      case 'mostrar':
        $cone = new Conexion();
        $conexion = $cone->abrir_conexion();
        $sql = "SELECT * from paises";
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

        case 'borrar':
          $cone = new Conexion();
          $conexion = $cone->abrir_conexion();
          $sql = "";
          $codigo = $_GET['codigo'];
          $sql = "UPDATE paises SET estado = 'Inactivo'  WHERE id_pais = '$codigo'";
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

          case 'fila':
            $cone = new Conexion();
            $conexion = $cone->abrir_conexion(); 
            $codigo = $_GET['codigo'];
            $sql = "SELECT id_pais,nombres,descripcion FROM paises WHERE id_pais='$codigo'";
            $query = $conexion->query($sql);
            if($query){
              $fila = $query->fetch_assoc();
              $respuesta = array(
                'id_pais' => $fila['id_pais'],
                'nombres' => $fila['nombres'],
                'descripcion' => $fila['descripcion']
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
          $descripcion = $_GET['descripcion'];

          $sql = "UPDATE paises SET nombres='$nombre',descripcion='$descripcion' WHERE id_pais = '$codigo'";
          $query = $conexion->query($sql);
          if($query){
            $respuesta = array(
              'respuesta' => 'Datos actualizados'
            ); 
           echo json_encode($respuesta);
          }else{
            $respuesta = array(
              'respuesta' => 'Error: '.$conexion->error
            ); 
            echo json_encode($respuesta);
          }

         break;
//controlador2.php?accion=fila&funcion=pais&codigo=8
     }//acciones


        
    }//hasta aqui llega pais


    else if($funcion == "ciudad"){


      switch($accion){

        case 'mostrar':
          $cone = new Conexion();
          $conexion = $cone->abrir_conexion();
          //                      0               1            2                3              4              5       
          $sql = "select ciudad.id_ciudad,ciudad.id_pais,ciudad.nombres,ciudad.descripcion,ciudad.estado,paises.nombres from ciudad,paises WHERE ciudad.id_pais = paises.id_pais";
          $query = $conexion->query($sql);
          $vector = array();
          if($query){

            while($fila = $query->fetch_row()){
              $vector[] = $fila;
             }
             //echo json_encode($vector);
             echo json_encode(array('data'=>$vector), JSON_UNESCAPED_UNICODE);
            // echo json_encode($vector);
          }else{
            $respuesta = array(
              'respuesta' => 'Error: '.$conexion->error
            ); 
            echo json_encode($respuesta);
          }
     
 
        break;
 
        case 'nuevo':
          $cone = new Conexion();
          $conexion = $cone->abrir_conexion();
          $nombre = $_GET['nombre'];
          $descripcion = $_GET['descripcion'];
          $pais = $_GET['pais'];
          $sql = "INSERT INTO ciudad(id_pais,nombres,descripcion,estado)VALUES('$pais','$nombre','$descripcion','Activo')";
          $query = $conexion->query($sql);
          if($query){
            $respuesta = array(
              'respuesta' => 'Datos insertados satisfactoriamente'
            ); 
          }else{
            $respuesta = array(
              'respuesta' => 'Error '.$conexion->error
            ); 
          }
          echo json_encode($respuesta);
        break;

        case 'fila':
          $cone = new Conexion();
          $conexion = $cone->abrir_conexion();
          $codigo = $_GET['codigo'];
          $sql = "SELECT * FROM ciudad WHERE id_ciudad='$codigo'";
          $query = $conexion->query($sql);
          if($query){
            $fila = $query->fetch_assoc();
            $respuesta = array(
              'id_ciudad' => $fila['id_ciudad'],
              'nombre' => $fila['nombres'],
              'descripcion' => $fila['descripcion']
            ); 
          }else{
            $respuesta = array(
              'respuesta' => 'Error '.$conexion->error
            ); 
          }
            echo json_encode($respuesta);
          break;
        case 'actualizar':
          $cone = new Conexion();
          $conexion = $cone->abrir_conexion();

          $codigo = $_GET['codigo'];
          $nombre = $_GET['nombre'];
          $descripcion = $_GET['descripcion'];
          
          $sql = "UPDATE ciudad SET nombres='$nombre',descripcion='$descripcion' WHERE id_ciudad='$codigo'";
          $query = $conexion->query($sql);
          if($query){
            $respuesta = array(
              'respuesta' => 'Datos actualizados satisfactoriamente'
            ); 
          }else{
            $respuesta = array(
              'respuesta' => 'Error'.$conexion->error
            );
          }
          echo json_encode($respuesta);
        break;
        case 'borrar':
          $cone = new Conexion();
          $conexion = $cone->abrir_conexion();
          $codigo = $_GET['codigo'];
          $sql = "UPDATE ciudad SET estado = 'Inactivo' WHERE id_ciudad='$codigo'";
          $query = $conexion->query($sql);
          if($query){
            $respuesta = array(
              'respuesta' => 'correcto'
            ); 
          }else{
            $respuesta = array(
              'respuesta' => 'Error'.$conexion->error
            );
          }
          echo json_encode($respuesta);
        break;

        case "traer":
          $cone = new Conexion();
          $conexion = $cone->abrir_conexion();
          $sql = "SELECT * FROM ciudad";
          $query = $conexion->query($sql);
          if($query){
            
            while($fila = $query->fetch_assoc()){
              $vector[] = $fila;
             }
             //echo json_encode($vector);
             echo json_encode(array('data'=>$vector), JSON_UNESCAPED_UNICODE);
            // echo json_encode($vector);

          }else{
            $respuesta = array(
              'respuesta' => 'Error'.$conexion->error
            );
            echo json_encode($respuesta);
          }
        break;
      }

    }//FIN DE CIUDAD
     

    else if($funcion == "sede"){

     switch($accion){

     case "nuevo":
        $cone = new Conexion();
        $conexion = $cone->abrir_conexion();

        $nombre = $_GET['nombre'];
        $direccion = $_GET['direccion'];
        $ciudad = $_GET['ciudad'];

        $sql = "INSERT INTO sede(id_ciudad,nombres,direccion,estado)VALUES('$ciudad','$nombre','$direccion','Activo')";
        $query = $conexion->query($sql);
        if($query){
          $respuesta = array(
            'respuesta' => 'Sede registrada satisfactoriamente'
          ); 
        }else{
          $respuesta = array(
            'respuesta' => 'Error'.$conexion->error
          );
        }
        echo json_encode($respuesta);
      break;
      case "mostrar":
      $cone = new Conexion();
      $conexion = $cone->abrir_conexion();
      $sql = "select sede.id_sede,sede.nombres,sede.direccion,sede.estado,ciudad.nombres FROM sede,ciudad WHERE ciudad.id_ciudad = sede.id_ciudad";
      $query = $conexion->query($sql);

      if($query){

        while($fila = $query->fetch_row()){
          $vector[] = $fila;
         }
         //echo json_encode($vector);
         echo json_encode(array('data'=>$vector), JSON_UNESCAPED_UNICODE);
        // echo json_encode($vector);
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
       $sql = "SELECT nombres,direccion  from sede WHERE id_sede='$codigo'";
       $query = $conexion->query($sql);
       if($query){
        $fila = $query->fetch_assoc();
        $respuesta = array(
          'nombre' => $fila['nombres'],
          'direccion' => $fila['direccion']
        ); 
      }else{
        $respuesta = array(
          'respuesta' => 'Error'.$conexion->error
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
        $sql = "UPDATE sede SET nombres='$nombre',direccion='$direccion' WHERE id_sede='$codigo'";
        $query = $conexion->query($sql);

        if($query){
              $respuesta = array(
            'respuesta' => 'Sede actualizada'
          ); 
        }else{
          $respuesta = array(
            'respuesta' => 'Error'.$conexion->error
          );
        }
        echo json_encode($respuesta);
        break;
        case 'borrar':
          $cone = new Conexion();
          $conexion = $cone->abrir_conexion();
          $codigo = $_GET['codigo'];
          $sql = "UPDATE sede SET estado='Inactivo' WHERE id_sede='$codigo'";
          $query = $conexion->query($sql);

        if($query){
              $respuesta = array(
            'respuesta' => 'correcto'
          ); 
        }else{
          $respuesta = array(
            'respuesta' => 'Error'.$conexion->error
          );
        }
        echo json_encode($respuesta);

          break;
     }

    }//fin de sede
 
  }

  ?>