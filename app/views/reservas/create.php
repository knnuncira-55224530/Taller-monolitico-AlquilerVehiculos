<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<h2>Nueva Reserva</h2>

<form method="POST" action="?module=reservas&action=store">

    <label>Cliente</label>

    <select name="cliente_id" required>

        <?php foreach($clientes as $cliente): ?>

        <option value="<?= $cliente['id']; ?>">

            <?= $cliente['nombre']; ?>

        </option>

        <?php endforeach; ?>

    </select>

    <label>Vehículo</label>

    <select name="vehiculo_id" required>

        <?php foreach($vehiculos as $vehiculo): ?>

        <option value="<?= $vehiculo['id']; ?>">

            <?= $vehiculo['marca']; ?>
            <?= $vehiculo['modelo']; ?>

        </option>

        <?php endforeach; ?>

    </select>

    <label>Fecha inicio</label>

    <input type="date" name="fecha_inicio" required>

    <label>Fecha fin</label>

    <input type="date" name="fecha_fin" required>

    <input type="hidden" name="estado" value="activa">

    <button type="submit">
        Guardar Reserva
    </button>

</form>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>