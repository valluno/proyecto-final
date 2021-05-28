<?php  
 
  if(isset($_GET['codigo'])){
   $codigo = $_GET['codigo'];

  }

?>
<?php echo $codigo ?>
<form id="formActualizarProveedor" method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nombre</label>
    <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Direccion</label>
    <input type="text" class="form-control" name="direccion" id="direccion">
  </div>
  
  <input type="hidden" id="actualizar" value="actualizar" name="accion"/>
  <input type="hidden" id="funcion" value="proveedor" name="funcion"/>
  <input type="hidden" id="codigo" value="<?php echo $codigo; ?>" name="codigo"/>

  <button type="button" id="btncActualizarProveedor" onclick="" class="btn btn-primary">Actualizar</button>
  </form>

  <script>
 var cod = $("#codigo").val();
 //alert("proveedor a actualizar: " + cod);


 $.getJSON('./controlador.php?accion=listar&funcion=proveedor&codigo='+cod, function (resultado) {
                //console.log(resultado[0].muni_nomb);//RECORRERLO POR ELEMENTO
    //console.log("Datos del proveedor: " + resultado);
    //alert("proveedor a actualizar: " + resultado.dir_proveedor);
    $("#nombre").val(resultado.nombre);
    $("#direccion").val(resultado.dir_proveedor);
   });

   $(document).ready(function(){
    $("#btncActualizarProveedor").on("click",function(){
     var datos = $("#formActualizarProveedor").serialize();
     alert(datos);

     $.ajax({
      type:"get",
      url:"controlador.php",
      data: datos,
      dataType:"json"
    }).done(function( resultado ){
    alert("resultado: " +  resultado.respuesta);
    console.log("Resultado: " + resultado.respuesta);
  });


    });
  })

</script>