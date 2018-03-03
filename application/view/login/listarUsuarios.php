
<div class="box">
            <div class="box-header">
              <h3 class="box-title">Listado de usuarios</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
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
                    Activo
                  <?php else: ?>
                    Inactivo
                  <?php endif;  ?>   </td>

                  <td style="display: inline-block;">
                    <button class="btn btn-default btn-xs"><i class="fa fa-eye"></i></button>
                    <button class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></button>
                    <button class="btn btn-danger btn-xs"><i class="fa fa-remove"></i></button>
                  </td>
                </tr>
              <?php endforeach; ?>
              </tbody>

              </table>
            </div>
