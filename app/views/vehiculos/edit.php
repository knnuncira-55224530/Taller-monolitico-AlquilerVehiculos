<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<h2>Editar Vehículo</h2>

<form method="POST" action="?action=update&id=<?= $data['id']; ?>">

    <input
        type="text"
        name="marca"
        value="<?= $data['marca']; ?>"
        required
    >

    <input
        type="text"
        name="modelo"
        value="<?= $data['modelo']; ?>"
        required
    >

    <input
        type="number"
        name="anio"
        value="<?= $data['anio']; ?>"
        required
    >

    <input
        type="text"
        name="categoria"
        value="<?= $data['categoria']; ?>"
    >

    <select name="estado">

        <option value="disponible"
            <?= $data['estado'] == 'disponible' ? 'selected' : ''; ?>>
            Disponible
        </option>

        <option value="alquilado"
            <?= $data['estado'] == 'alquilado' ? 'selected' : ''; ?>>
            Alquilado
        </option>

        <option value="mantenimiento"
            <?= $data['estado'] == 'mantenimiento' ? 'selected' : ''; ?>>
            Mantenimiento
        </option>

    </select>

    <button type="submit">
        Actualizar
    </button>

</form>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>