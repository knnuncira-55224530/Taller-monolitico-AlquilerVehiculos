<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<h2>Editar Vehículo</h2>

<form method="POST" action="?action=update&id=<?= $vehiculo['id']; ?>">

    <input
       type="hidden"
       name="id"
       value="<?= $vehiculo['id']; ?>"
    > 
    <input
        type="text"
        name="marca"
        value="<?= $vehiculo['marca']; ?>"
        required
    >

    <input
        type="text"
        name="modelo"
        value="<?= $vehiculo['modelo']; ?>"
        required
    >

    <input
        type="number"
        name="anio"
        value="<?= $vehiculo['anio']; ?>"
        required
    >

    <input
        type="text"
        name="categoria"
        value="<?= $vehiculo['categoria']; ?>"
    >

    <select name="estado">

        <option value="disponible"
            <?= $vehiculo['estado'] == 'disponible' ? 'selected' : ''; ?>>
            Disponible
        </option>

        <option value="alquilado"
            <?= $vehiculo['estado'] == 'alquilado' ? 'selected' : ''; ?>>
            Alquilado
        </option>

        <option value="mantenimiento"
            <?= $vehiculo['estado'] == 'mantenimiento' ? 'selected' : ''; ?>>
            Mantenimiento
        </option>

    </select>

    <button type="submit">
        Actualizar
    </button>

</form>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>