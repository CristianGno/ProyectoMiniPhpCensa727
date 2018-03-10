<?php


class loginController extends Controller
{

private $modeloLogin;


  function __construct()
  {
    $this->modeloLogin = $this->loadModel("mdlLogin");
  }

  public function principal(){

   require APP ."view/_templates/header.php";
   require APP ."view/login/principal.php";
   require APP ."view/_templates/footer.php";
  }

  public function iniciar(){
    if (isset($_SESSION['SESION INICIADA']) && $_SESSION['SESION INICIADA'] == true) {
      header ("Location:".URL."loginController/principal");
      exit();
    }

    if (isset($_POST['btnIniciar'])){

      $this->modeloLogin->__SET('usuario', trim($_POST['txtUsuario']));
      $this->modeloLogin->__SET('clave', trim(sha1($_POST['txtClave'])));

      $usuario = $this->modeloLogin->validarUsuario();
      if ($usuario == true){
          $_SESSION['SESION INICIADA'] = true;
          $_SESSION['USUARIO NOMBRE'] = $usuario ['Nombres'];
          $_SESSION['USUARIO APELLIDO'] = $usuario ['Apellidos'];
          $_SESSION['USUARIO ROL'] = $usuario['Rol'];
          $_SESSION['USUARIO FOTO'] = $usuario['Foto'];
         header ("Location: ".URL."LoginController/principal");

      }else {
         $error = true;
      }
    }
     require APP ."view/login/index.php";
  }

  public function cerrarSesion(){
    if (isset($_SESSION['SESION INICIADA'])) {
      $_SESSION['SESION INICIADA'] = false;
      session_destroy();
    }
    header ("Location:".URL."loginController/iniciar");
  }

  public function registrarUsuario(){

    if (isset($_POST['btnGuardar'])) {
      $this->modeloLogin->__SET('documento', $_POST['txtDocumento']);
      $this->modeloLogin->__SET('IdTipoDocumento', $_POST['TipoDocumento']);
      $this->modeloLogin->__SET('nombres', $_POST['txtNombres']);
      $this->modeloLogin->__SET('apellidos', $_POST['txtApellidos']);
      $this->modeloLogin->__SET('celular', $_POST['txtCelular']);
      $this->modeloLogin->__SET('direccion', $_POST['txtDireccion']);
      $this->modeloLogin->__SET('correo', $_POST['txtCorreo']);

      if($persona = $this->modeloLogin->registrarPersona() == true){

        $ultimoIdValue = $this->modeloLogin->ultimoIdPersona(); 
      }
      
      $this->modeloLogin->__SET('idPersona', $ultimoIdValue);
      $this->modeloLogin->__SET('usuario', $_POST['txtUsuario']);
      $this->modeloLogin->__SET('clave', trim(sha1($_POST['txtClave'])));
      $this->modeloLogin->__SET('idRol', $_POST['Rol']);
      $this->modeloLogin->__SET('foto', $_POST['txtFotoFile']);
      $this->modeloLogin->__SET('estado', 1);

      $usuario = $this->modeloLogin->registrarUsuario();

     /* if ($persona && $usuario) {
        $ok = true;
      } else {
        $ok = false;
      }*/

      $ok = ($persona && $usuario) ? true : false;
    }

    $tiposDocumento = $this->modeloLogin->listarTiposDocumentos();
    $roles = $this->modeloLogin->listarRoles();
    require APP.'view/_templates/header.php';
    require APP.'view/login/registrarUsuario.php';
    require APP.'view/_templates/footer.php';
  }

  public function listarUsuarios(){

    $usuarios = $this->modeloLogin->listarUsuarios();
    $tiposDocumento = $this->modeloLogin->listarTiposDocumentos();
    $roles = $this->modeloLogin->listarRoles();
    require APP.'view/_templates/header.php';
    require APP.'view/login/listarUsuarios.php';
    require APP.'view/_templates/footer.php';
  }

  public function datosUsuario(){
    echo json_encode($this->modeloLogin->usuarioId($_POST['id']));
  }

}

 ?>
