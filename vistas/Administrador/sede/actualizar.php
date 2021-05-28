<?php 
 if(isset($_GET['codigo'])){
  $codigo = $_GET['codigo'];
 }
?>

<form id="formActualizarSede" method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nombre</label>
    <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Descripcion</label>
    <input type="text" class="form-control" name="direccion" id="direccion">
  </div>


  
  <input type="hidden" id="actualizar" value="actualizar" name="accion"/>
  <input type="hidden" id="funcion" value="sede" name="funcion"/>
  <input type="hidden" id="codigo" value="<?php echo $codigo; ?>" name="codigo"/>

  <button type="button" id="btncActualizarSede" onclick="" class="btn btn-primary">Actualizar</button>
  </form>

  <script>

  var cod = $("#codigo").val();
   //alert("sede a actualizar: " + cod);
   $.getJSON('./controlador2.php?accion=listar&funcion=sede&codigo='+cod, function (resultado) {
                //console.log(resultado[0].muni_nomb);//RECORRERLO POR ELEMENTO
    console.log(resultado);
    $("#nombre").val(resultado.nombre);
    $("#direccion").val(resultado.direccion);
   });

   $(document).ready(function(){
    $("#btncActualizarSede").on("click",function(){
     var datos = $("#formActualizarSede").serialize();
     //alert(datos);

     $.ajax({
      type:"get",
      url:"controlador2.php",
      data: datos,
      dataType:"json"
    }).done(function( resultado ){
    alert("resultado: " +  resultado.respuesta);
    console.log("Resultado: " + resultado.respuesta);
  });


    });
  })

  </script>