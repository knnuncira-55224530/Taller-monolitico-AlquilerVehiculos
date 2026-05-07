<?php

require_once __DIR__ . '/../models/Reserva.php';

class ReservaController {

    public function index() {

        $reserva = new Reserva();

        $reservas = $reserva->obtenerTodas();

        require_once __DIR__ . '/../views/reservas/index.php';
    }

    public function create() {

        $reserva = new Reserva();

        $clientes = $reserva->obtenerClientes();

        $vehiculos = $reserva->obtenerVehiculosDisponibles();

        require_once __DIR__ . '/../views/reservas/create.php';
    }

    public function store() {

        $fechaInicio = $_POST['fecha_inicio'];

        $fechaFin = $_POST['fecha_fin'];

        $hoy = date('Y-m-d');

        // Validar fechas pasadas

        if($fechaInicio < $hoy) {

            die("Error: La fecha de inicio no puede ser anterior a hoy.");
        }

        // Validar fecha fin

        if($fechaFin < $fechaInicio) {

            die("Error: La fecha final no puede ser menor que la fecha inicial.");
        }

        $reserva = new Reserva();

        $reserva->crear($_POST);

        header("Location: /Taller-monolitico-AlquilerVehiculos/public/?module=reservas");
    }
    
    public function finalizar() {

        $reserva = new Reserva();

        $reserva->finalizar($_GET['id']);

        header("Location: /Taller-monolitico-AlquilerVehiculos/public/?module=reservas");
    }
}