<?php

require_once __DIR__ . '/../models/Cliente.php';

class ClienteController {

    private $clienteModel;

    public function __construct() {
        $this->clienteModel = new Cliente();
    }

    private function view($ruta, $datos = []) {
        extract($datos);
        require_once __DIR__ . '/../views/' . $ruta . '.php';
    }

    public function index() {

        $clientes = $this->clienteModel->obtenerTodos();

        $this->view('clientes/index', [
            'clientes' => $clientes
        ]);
    }

    public function create() {

        $this->view('clientes/create');
    }

    public function store() {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $nombre = $_POST['nombre'];
            $telefono = $_POST['telefono'];
            $correo = $_POST['correo'];
            $numero_licencia = $_POST['numero_licencia'];

            $this->clienteModel->crear(
                $nombre,
                $telefono,
                $correo,
                $numero_licencia
            );

            header('Location: index.php?controller=cliente&action=index');
        }
    }

    public function edit() {

        $id = $_GET['id'];

        $cliente = $this->clienteModel->obtenerPorId($id);

        $this->view('clientes/edit', [
            'cliente' => $cliente
        ]);
    }

   public function update()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        $correo = $_POST['correo'];
        $numero_licencia = $_POST['numero_licencia'];

        $this->clienteModel->actualizar(
            $id,
            $nombre,
            $telefono,
            $correo,
            $numero_licencia
        );

        header('Location: index.php?controller=cliente&action=index');

        exit();
    }
}

public function delete()
{
    if (isset($_GET['id'])) {

        $id = $_GET['id'];

        $this->clienteModel->eliminar($id);

        header('Location: index.php?controller=cliente&action=index');
        exit();
    }
}
}