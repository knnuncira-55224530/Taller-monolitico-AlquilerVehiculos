<?php

require_once __DIR__ . '/../models/Vehiculo.php';

class VehiculoController {

    public function index() {

        $vehiculo = new Vehiculo();

        $vehiculos = $vehiculo->obtenerTodos();

        require_once __DIR__ . '/../views/vehiculos/index.php';
    }
    public function create() {

        require_once __DIR__ . '/../views/vehiculos/create.php';
    }

    public function store() {

        $vehiculo = new Vehiculo();

        $vehiculo->crear($_POST);

        header("Location: /Taller-monolitico-AlquilerVehiculos/public/");
    }

    public function edit() {

        $vehiculo = new Vehiculo();

        $data = $vehiculo->obtenerPorId($_GET['id']);

        require_once __DIR__ . '/../views/vehiculos/edit.php';
    }

    public function update() {

            $vehiculo = new Vehiculo();

            $vehiculo->actualizar($_GET['id'], $_POST);

            header("Location: /Taller-monolitico-AlquilerVehiculos/public/");
    }

    public function delete() {

        $vehiculo = new Vehiculo();

        $vehiculo->eliminar($_GET['id']);

        header("Location: /Taller-monolitico-AlquilerVehiculos/public/");
    }
}
