


<form id="formCiudad" method="POST" action="">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">nombres</label>
    <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">direccion</label>
    <input type="text" class="form-control" name="direccion" id="direccion">
  </div>

  <label for="exampleInputPassword1" class="form-label">Ciudad</label>
  <div class="mb-3 form-check">
  <select class="form-control" id="ciudad" name="ciudad">
  </select>
  </div>

  <input type="hidden" id="nuevo" value="nuevo" name="accion"/>
  <input type="hidden" id="funcion" value="sede" name="funcion"/>


  <button type="button" id="btncrearSede" onclick="" class="btn btn-primary">registrar</button>
</form>

<script>
$(document).ready(function(){
  //alert("TABLA");
  $.getJSON('./controlador2.php?funcion=ciudad&accion=traer', function (resultado) {
     //console.log(resultado[0].muni_nomb);//RECORRERLO POR ELEMENTO
     console.log(resultado);
     //console.log("Longitud del JSON: "+ resultado.length);
     for (var index = 0; index < resultado.data.length; index++) {   
         //alert("index: " + index);
                  var nuevo = '<option value="'
                   + resultado.data[index].id_ciudad +'">'
                   + resultado.data[index].nombres + '</option>';
                   $("#ciudad").append(nuevo);    
                }
     
   });


 });


 $("#btncrearSede").on("click",function(){
  //alert("Boton crear presionado");
  var datos = $("#formCiudad").serialize();
  var nombre =  $("#nombre").val();
  var direccion = $("#direccion").val();
  //alert(datos);
  if(nombre == "" || direccion == ""){
   alert("Por favor llena los campos");
  }else{

    $.ajax({
      type:"get",
      url:"controlador2.php",
      data: datos,
      dataType:"json"
    }).done(function( resultado ){
    alert("resultado: " +  resultado.respuesta);
    console.log("Resultado: " + resultado.respuesta);
  });

  }

 });

</script>