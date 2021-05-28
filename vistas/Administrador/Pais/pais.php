


<form id="formPais" method="POST" action="">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">nombres</label>
    <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">descripcion</label>
    <input type="text" class="form-control" name="descripcion" id="descripcion">
  </div>

  <input type="hidden" id="nuevo" value="nuevo" name="accion"/>
  <input type="hidden" id="funcion" value="pais" name="funcion"/>
  <button type="button" id="btncrear" onclick="crearPais()" class="btn btn-primary">registrar</button>
</form>