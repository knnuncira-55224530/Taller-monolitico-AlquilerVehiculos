<?php

require_once __DIR__ . '/../config/database.php';

class Reserva {

    private $conn;
    private $table = "reservas";

    public function __construct() {

        $database = new Database();

        $this->conn = $database->connect();
    }

    public function obtenerTodas() {

        $sql = "SELECT reservas.*,
                       clientes.nombre AS cliente,
                       vehiculos.marca,
                       vehiculos.modelo
                FROM reservas

                INNER JOIN clientes
                ON reservas.cliente_id = clientes.id

                INNER JOIN vehiculos
                ON reservas.vehiculo_id = vehiculos.id";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerClientes() {

        $sql = "SELECT * FROM clientes";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerVehiculosDisponibles() {

        $sql = "SELECT * FROM vehiculos
                WHERE estado = 'disponible'";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function crear($datos) {

        $sql = "INSERT INTO reservas
                (cliente_id, vehiculo_id, fecha_inicio, fecha_fin, estado)

                VALUES

                (:cliente_id, :vehiculo_id, :fecha_inicio, :fecha_fin, :estado)";

        $stmt = $this->conn->prepare($sql);

        $resultado = $stmt->execute([

            ':cliente_id' => $datos['cliente_id'],
            ':vehiculo_id' => $datos['vehiculo_id'],
            ':fecha_inicio' => $datos['fecha_inicio'],
            ':fecha_fin' => $datos['fecha_fin'],
            ':estado' => $datos['estado']

        ]);

        if($resultado) {

            $sqlVehiculo = "UPDATE vehiculos
                            SET estado = 'alquilado'
                            WHERE id = :id";

            $stmtVehiculo = $this->conn->prepare($sqlVehiculo);

            $stmtVehiculo->execute([
                ':id' => $datos['vehiculo_id']
            ]);
        }

        return $resultado;
    }

    public function finalizar($id) {

        // Obtener reserva

        $sql = "SELECT * FROM reservas WHERE id = :id";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute([
            ':id' => $id
        ]);

        $reserva = $stmt->fetch(PDO::FETCH_ASSOC);

        // Cambiar estado reserva

        $sqlReserva = "UPDATE reservas
                    SET estado = 'completada'
                    WHERE id = :id";

        $stmtReserva = $this->conn->prepare($sqlReserva);

        $stmtReserva->execute([
            ':id' => $id
        ]);

        // Liberar vehículo

        $sqlVehiculo = "UPDATE vehiculos
                        SET estado = 'disponible'
                        WHERE id = :vehiculo_id";

        $stmtVehiculo = $this->conn->prepare($sqlVehiculo);

        return $stmtVehiculo->execute([
            ':vehiculo_id' => $reserva['vehiculo_id']
        ]);
    }
}