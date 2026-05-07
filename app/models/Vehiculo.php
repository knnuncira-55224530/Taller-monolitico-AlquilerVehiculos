<?php

require_once __DIR__ . '/../config/database.php';

class Vehiculo {

    private $conn;
    private $table = "vehiculos";

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
                (marca, modelo, anio, categoria, estado)
                VALUES
                (:marca, :modelo, :anio, :categoria, :estado)";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            ':marca'     => $datos['marca'],
            ':modelo'    => $datos['modelo'],
            ':anio'      => $datos['anio'],
            ':categoria' => $datos['categoria'],
            ':estado'    => $datos['estado']
        ]);
    }

    public function obtenerPorId($id) {

    $sql = "SELECT * FROM " . $this->table . " WHERE id = :id";

    $stmt = $this->conn->prepare($sql);

    $stmt->execute([
        ':id' => $id
    ]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizar($id, $datos) {

        $sql = "UPDATE " . $this->table . "
                SET
                marca = :marca,
                modelo = :modelo,
                anio = :anio,
                categoria = :categoria,
                estado = :estado
                WHERE id = :id";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([

            ':marca' => $datos['marca'],
            ':modelo' => $datos['modelo'],
            ':anio' => $datos['anio'],
            ':categoria' => $datos['categoria'],
            ':estado' => $datos['estado'],
            ':id' => $id

        ]);
    }

    public function eliminar($id) {

        $sql = "DELETE FROM " . $this->table . " WHERE id = :id";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([

            ':id' => $id

        ]);
    }
} 