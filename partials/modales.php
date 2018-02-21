<div class="modal fade" id="loginModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Login</h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" method="post" action="index.php">
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
              <div id="divCheckbox" style="display: none;">
                <input type="text" name="login_user" value="1">
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
