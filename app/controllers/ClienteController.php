<?php

require_once __DIR__ . '/../models/Cliente.php';

class ClienteController {

    public function index() {

        $cliente = new Cliente();

        $clientes = $cliente->obtenerTodos();

        require_once __DIR__ . '/../views/clientes/index.php';
    }

    public function create() {

        require_once __DIR__ . '/../views/clientes/create.php';
    }

    public function store() {

        $cliente = new Cliente();

        $cliente->crear($_POST);

        header("Location: /Taller-monolitico-AlquilerVehiculos/public/?module=clientes");
    }

    public function edit() {

        $cliente = new Cliente();

        $data = $cliente->obtenerPorId($_GET['id']);

        require_once __DIR__ . '/../views/clientes/edit.php';
    }

    public function update() {

        $cliente = new Cliente();

        $cliente->actualizar($_GET['id'], $_POST);

        header("Location: /Taller-monolitico-AlquilerVehiculos/public/?module=clientes");
    }

    public function delete() {

        $cliente = new Cliente();

        $cliente->eliminar($_GET['id']);

        header("Location: /Taller-monolitico-AlquilerVehiculos/public/?module=clientes");
    }
}