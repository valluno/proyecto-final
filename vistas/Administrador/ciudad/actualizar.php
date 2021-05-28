
<?php  
 
  if(isset($_GET['codigo'])){
   $codigo = $_GET['codigo'];

  }

?>

<form id="formActualizarCiudad" method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nombre</label>
    <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Descripcion</label>
    <input type="text" class="form-control" name="descripcion" id="descripcion">
  </div>
  
  <input type="hidden" id="actualizar" value="actualizar" name="accion"/>
  <input type="hidden" id="funcion" value="ciudad" name="funcion"/>
  <input type="hidden" id="codigo" value="<?php echo $codigo; ?>" name="codigo"/>

  <button type="button" id="btncActualizarCiudad" onclick="" class="btn btn-primary">Actualizar</button>
  </form>


<script>
 var cod = $("#codigo").val();
 alert("pais a actualizar: " + cod);
 $.getJSON('./controlador2.php?accion=fila&funcion=ciudad&codigo='+cod, function (resultado) {
                //console.log(resultado[0].muni_nomb);//RECORRERLO POR ELEMENTO
    console.log("Datos del pais: " + cod + " " + resultado.nombre);
    $("#nombre").val(resultado.nombre);
    $("#descripcion").val(resultado.descripcion);
    
   });

   $(document).ready(function(){
    $("#btncActualizarCiudad").on("click",function(){
     var datos = $("#formActualizarCiudad").serialize();
     alert(datos);
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
