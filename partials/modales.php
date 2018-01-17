<div class="modal fade" id="loginModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Iniciar Sesión</h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" method="post" action="index.php">
            <div class="form-group">
              <label for="email_login" class="col-sm-2 control-label">Email</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" id="email_login" name="email_login" placeholder="ejemplo@dominio.com" value="">
              </div>
            </div>
            <div class="form-group">
              <label for="password_login" class="col-sm-2 control-label">Contraseña</label>
              <div class="col-sm-10">
                <input class="form-control" type="password" class="form-control" id="password_login" name="password_login"></input>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-10 col-sm-offset-2">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
              <input id="submit_login" name="submit" type="submit" value="Enviar" class="btn btn-primary">
            </div>
          </form>
      </div>
    </div>
</div>

<div class="modal fade" id="registerModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Registro de Usuario</h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" method="post" action="index.php">
            <div class="form-group">
              <label for="name" class="col-sm-2 control-label">Nombre y Apellido</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" placeholder="Nombre y Apellido" value="">
              </div>
            </div>
            <div class="form-group">
              <label for="email" class="col-sm-2 control-label">Email</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" id="email" name="email" placeholder="ejemplo@dominio.com" value="">
              </div>
            </div>
            <div class="form-group">
              <label for="password" class="col-sm-2 control-label">Contraseña</label>
              <div class="col-sm-10">
                <input class="form-control" type="password" class="form-control" id="password" name="password"></input>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-10 col-sm-offset-2">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
              <input id="submit" name="submit" type="submit" value="Enviar" class="btn btn-primary">
            </div>
          </form>
      </div>
    </div>
</div>