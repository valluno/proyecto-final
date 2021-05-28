


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

  <div class="mb-3 form-check">
    <select class="form-control" id="rol" name="rol">
		<option value="1">Admin</option>			
        <option value="2">director</option>
        <option value="3">vendedores</option>			
        <option value="4">gerente</option>
        <option value="5">gerente de ventas</option>			
        <option value="6">gerente de clientes</option>
    </select>
  </div>

  <input type="hidden" id="nuevo" value="nuevo" name="accion"/>
  <button type="button" id="btncrear" onclick="crear()" class="btn btn-primary">registrar</button>
</form>
