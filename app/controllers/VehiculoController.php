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
    public function edit()
{
    $id = $_GET['id'];

    $vehiculo = $this->vehiculoModel->obtenerPorId($id);

    $this->view('vehiculos/edit', [
        'vehiculo' => $vehiculo
    ]);
}

public function update()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $id = $_POST['id'];
        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $anio = $_POST['anio'];
        $categoria = $_POST['categoria'];
        $estado = $_POST['estado'];

        $this->vehiculoModel->actualizar(
            $id,
            $marca,
            $modelo,
            $anio,
            $categoria,
            $estado
        );

        header('Location: index.php');
    }
}
public function delete()
{
    if (isset($_GET['id'])) {

        $id = $_GET['id'];

        $this->vehiculoModel->eliminar($id);

        header('Location: index.php');
        exit();
    }
}
}