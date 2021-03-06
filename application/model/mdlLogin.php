<?php

include_once ("mdlPersona.php");
class mdlLogin extends mdlPersona
{
  //atributos (Usuario)
  private $idUsuario;
  private $usuario;
  private $clave;
  private $idRol;
  private $estado;
  private $foto;

  //Metodos SET y GET
  public function __SET($atributo, $valor)
  {
    $this->$atributo =$valor;
  }

  public function __GET($atributo)
  {
    return $this->$atributo;
  }

    public function validarUsuario(){

      $sql="SELECT P.Documento, P.Nombres, P.Apellidos, P.Correo, U.Usuario, R.Rol, U.Foto
      FROM personas AS P
      JOIN usuario AS U
      ON P.IdPersona = U.IdPersona
      JOIN roles as R
      ON R.IdRol = U.IdRol
      WHERE U.Usuario = ? AND U.Clave= ? AND U.Estado = 1";

         $stm = $this->db->prepare($sql);
         $stm->bindParam(1, $this->usuario);
         $stm->bindParam(2, $this->clave);
         $stm->execute();
         return $stm->fetch(PDO::FETCH_ASSOC);
    }

    public function listarUsuarios(){
      $sql = "SELECT P.IdPersona, P.Documento, P.Nombres, P.Apellidos, P.Correo, U.Usuario, R.Rol, U.Estado, U.Foto, U.IdUsuario
              FROM personas AS p
              INNER JOIN usuario AS U
              ON P.IdPersona = U.IdPersona
              INNER JOIN roles AS R
              ON R.IdRol = U.IdRol";

              $ejc = $this ->db->prepare($sql);
              $ejc ->execute();
              return $ejc->fetchALL(PDO::FETCH_ASSOC);
    }

    public function registrarUsuario(){
      $sql="INSERT INTO usuario(IdPersona, Usuario, Clave, Foto, IdRol, Estado)
      VALUES (?,?,?,?,?,?)";
      $stm = $this->db->prepare($sql);
      $stm->bindParam(1, $this->idPersona);
      $stm->bindParam(2, $this->usuario);
      $stm->bindParam(3, $this->clave);
      $stm->bindParam(4, $this->foto);
      $stm->bindParam(5, $this->idRol);
      $stm->bindParam(6, $this->estado);
      $resultado = $stm->execute();
      return $resultado;
    }


    public function listarRoles(){
      $query = "SELECT IdRol, Rol 
                FROM roles";

      $stm = $this->db->prepare($query);
      $stm->execute();
      $resultado = $stm->fetchAll(PDO::FETCH_ASSOC);
      return $resultado;
    }

    public function usuarioId($id){
      $sql = "SELECT P.IdPersona, P.Documento, P.Nombres, P.Apellidos, P.IdTipoDocumento, P.Direccion, P.Celular, P.Correo, U.Foto, R.IdRol, R.Rol, U.IdUsuario, U.Usuario
              FROM personas AS P
              INNER JOIN usuario AS U
              ON U.IdPersona = P.IdPersona
              INNER JOIN roles AS R
              ON U.IdRol = R.IdRol
              WHERE U.IdUsuario = ?";

      $query = $this->db->prepare($sql);
      $query->bindParam(1, $id);
      $query->execute();
      return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function modificarUsuario(){
      $sql = "UPDATE personas AS P 
              INNER JOIN usuario AS U
              ON P.IdPersona = U.IdPersona
              SET P.Documento = ?,
              P.IdTipoDocumento = ?,
              P.Nombres = ?,
              P.Apellidos = ?,
              P.Correo = ?,
              P.Celular = ?,
              P.Direccion = ?,
              U.Foto = ?,
              U.IdRol = ?
              WHERE U.IdUsuario = ?";

      $query = $this->db->prepare($sql);
      $query->bindParam( 1, $this->documento );
      $query->bindParam( 2, $this->idTipoDocumento  );
      $query->bindParam( 3, $this->nombres  );
      $query->bindParam( 4, $this->apellidos  );
      $query->bindParam( 5, $this->correo  );
      $query->bindParam( 6, $this->celular  );
      $query->bindParam( 7, $this->direccion  );
      $query->bindParam( 8, $this->foto  );
      $query->bindParam( 9, $this->idRol  );
      $query->bindParam( 10, $this->idUsuario );

      return $query->execute();
    }

  }
