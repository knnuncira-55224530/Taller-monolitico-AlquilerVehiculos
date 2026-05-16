<?php

require_once __DIR__ . '/../config/Database.php';

class Reserva {

    private $conn;
    private $table = 'reservas';

    private $id;
    private $cliente_id;
    private $vehiculo_id;
    private $fecha_inicio;
    private $fecha_fin;
    private $estado;

    public function __construct() {

        $database = new Database();

        $this->conn = $database->connect();
    }

    public function obtenerTodas()
{
    $query = "
    SELECT
        reservas.*,
        clientes.nombre AS cliente,
        vehiculos.marca,
        vehiculos.modelo

    FROM reservas

    INNER JOIN clientes
    ON reservas.cliente_id = clientes.id

    INNER JOIN vehiculos
    ON reservas.vehiculo_id = vehiculos.id
    ";

    $stmt = $this->conn->prepare($query);

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

    public function crear($cliente_id, $vehiculo_id, $fecha_inicio, $fecha_fin, $estado) {

        $query = "INSERT INTO " . $this->table . "
        (cliente_id, vehiculo_id, fecha_inicio, fecha_fin, estado)
        VALUES
        (:cliente_id, :vehiculo_id, :fecha_inicio, :fecha_fin, :estado)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':cliente_id', $cliente_id);
        $stmt->bindParam(':vehiculo_id', $vehiculo_id);
        $stmt->bindParam(':fecha_inicio', $fecha_inicio);
        $stmt->bindParam(':fecha_fin', $fecha_fin);
        $stmt->bindParam(':estado', $estado);

        return $stmt->execute();
    }

    public function finalizar($id)
{
    $query = "
    UPDATE reservas
    SET estado = 'finalizada'
    WHERE id = :id
    ";

    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(':id', $id);

    return $stmt->execute();
}
}