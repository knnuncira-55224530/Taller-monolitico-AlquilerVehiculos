<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<div class="card">

    <div style="
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:25px;
        flex-wrap:wrap;
        gap:15px;
    ">

        <h2>👥 Clientes Registrados</h2>

        <a href="?module=clientes&action=create" class="btn">
            + Nuevo Cliente
        </a>

    </div>

    <?php if (!empty($clientes)): ?>

        <table>

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>

                <?php foreach ($clientes as $cliente): ?>

                    <tr>

                        <td>
                            <?= $cliente['id'] ?>
                        </td>

                        <td>
                            <?= $cliente['nombre'] ?>
                        </td>

                        <td>
                            <?= $cliente['correo'] ?>
                        </td>

                        <td>
                            <?= $cliente['telefono'] ?>
                        </td>

                        <td style="display:flex; gap:10px; flex-wrap:wrap;">

                            <a class="btn-edit"
                               href="?module=clientes&action=edit&id=<?= $cliente['id'] ?>">
                               Editar
                            </a>

                            <a class="btn-delete"
                               href="?module=clientes&action=delete&id=<?= $cliente['id'] ?>"
                               onclick="return confirm('¿Deseas eliminar este cliente?')">
                               Eliminar
                            </a>

                        </td>

                    </tr>

                <?php endforeach; ?>

            </tbody>

        </table>

    <?php else: ?>

        <div style="
            background:#1e293b;
            padding:25px;
            border-radius:15px;
            text-align:center;
            margin-top:20px;
        ">

            <h3 style="margin-bottom:10px;">
                No hay clientes registrados
            </h3>

            <p style="opacity:0.8;">
                Agrega tu primer cliente para comenzar.
            </p>

        </div>

    <?php endif; ?>

</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>