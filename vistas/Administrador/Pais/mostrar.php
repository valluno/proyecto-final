</div><!-- /.box-header -->

<div class="box-body">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

<table id="tabla" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>Codigo</th>
			<th>Nombres</th>
			<th>Descripcion</th>
            <th>Estado</th>
      <th>Actualizar</th>
      <th>Elimilar</th>
		</tr>
	</thead>
	<tbody>
	
	</tbody>

</table>
 
</div><!-- /.box-body -->  
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.2/sweetalert2.all.js"></script>

<script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
        <script>

$(document).ready(function(){
  //alert("TABLA");
  $.getJSON('./controlador2.php?funcion=pais&accion=mostrar', function (resultado) {
                //console.log(resultado[0].muni_nomb);//RECORRERLO POR ELEMENTO
    console.log(resultado);
    console.log("Longitud del JSON: "+ resultado.length);
   }); 


   $("#tabla").DataTable({

"ajax": "./controlador2.php?funcion=pais&accion=mostrar",
      "columns": [
          { "data": "id_pais"} ,
          { "data": "nombres" },
          { "data": "descripcion" },
          { "data": "estado"},
          { "data": "id_pais",
              render: function (data) {
                        return '<a href="#" onclick="paisAct('+data+')" data-codigo="'+ data + 
                               '" class="btn btn-info btn-sm editar">Actualizar</a>' 
              }
          },
          { "data": "id_pais",
              render: function (data) {
                        return '<a href="#" onclick="paisEli('+data+')" data-codigo="'+ data + 
                               '" class="btn btn-danger btn-sm borrar">Borrar</i></a>';
              }
          }
      ]

});
 });


        </script>