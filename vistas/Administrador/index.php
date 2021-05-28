
<?php 
 session_start();
 if(isset($_SESSION['id_rol']) && $_SESSION['id_rol'] == '1'){
  
 }else{
   echo "<script>alert('No has iniciado session')</script>";  
   header('Location: http://localhost/valluno/');
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
</button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Admin</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Rol
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" id="crear" href="index.php?function=rol&accion=crear">crear</a></li>
            <li><a class="dropdown-item" href="index.php?function=rol&accion=mostrar">mostrar</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Paises
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="index.php?function=paises&accion=crear">crear</a></li>
            <li><a class="dropdown-item" href="index.php?function=paises&accion=mostrar">mostrar</a></li>
          </ul>
        </li>

        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Ciudades
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="index.php?function=ciudad&accion=crear">crear</a></li>
            <li><a class="dropdown-item" href="index.php?function=ciudad&accion=mostrar">mostrar</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            sedes
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="index.php?function=sede&accion=crear">crear</a></li>
            <li><a class="dropdown-item" href="index.php?function=sede&accion=mostrar">mostrar</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            usuario
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#"><?php echo $_SESSION['nombre']?></a></li>
            <li><a class="dropdown-item" href="index.php?function=rol&accion=cerrar">cerrar session</a></li>
          </ul>
        </li>

   
      </ul>
    </div>
  </div>
</nav>


  <br><br>
<div class="container" id="contenido">

</div>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>


        <!-- Third party plugin JS-->
        <!-- Contact form JS-->
        <script src="assets/mail/contact_me.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script> 

    $("#navbar a").on("click",function(e){
  //alert("a presionado");
  e.preventDefault();
  var url = $(this).attr("href");
  //alert(url);

  if(url != "")
  if(url == "index.php?function=rol&accion=crear"){
    $("#contenido").load("./Rol/crear.php");
    $("#contenido").show();

  }
  else if(url == "index.php?function=rol&accion=mostrar"){
    $("#contenido").load("./Rol/mostrar.php");
    $("#contenido").show();
  } else if(url == "index.php?function=rol&accion=cerrar"){
    alert("ruta:" + url)
    var datos = "accion=cerrar";
    $.ajax({
      type:"get",
      url:"controlador.php?accion=cerrar",
      dataType:"json"
    }).done(function( resultado ){
      alert("cerro la session");
     if(resultado.respuesta == 'cerrado'){
      $(location).attr('href','http://localhost/valluno/');
     }
  });
  }

  else if(url == "index.php?function=paises&accion=crear"){
    
    $("#contenido").load("./Pais/pais.php");
    $("#contenido").show();
  }
  
  else if(url == "index.php?function=paises&accion=mostrar"){
    $("#contenido").load("./Pais/mostrar.php");
    $("#contenido").show();
  }

  else if(url == "index.php?function=ciudad&accion=crear"){
    $("#contenido").load("./ciudad/crear.php");
    $("#contenido").show();
  }

  else if(url == "index.php?function=ciudad&accion=mostrar"){
    $("#contenido").load("./ciudad/mostrar.php");
    $("#contenido").show();
  }

  else if(url == "index.php?function=sede&accion=crear"){
    $("#contenido").load("./sede/crear.php");
    $("#contenido").show();
  }

  else if(url == "index.php?function=sede&accion=mostrar"){
    $("#contenido").load("./sede/mostrar.php");
    $("#contenido").show();
  }
  

  
  

});
 

function sedeAct(dato){
 alert("Actualizar:" + dato);
 $("#contenido").load("./sede/actualizar.php?codigo="+dato);
 $("#contenido").show();

}

function sedeEli(dato){
  alert("Elimilar:" + dato);

  swal({
              title: '¿Está seguro?',
              text: "¿Realmente desea borrar la sede con codigo : " + dato + " ?",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Si, Borrarlo!'
        }).then((decision) => {
                if (decision.value) {

                    var request = $.ajax({
                        method: "get",
                        url: "./controlador2.php",
                        data: {codigo: dato,funcion:'sede',accion:'borrar'},
                        dataType: "json"
                    })

                    request.done(function( resultado ) {
                        if(resultado.respuesta == 'correcto'){
                            swal(
                                'Borrado!',
                                'El usuario con codigo : ' + dato + ' fue borrado',
                                'success'
                            )     
                            dt.ajax.reload();                            
                        } else {
                            swal({
                              type: 'error',
                              title: 'Oops...',
                              text: 'Something went wrong!'                         
                            })
                        }
                    });
                     
                    request.fail(function( jqXHR, textStatus ) {
                        swal({
                          type: 'error',
                          title: 'Oops...',
                          text: 'Something went wrong!' + textStatus                          
                        })
                    });
                }
        })

}

function actualizar(){
  alert("Boton actualizar");
}



function crear(){ 
 var datos = $("#formCrear").serialize();
 //alert("Formulario a crear: " + datos); 
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

function rol(dato){
  alert("href presionado");
  alert("id:" + dato);

  swal({
              title: '¿Está seguro?',
              text: "¿Realmente desea borrar el usuario con codigo : " + dato + " ?",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Si, Borrarlo!'
        }).then((decision) => {
                if (decision.value) {

                    var request = $.ajax({
                        method: "get",
                        url: "./controlador.php",
                        data: {codigo: dato, accion:'borrar'},
                        dataType: "json"
                    })

                    request.done(function( resultado ) {
                        if(resultado.respuesta == 'correcto'){
                            swal(
                                'Borrado!',
                                'El usuario con codigo : ' + dato + ' fue borrado',
                                'success'
                            )     
                            dt.ajax.reload();                            
                        } else {
                            swal({
                              type: 'error',
                              title: 'Oops...',
                              text: 'Something went wrong!'                         
                            })
                        }
                    });
                     
                    request.fail(function( jqXHR, textStatus ) {
                        swal({
                          type: 'error',
                          title: 'Oops...',
                          text: 'Something went wrong!' + textStatus                          
                        })
                    });
                }
        })

}



function crearPais(){
 //alert("Boton registrar pais");
 var nombre = $("#nombre").val();
 var des = $("#descripcion").val();
 //alert(nombre + " des " + des);
 var validar = 2;
 if(nombre == ""){
  validar--;
  alert("Digite nombre");
 }
 if(des == ""){
  validar--;
  alert("Digite descripcion");
 }
 if(validar == 2){
  var datos = $("#formPais").serialize();
  alert("Datos serializados: " + datos);
  console.log(datos);
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
}

//-----------
function ciudadAct(dato){
 //alert("actualizar ciudad");
 $("#contenido").load("./ciudad/actualizar.php?codigo="+dato);
 alert("codigo a actualizar: " + dato)
 $("#contenido").show();
}

function ciudadEli(dato){
  alert("Elimular: " + dato);
  swal({
              title: '¿Está seguro?',
              text: "¿Realmente desea borrar la ciudad con codigo : " + dato + " ?",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Si, Borrarlo!'
        }).then((decision) => {
                if (decision.value) {

                    var request = $.ajax({
                        method: "get",
                        url: "./controlador2.php",
                        data: {codigo:dato,funcion:'ciudad',accion:'borrar'},
                        dataType: "json"
                    })

                    request.done(function( resultado ) {
                        if(resultado.respuesta == 'correcto'){
                            swal(
                                'Borrado!',
                                'La ciudad con codigo : ' + dato + ' fue borrado',
                                'success'
                            )     
                            dt.ajax.reload();                            
                        } else {
                            swal({
                              type: 'error',
                              title: 'Oops...',
                              text: 'Something went wrong!'                         
                            })
                        }
                    });
                     
                    request.fail(function( jqXHR, textStatus ) {
                        swal({
                          type: 'error',
                          title: 'Oops...',
                          text: 'Something went wrong!' + textStatus                          
                        })
                    });
                }
        })

}

//-----------
function paisAct(dato){
  alert("Actualizar pais: " + dato);
  $("#contenido").load("./Pais/actualizar.php?codigo="+dato);
  $("#contenido").show(); 
}
 
 function paisEli(dato){
  alert("href presionado");
  alert("id:" + dato);

  swal({
              title: '¿Está seguro?',
              text: "¿Realmente desea borrar el usuario con codigo : " + dato + " ?",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Si, Borrarlo!'
        }).then((decision) => {
                if (decision.value) {

                    var request = $.ajax({
                        method: "get",
                        url: "./controlador2.php",
                        data: {codigo: dato,funcion:'pais',accion:'borrar'},
                        dataType: "json"
                    })

                    request.done(function( resultado ) {
                        if(resultado.respuesta == 'correcto'){
                            swal(
                                'Borrado!',
                                'El pais con codigo : ' + dato + ' fue borrado',
                                'success'
                            )     
                            dt.ajax.reload();                            
                        } else {
                            swal({
                              type: 'error',
                              title: 'Oops...',
                              text: 'Something went wrong!'                         
                            })
                        }
                    });
                     
                    request.fail(function( jqXHR, textStatus ) {
                        swal({
                          type: 'error',
                          title: 'Oops...',
                          text: 'Something went wrong!' + textStatus                          
                        })
                    });
                }
        })

        
 }


function rolAct(dato){
  $("#contenido").load("./Rol/actualizar.php?accion=actualizar&codigo="+dato);
  $("#contenido").show();
}


</script>
<input type="hidden" id="codigo" name="codigo"/>
</body>
</html>
