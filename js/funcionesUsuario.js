//--------------------------INICIAR SESSION-----------------------

$(document).ready(function(e){
 //alert("FUNCIONES DE USUARIO");
 $("#login").on("click",function(){
   var usuario = $("#usuario").val();
   var contrasena = $("#contrasena").val();
   var datos=$("#FormLogin").serialize();
   //alert("Datos serializados: " + datos);
   var validar = 2;
   if(usuario == ""){
     validar--;
     $("#labelUsuario").text("Campo usuario vacio");
   }
   if(contrasena == ""){
     validar--;
     $("#labelContrasena").text("Campo contraseña vacio");
   }

   if(validar == 2){
    //alert("Datos correctos");
    $.ajax({
      type:"get",
      url:"./Controlador/ControladorUsuario.php",
      data: datos,
      dataType:"json"
    }).done(function( resultado ) {
      var resul = resultado.respuesta;
      console.log("Resultado: " + resul);
      if(resultado.respuesta === false){
        alert('Usuario o contraseña incorrecto');
       } else if(resultado.respuesta == 'inactivo'){
        alert('Usuario inactivo');      
      }


      if(resultado.respuesta == 'Activo'){
        console.log("Rol: " + resultado.rol);
        if(resultado.rol == 1){
         console.log("Usuario administrador");
         $(location).attr('href','http://localhost/valluno/vistas/Administrador');

        }
        
        if(resultado.rol == 2){
          console.log("Usuario director");
          $(location).attr('href','http://localhost/valluno/vistas/Director/');

        }

        if(resultado.rol == 6){
          console.log("Usuario asesor");
          $(location).attr('href','http://localhost/valluno/vistas/asesor/index.php');

        }


      }
  });

   }else alert("Por favor llena todos los campos");

 });
})
    
    
//--------------------------
