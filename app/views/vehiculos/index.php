<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<h2>Vehículos Registrados</h2>

<a href="?action=create" class="btn">
    Agregar Vehículo
</a>

<br><br>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Año</th>
            <th>Categoría</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach($vehiculos as $vehiculo): ?>
        <tr>
            <td><?= $vehiculo['id']; ?></td>
            <td><?= $vehiculo['marca']; ?></td>
            <td><?= $vehiculo['modelo']; ?></td>
            <td><?= $vehiculo['anio']; ?></td>
            <td><?= $vehiculo['categoria']; ?></td>
            <td><?= $vehiculo['estado']; ?></td>

            <td>
                <a href="?action=edit&id=<?= $vehiculo['id']; ?>" class="btn-edit">
                    Editar
                </a>

                <a href="?action=delete&id=<?= $vehiculo['id']; ?>" 
                   class="btn-delete" 
                   onclick="return confirm('¿Eliminar vehículo?')">
                    Eliminar
                </a>
            </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>