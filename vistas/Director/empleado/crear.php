





<form id="formCrear" method="POST" action="">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nombres</label>
    <input type="text" class="form-control" name="nombres" id="nombres" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Usuario</label>
    <input type="text" class="form-control" name="usuario" id="usuario">
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Contraseña</label>
    <input type="password" class="form-control" name="contra" id="usuario">
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Rep contraseña</label>
    <input type="password" class="form-control" name="repContra" id="usuario">
  </div>
 
  <div class="mb-3 form-check">
    <select class="form-control" id="sexo" name="sexo">
		<option value="Masculino">Masculino</option>			
        <option value="Femelino">Femelino</option>

    </select>
  </div>



  <input type="hidden" id="nuevo" value="nuevo" name="accion"/>
  <input type="hidden" id="nuevo" value="empleado" name="funcion"/>
  <button type="button" id="btncrear" onclick="" class="btn btn-primary">registrar</button>
</form>

<script>
  $("#btncrear").on("click",function(){
  var datos = $("#formCrear").serialize();
  var nombre = $("#nombres").val();
  var usuario = $("#usuario").val();
  var contra = new String($("#contra").val());
  var repContra = new String($("#repContra").val());
 alert(datos);
  if(nombre == "" || usuario == "" || contra == "" || repContra == ""){
   alert("Por favor llena los campos");
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

  //alert(datos);
 });
</script>