<?php

$module = $_GET['module'] ?? 'vehiculos';
$action = $_GET['action'] ?? 'index';

switch($module) {
    case 'clientes':
        require_once '../app/controllers/ClienteController.php';
        $controller = new ClienteController();
        break;

    case 'reservas':
        require_once '../app/controllers/ReservaController.php';
        $controller = new ReservaController();
        break;

    default: // El default SIEMPRE al final de su switch
        require_once '../app/controllers/VehiculoController.php';
        $controller = new VehiculoController();
        break;
}

switch($action) {
    case 'create':
        $controller->create();
        break;

    case 'store':
        $controller->store();
        break;

    case 'edit':
        $controller->edit();
        break;

    case 'update':
        $controller->update();
        break;

    case 'delete':
        $controller->delete();
        break;

    case 'finalizar':
        $controller->finalizar();
        break;

    default:
        $controller->index();
        break;
}