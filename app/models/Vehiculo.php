  <?php
  
  require_once __DIR__ . '/../config/Database.php';
  
  class Vehiculo {
  
      private $conn;
      private $table = 'vehiculos';
  
      private $id;
      private $marca;
      private $modelo;
      private $anio;
      private $categoria;
      private $estado;
  
      public function __construct() {
  
          $database = new Database();
  
          $this->conn = $database->connect();
      }
  
      public function obtenerTodos() {
  
          $query = "SELECT * FROM " . $this->table;
  
          $stmt = $this->conn->prepare($query);
  
          $stmt->execute();
  
          return $stmt->fetchAll(PDO::FETCH_ASSOC);
      }
  
      public function crear($marca, $modelo, $anio, $categoria, $estado) {
  
          $query = "INSERT INTO " . $this->table . "
          (marca, modelo, anio, categoria, estado)
          VALUES
          (:marca, :modelo, :anio, :categoria, :estado)";
  
          $stmt = $this->conn->prepare($query);
  
          $stmt->bindParam(':marca', $marca);
          $stmt->bindParam(':modelo', $modelo);
          $stmt->bindParam(':anio', $anio);
          $stmt->bindParam(':categoria', $categoria);
          $stmt->bindParam(':estado', $estado);
  
          return $stmt->execute();
      } 

      public function obtenerPorId($id)
{
    $query = "SELECT * FROM " . $this->table . " WHERE id = :id";

    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(':id', $id);

    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}
 public function actualizar(
    $id,
    $marca,
    $modelo,
    $anio,
    $categoria,
    $estado
) {

    $query = "UPDATE " . $this->table . "
    SET
    marca = :marca,
    modelo = :modelo,
    anio = :anio,
    categoria = :categoria,
    estado = :estado
    WHERE id = :id";

    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':marca', $marca);
    $stmt->bindParam(':modelo', $modelo);
    $stmt->bindParam(':anio', $anio);
    $stmt->bindParam(':categoria', $categoria);
    $stmt->bindParam(':estado', $estado);

    return $stmt->execute();
}
  public function eliminar($id)
{
    $query = "DELETE FROM " . $this->table . " WHERE id = :id";

    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(':id', $id);

    return $stmt->execute();
}
 }