<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<h2>Clientes Registrados</h2>

<a href="?module=clientes&action=create" class="btn">
    Agregar Cliente
</a>

<br><br>

<table>

    <thead>

        <tr>

            <th>ID</th>
            <th>Nombre</th>
            <th>Teléfono</th>
            <th>Correo</th>
            <th>Licencia</th>
            <th>Acciones</th>

        </tr>

    </thead>

    <tbody>

        <?php foreach($clientes as $cliente): ?>

        <tr>

            <td><?= $cliente['id']; ?></td>

            <td><?= $cliente['nombre']; ?></td>

            <td><?= $cliente['telefono']; ?></td>

            <td><?= $cliente['correo']; ?></td>

            <td><?= $cliente['numero_licencia']; ?></td>

            <td>

                <a
                    href="?module=clientes&action=edit&id=<?= $cliente['id']; ?>"
                    class="btn-edit"
                >
                    Editar
                </a>

                <a
                    href="?module=clientes&action=delete&id=<?= $cliente['id']; ?>"
                    class="btn-delete"
                    onclick="return confirm('¿Eliminar cliente?')"
                >
                    Eliminar
                </a>

            </td>

        </tr>

        <?php endforeach; ?>

    </tbody>

</table>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>