function Inicio(){

	$("#navbarResponsive a").click(function(e){
     	e.preventDefault();
        var url = $(this).attr("href");
        
        if(url == "./vistas/principal/login.html"){
         $("#inicio").hide();
         $("#iniciarSession").load("./vistas/principal/login.html");
         $("#iniciarSession").show("");
        }else if(url == "./vistas/principal/logo.html"){
         $("#iniciarSession").hide();
         $("#inicio").load("./vistas/principal/logo.html");
         $("#inicio").show("");
        }
     });
}