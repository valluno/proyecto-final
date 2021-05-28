

<form id="formCrearProveedor" method="POST" action="">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nombres</label>
    <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Direccion</label>
    <input type="text" class="form-control" name="direccion" id="direccion">
  </div>

  <input type="hidden" id="nuevo" value="nuevo" name="accion"/>
  <input type="hidden" id="nuevo" value="proveedor" name="funcion"/>
  <button type="button" id="btncrearProveedor" onclick="" class="btn btn-primary">registrar</button>


</form>

<script>
  $("#btncrearProveedor").on("click",function(){
   //alert("Proveedor");
   var datos = $("#formCrearProveedor").serialize();
   //alert("Proveedor: " + datos);
   var nombre = $("#nombre").val();
   var direccion = $("#direccion").val();
   if(nombre == "" || direccion == ""){
    alert("Por favor llena todos los campos");
   }else {
    
    $.ajax({
      type:"get",
      url:"controlador.php",
      data: datos,
      dataType:"json"
    }).done(function( resultado ){
    alert("resultado: " +  resultado.respuesta);
    console.log("Resultado: " + resultado.respuesta);
  });

   }

  });
</script>