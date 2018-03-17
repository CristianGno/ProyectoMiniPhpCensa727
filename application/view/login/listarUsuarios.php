<div class="box">
  <div class="box-header">
    <h3 class="box-title">Listado de usuarios</h3>
    <a href="<?php echo URL ?>loginController/registrarUsuario" style="margin: 5px!important; padding: 2px;" class="pull-right">
      <button type="button" class="btn btn-info btn-md">
        <i class="fa fa-plus"></i> <b>Crear usuario</b>
      </button>
    </a>
  </div>



  <!-- /.box-header -->
  <div class="box-body">


    <div class="table-responsive">
      <table id="example2" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Documento</th>
            <th>Nombres(s)</th>
            <th>Apellidos</th>
            <th>Usuario</th>
            <th>Rol</th>
            <th>Estado</th>
            <th>Opciones</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($usuarios as $value): ?>
            <tr>
              <td><?php echo $value['Documento'] ?></td>
              <td><?php echo $value['Nombres'] ?></td>
              <td><?php echo $value['Apellidos'] ?></td>
              <td><?php echo $value['Usuario'] ?></td>
              <td><?php echo $value['Rol'] ?></td>
              <td><?php if ($value['Estado'] == 1): ?>
                <label class="label-success" style="padding: 2px; border: solid 1px rgba(0,0,0,.3);">Activo</label>
              <?php else: ?>
                <label class="label label-danger" style="padding: 2px; border: solid 1px rgba(0,0,0,.3);">Inactivo</label>
              <?php endif;  ?>   </td>

              <td style="display: inline-block;">
                <button class="btn btn-primary btn-xs" onclick="cambiarEstado('<?= $value['IdPersona']; ?>')" title="Cambiar Estado">
                  <i class="fa fa-refresh"></i>
                </button>

                <button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modal-editar-usuario" title="Editar" onclick="datosUsuario('<?= $value['IdPersona']; ?>')">
                  <i class="fa fa-edit"></i>
                </button>

                <button class="btn btn-danger btn-xs" title="Eliminar">
                  <i class="fa fa-remove"></i>
                </button>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>

      </table>
    </div>
  </div>


  <!-- /.Modal de editar usuarios -->
  <div class="modal fade" id="modal-editar-usuario">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"></h4>
          </div>
          <div class="modal-body">
            <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title">Editar Usuario</h3>
              </div>
              <!-- /.box-header -->
              <form action="" method="POST">
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-6">

                      <input name="IdUsuario" type="hidden" id="IdUsuario">

                      <div class="form-group">
                        <label>Tipo Documento</label>
                        <select name="TipoDocumento" class="form-control">
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
                      <input type="text" name="txtNombres" class="form-control" value="">
                    </div>

                    <div class="form-group">
                      <label>Apellidos</label>
                      <input type="text" name="txtApellidos" class="form-control" value="">
                    </div>

                    <div class="form-group">
                      <label>Celular</label>
                      <input type="text" name="txtCelular" class="form-control" value="">
                    </div>

                    <div class="form-group">
                      <label>Direccion</label>
                      <input type="text" name="txtDireccion" class="form-control" value="">
                    </div>



                    <!-- /.form-group -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Correo</label>
                      <input type="email" name="txtCorreo" class="form-control" value="">
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                      <label>Usuario</label>
                      <input type="text" name="txtUsuario" class="form-control" value="">
                    </div>

                    <div class="form-group">
                      <label>Rol</label>
                      <select name="Rol" id="" class="form-control">
                        <option selected="selected">Seleccionar un rol...</option>

                        <?php foreach($roles as $value) : ?>
                          <option value="<?= $value['IdRol'] ?>"><?= $value['Rol'] ?></option>
                        <?php endforeach; ?>

                      </select>
                    </div>

                   <div class="form-group row">
                     <div class="col-md-8 col-md-offset-2">
                       <img id="imgUsuario" class="img-responsive">
                     </div>
                   </div>

                    <div class="form-group row">
                      <br>
                      <div class="col-sm-12 col-xs-12">
                        <span class="btn btn-primary btn-sm btn-file">
                          <span class="glyphicon glyphicon-folder-open"></span>
                          &nbsp;&nbsp;Seleccione archivo
                          <input type="file" id="value_file" name="txtFoto">
                        </span>
                        <input type="text" id="txtFotoFile" name="txtFotoFile" value="" style="display: none;">
                      </div>

                      <div class="col-sm-12 col-xs-12">
                        <p id="name_file">Ningún archivo seleccionado</p>
                      </div>

                    </div>

                    <!-- <div class="row">
                      <div class="form-group col-md-6">
                        <button class="btn btn-success form-control" name="btnGuardar"><i class="fa fa-save"> Guardar</i></button>
                      </div>
                      <div class="form-group col-md-6">
                        <a href=" URL loginController/principal" class="btn btn-danger form-control"><i class="fa fa-ban"> Cancelar</i></a>
                      </div>
                    </div> -->

                  

                  <!-- /.form-group -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-body -->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
            <button type="submit" name="btnEditar" class="btn btn-primary">Guardar cambios</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      </form>
      <!-- /.modal-dialog -->
    </div>
