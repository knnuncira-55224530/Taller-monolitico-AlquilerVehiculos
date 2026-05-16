<?php

require_once __DIR__ . '/../config/Database.php';

class Cliente {

    private $conn;
    private $table = 'clientes';

    private $id;
    private $nombre;
    private $telefono;
    private $correo;
    private $numero_licencia;

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

    public function obtenerPorId($id) {

        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $id);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function crear($nombre, $telefono, $correo, $numero_licencia) {

        $query = "INSERT INTO " . $this->table . "
        (nombre, telefono, correo, numero_licencia)
        VALUES
        (:nombre, :telefono, :correo, :numero_licencia)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':numero_licencia', $numero_licencia);

        return $stmt->execute();
    }

    public function actualizar(
    $id,
    $nombre,
    $telefono,
    $correo,
    $numero_licencia
) {

    $query = "UPDATE " . $this->table . "
    SET
        nombre = :nombre,
        telefono = :telefono,
        correo = :correo,
        numero_licencia = :numero_licencia
    WHERE id = :id";

    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':telefono', $telefono);
    $stmt->bindParam(':correo', $correo);
    $stmt->bindParam(':numero_licencia', $numero_licencia);

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