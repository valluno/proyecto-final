
<?php 
 session_start();
 if(isset($_SESSION['id_rol']) && $_SESSION['id_rol'] == '6'){
  
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
    <title>Director</title>
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
          <a class="nav-link active" aria-current="page" href="#">Director</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Cliente
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" id="crear" href="index.php?accion=crear">crear</a></li>
            <li><a class="dropdown-item" href="index.php?accion=mostrar">mostrar</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            usuario
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#"><?php echo $_SESSION['nombre']?></a></li>
            <li><a class="dropdown-item" href="index.php?&accion=cerrar">cerrar session</a></li>
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

  else if(url == "index.php?accion=crear"){
    
    $("#contenido").load("./cliente/crear.php");
    $("#contenido").show();
  }

  else if(url == "index.php?accion=mostrar"){
    
    $("#contenido").load("./cliente/mostrar.php");
    $("#contenido").show();
  }

});

function clieAct(dato){
  alert("Dato a actualizar: " + dato);
  $("#contenido").load("./cliente/actualizar.php?codigo="+dato);
  $("#contenido").show();
  }

  function clieBorrar(dato){
  alert("Dato a actualizar: " + dato);
  $("#contenido").load("./cliente/actualizar.php?codigo="+dato);
  $("#contenido").show();
  }

</script>