<!-- /.modal -->

<script>
  function datosUsuario(id){
    $.ajax({
      url: '<?= URL ?>loginController/datosUsuario',
      type: 'POST',
      dataType: 'json',
      data: {'id': id}
    }).done(function(response){
      $.each(response, function(index, value){
        $('input[name=IdUsuario]').val(value.IdUsuario);
        $('input[name=txtCorreo]').val(value.Correo);
        $('input[name=txtDocumento]').val(value.Documento);
        $('input[name=txtUsuario]').val(value.Usuario);
        $('input[name=txtNombres]').val(value.Nombres);
        $('input[name=txtApellidos]').val(value.Apellidos);
        $('input[name=txtCelular]').val(value.Celular);
        $('input[name=txtDireccion]').val(value.Direccion);
        $('#imgUsuario').attr('src', url + 'bootstrap/dist/img/' + value.Foto);
        $('select[name=TipoDocumento]').val(value.IdTipoDocumento)
        $('select[name=Rol]').val(value.IdRol);
        $('input[name=txtFotoFile]').val(value.Foto);
      });
    });
  }


  $(document).ready(function(){
      $('#value_file').change(function(){
          var name = $(this).val();

          if(name.match(/fakepath/)){
            file = name.replace(/C:\\fakepath\\/, '');
          }
          var src = url + "bootstrap/dist/img/" + file;
          $('#txtFotoFile').val(file);
          $('#imgUsuario').removeAttr("src");
          $('#imgUsuario').attr("src", src);
          $('#txtFoto').text(file)

      });
  });
</script>



<?php if(isset($_up) && $_up == true): ?>
  <script>
    $(document).ready(function(){

      swal({
        title: 'Se actualizó con éxito',
        type: 'success',
        confirmButton: "#3CB371",
        confirmButtonText: "Aceptar",
        closeOnConfirm: false,
        closeOnCancel: false,
      }, 

      function(isConfirm){
        if (isConfirm) {
          window.location = url + '/loginController/listarUsuarios';
        }
      }

      );
    });
  </script>
<?php endif; ?>

<?php if(isset($_up) && $_up == false): ?>
  <script>
    $(document).ready(function(){

      swal({
        title: 'Error al actualizar',
        type: 'error',
        confirmButton: "#3CB371",
        confirmButtonText: "Aceptar",
        closeOnConfirm: false,
        closeOnCancel: false,
      });
    });
  </script>
<?php endif; ?>


<script>
  function cambiarEstado(id){
    swal({
      title: "¿Realmente desea cambiar el estado del usuario?",
      type: "warning",
      confirmButton: "#3CB371",
      confirmButtonText:"Aceptar",
      showCancelButton: true,
      closeOnConfirm: false,
      cancelButtonText: "Cancelar",
      confirmButtonClass: 'btn-danger',

    });
  }
</script>