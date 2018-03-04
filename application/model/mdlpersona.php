  <?php
  class mdlPersona
  {
    //atributos
    public $idPersona;
    public $documento;
    public $idTipoDocumento;
    public $nombres;
    public $apellidos;
    public $celular;
    public $direccion;
    public $correo;
    public $db;

    //Metodos SET y GET
    public function __SET($atributo, $valor)
    {
      $this->$atributo =$valor;
    }

    public function __GET($atributo)
    {
      $this->$atributo =$valor;
    }

    function __construct($db)
    {
      try{
      $this->db =$db;
    } catch (PDOException $e){
      exit ("No se puede establecer la conexión");
    }
  }
    public function registrarPersona(){
      $sql = "INSERT INTO personas(Documento, IdTipoDocumento, Nombres, Apellidos, Celular, Direccion, Correo)
      VALUES (?,?,?,?,?,?,?)";
      $stm = $this->db->prepare($sql);
      $stm->bindParam(1, $this->documento);
      $stm->bindParam(2, $this->IdTipoDocumento);
      $stm->bindParam(3, $this->nombres);
      $stm->bindParam(4, $this->apellidos);
      $stm->bindParam(5, $this->celular);
      $stm->bindParam(6, $this->direccion);
      $stm->bindParam(7, $this->correo);
      $resultado = $stm->execute();
      return $resultado;

    }

    public function listarTiposDocumentos(){
      $query = "SELECT IdTipoDocumento, TipoDocumento 
                FROM tiposdocumentos";

      $stm = $this->db->prepare($query);
      $stm->execute();
      $resultado = $stm->fetchAll(PDO::FETCH_ASSOC);
      return $resultado;
    }

    public function ultimoIdPersona()
    {
      $sql = "SELECT MAX(IdPersona) AS ultimoIdPersona FROM personas";
      $query = $this->db->prepare($sql);
      $query->execute();
      $ultimoId = $query->fetchAll( PDO::FETCH_ASSOC );
      foreach ($ultimoId as $value) {
          $ultimoIdValue = $value['ultimoIdPersona'];
      }
      return $ultimoIdValue;
    }

  }
