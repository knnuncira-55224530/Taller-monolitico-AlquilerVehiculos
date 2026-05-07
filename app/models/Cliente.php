<?php

require_once __DIR__ . '/../config/database.php';

class Cliente {

    private $conn;
    private $table = "clientes";

    public function __construct() {

        $database = new Database();

        $this->conn = $database->connect();
    }

    public function obtenerTodos() {

        $sql = "SELECT * FROM " . $this->table;

        $stmt = $this->conn->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function crear($datos) {

        $sql = "INSERT INTO " . $this->table . "
                (nombre, telefono, correo, numero_licencia)
                VALUES
                (:nombre, :telefono, :correo, :numero_licencia)";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([

            ':nombre' => $datos['nombre'],
            ':telefono' => $datos['telefono'],
            ':correo' => $datos['correo'],
            ':numero_licencia' => $datos['numero_licencia']

        ]);
    }

    public function obtenerPorId($id) {

        $sql = "SELECT * FROM " . $this->table . "
                WHERE id = :id";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute([
            ':id' => $id
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizar($id, $datos) {

        $sql = "UPDATE " . $this->table . "
                SET
                nombre = :nombre,
                telefono = :telefono,
                correo = :correo,
                numero_licencia = :numero_licencia
                WHERE id = :id";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([

            ':nombre' => $datos['nombre'],
            ':telefono' => $datos['telefono'],
            ':correo' => $datos['correo'],
            ':numero_licencia' => $datos['numero_licencia'],
            ':id' => $id

        ]);
    }

    public function eliminar($id) {

        $sql = "DELETE FROM " . $this->table . "
                WHERE id = :id";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            ':id' => $id
        ]);
    }
}