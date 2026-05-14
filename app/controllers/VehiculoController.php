<?php

require_once __DIR__ . '/../models/Vehiculo.php';

class VehiculoController {

    private $vehiculoModel;

    public function __construct() {
        $this->vehiculoModel = new Vehiculo();
    }

    private function view($ruta, $datos = []) {
        extract($datos);
        require_once __DIR__ . '/../views/' . $ruta . '.php';
    }

    public function index() {

        $vehiculos = $this->vehiculoModel->obtenerTodos();

        $this->view('vehiculos/index', [
            'vehiculos' => $vehiculos
        ]);
    }

    public function create() {

        $this->view('vehiculos/create');
    }

    public function store() {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $marca = $_POST['marca'];
            $modelo = $_POST['modelo'];
            $anio = $_POST['anio'];
            $categoria = $_POST['categoria'];
            $estado = $_POST['estado'];

            $this->vehiculoModel->crear(
                $marca,
                $modelo,
                $anio,
                $categoria,
                $estado
            );

            header('Location: index.php?controller=vehiculo&action=index');
        }
    }
}