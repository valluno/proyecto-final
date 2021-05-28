<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

 
<?php 
 
 if(isset($_GET['codigo'])){
  $codigo = $_GET['codigo'];
 }
 
?>
<input type="hidden" name="cod" id="cod" value="<?php echo $codigo ?>">
<form id="formActualizar" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nombres</label>
    <input type="text" class="form-control" name="nombres" id="nombres" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Usuario</label>
    <input type="text" class="form-control" name="usuario" id="usuario">
  </div>

  <label for="exampleInputPassword1" class="form-label">Sexo</label>
  <div class="mb-3 form-check">
    <select class="form-control" id="sexo" name="sexo">
		

    </select>
  </div>


  <input type="hidden" id="actualizar" value="modificar" name="accion"/>
  <input type="hidden" id="codigo" value="<?php echo $codigo; ?>" name="codigo"/>
  <button type="button" id="btncActualizar" onclick="actualizar()" class="btn btn-primary">Actualizar</button>
</form>
 <script>
  $(document).ready(function(){
    $("#btncActualizar").on("click",function(){
     var datos = $("#formActualizar").serialize();
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
   var cod = $("#cod").val();
   //alert("Codigo a actualizar: " + cod);
   $.getJSON('./controlador.php?accion=actualizar&codigo='+cod, function (resultado) {
                //console.log(resultado[0].muni_nomb);//RECORRERLO POR ELEMENTO
    console.log("Datos del usuario: " + cod + " " + resultado);
    $("#nombres").val(resultado.nombres);
    $("#usuario").val(resultado.usuario);
    if(resultado.sexo == "Femelino"){
      $("#sexo").append("<option selected value='Femelino'>Femelino</option>");
      $("#sexo").append("<option  value='Masculino'>Masculino</option>");
    }else{
      $("#sexo").append("<option  value='Femelino'>Femelino</option>");
      $("#sexo").append("<option selected  value='Masculino'>Masculino</option>");
    }
   }); 
 </script>
</body>
</html>