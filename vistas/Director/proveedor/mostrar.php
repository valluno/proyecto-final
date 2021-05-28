</div><!-- /.box-header -->

<div class="box-body">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

<h1>Empleados</h1>

<table id="tabla" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>Codigo</th>
			<th>Nombres</th>
			<th>direccion</th>
            <th>estado</th>
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
  $.getJSON('./controlador.php?funcion=proveedor&accion=mostrar', function (resultado) {
                //console.log(resultado[0].muni_nomb);//RECORRERLO POR ELEMENTO
    console.log(resultado);
   }); 


$("#tabla").DataTable({

"ajax": "./controlador.php?funcion=proveedor&accion=mostrar",
      "columns": [
          { "data": 'id_proveedor'} ,
          { "data": 'nombre_proveedor' },
          { "data": 'dir_proveedor'},
          { "data": 'estado'},
          { "data": 'id_proveedor',
              render: function (data) {
                        return '<a href="#" onclick="proAct('+data+')" data-codigo="'+ data + 
                               '" class="btn btn-info btn-sm editar">Actualizar</a>' 
              }
          },
          { "data": 'id_proveedor',
              render: function (data) {
                        return '<a href="#" onclick="prodEli('+data+')" data-codigo="'+ data + 
                               '" class="btn btn-danger btn-sm borrar">Borrar</i></a>';
              }
          }
      ]

});

 });

        </script>