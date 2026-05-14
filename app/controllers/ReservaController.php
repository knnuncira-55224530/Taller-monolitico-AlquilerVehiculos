<?php

require_once __DIR__ . '/../models/Reserva.php';
require_once __DIR__ . '/../models/Cliente.php';
require_once __DIR__ . '/../models/Vehiculo.php';

class ReservaController {

    private $reservaModel;
    private $clienteModel;
    private $vehiculoModel;

    public function __construct() {

        $this->reservaModel = new Reserva();
        $this->clienteModel = new Cliente();
        $this->vehiculoModel = new Vehiculo();
    }

    private function view($ruta, $datos = []) {
        extract($datos);
        require_once __DIR__ . '/../views/' . $ruta . '.php';
    }

    public function index() {

        $reservas = $this->reservaModel->obtenerTodas();

        $this->view('reservas/index', [
            'reservas' => $reservas
        ]);
    }

    public function create() {

        $clientes = $this->clienteModel->obtenerTodos();
        $vehiculos = $this->vehiculoModel->obtenerTodos();

        $this->view('reservas/create', [
            'clientes' => $clientes,
            'vehiculos' => $vehiculos
        ]);
    }

    public function store() {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $cliente_id = $_POST['cliente_id'];
            $vehiculo_id = $_POST['vehiculo_id'];
            $fecha_inicio = $_POST['fecha_inicio'];
            $fecha_fin = $_POST['fecha_fin'];
            $estado = $_POST['estado'];

            $this->reservaModel->crear(
                $cliente_id,
                $vehiculo_id,
                $fecha_inicio,
                $fecha_fin,
                $estado
            );

            header('Location: index.php?controller=reserva&action=index');
        }
    }
}