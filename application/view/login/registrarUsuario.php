<div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Registro De Usuario</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
      <form action="" method="POST">
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">

              <div class="form-group">
                <label>Tipo Documento</label>
                <select name"selTipoDocumento" class="form-control select2" style="width: 100%;">
                  <option selected="selected">Selecciona...</option>

                  <?php 

                    foreach ($tiposDocumento as $value): ?>
                      <option value="<?php echo $value['IdTipoDocumento']; ?>"><?php echo $value['TipoDocumento']; ?></option>
                  <?php endforeach; ?>

                </select>
              </div>

              <div class="form-group">
                <label>Documento</label>
              <input type="text" name="txtDocumento" class="form-control" value="">
              </div>

              <div class="form-group">
                <label>Nombres</label>
              <input type="text" name="txtDocumento" class="form-control" value="">
              </div>

              <div class="form-group">
                <label>Apellidos</label>
              <input type="text" name="txtDocumento" class="form-control" value="">
              </div>

              <div class="form-group">
                <label>Celular</label>
              <input type="text" name="txtDocumento" class="form-control" value="">
              </div>

              <div class="form-group">
                <label>Direccion</label>
              <input type="text" name="txtDocumento" class="form-control" value="">
              </div>



              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Correo</label>
              <input type="email" name="txtDocumento" class="form-control" value="">
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Usuario</label>
              <input type="text" name="txtUsuario" class="form-control" value="">
              </div>

              <div class="form-group">
                <label>Rol</label>
              <select name"Rol" class="form-control select2" style="width: 100%;">
                <option selected="selected">Seleccionar un rol...</option>
              
                <?php foreach($roles as $value) : ?>
                  <option value="<?= $value['IdRol'] ?>"><?= $value['Rol'] ?></option>
                <?php endforeach; ?>

              </select>
              </div>
              
              <div class="form-group">
                <label>Clave</label>
              <input type="text" name="txtClave" class="form-control" value="">
              </div>

              <div class="form-group">
              <label>Confimar Clave</label>
              <input type="password" name="txtConfClave" class="form-control" value="">
              </div>

              <div class="form-group row">
                <br>
                <div class="col-md-4 col-md-4 col-sm-12 col-xs-12">
                  <span class="btn btn-primary btn-sm btn-file">
                    <span class="glyphicon glyphicon-folder-open"></span>
                    &nbsp;&nbsp;Seleccione archivo
                    <input type="file" id="value_file" name="txtFoto">
                  </span>
                   <input type="text" id="txtFotoFile" name="" value="" style="display: none;">
                </div>

                <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                  <p id="name_file">Ningún archivo seleccionado</p>
                </div>

              </div>

              <div class="row">
                <div class="form-group col-md-6">
                  <button class="btn btn-success form-control" name="btnGuardar"><i class="fa fa-save"> Guardar</i></button>
                </div>
                <div class="form-group col-md-6">
                  <a href="<?= URL ?>loginController/principal" class="btn btn-danger form-control"><i class="fa fa-ban"> Cancelar</i></a>
                </div>
              </div>
        
          </form>

              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->

      </div>

