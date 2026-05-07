<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<h2>Reservas Registradas</h2>

<a href="?module=reservas&action=create" class="btn">
    Nueva Reserva
</a>

<br><br>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Cliente</th>
            <th>Vehículo</th>
            <th>Inicio</th>
            <th>Fin</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach($reservas as $reserva): ?>
        <tr>
            <td><?= $reserva['id']; ?></td>
            <td><?= $reserva['cliente']; ?></td>
            <td>
                <?= $reserva['marca']; ?>
                <?= $reserva['modelo']; ?>
            </td>
            <td><?= $reserva['fecha_inicio']; ?></td>
            <td><?= $reserva['fecha_fin']; ?></td>
            <td><?= $reserva['estado']; ?></td>

            <td>
                <?php if($reserva['estado'] == 'activa'): ?>
                    <a href="?module=reservas&action=finalizar&id=<?= $reserva['id']; ?>" 
                       class="btn-finalizar">
                        Finalizar
                    </a>
                <?php endif; ?>
            </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>