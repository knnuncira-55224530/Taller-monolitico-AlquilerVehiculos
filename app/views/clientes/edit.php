<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<h2>Editar Cliente</h2>

<form method="POST" action="?controller=cliente&action=update">

    <input
        type="hidden"
        name="id"
        value="<?= $cliente['id']; ?>"
    >

    <input
        type="text"
        name="nombre"
        value="<?= $cliente['nombre']; ?>"
        required
    >

    <input
        type="text"
        name="telefono"
        value="<?= $cliente['telefono']; ?>"
    >

    <input
        type="email"
        name="correo"
        value="<?= $cliente['correo']; ?>"
    >

    <input
        type="text"
        name="numero_licencia"
        value="<?= $cliente['numero_licencia']; ?>"
    >

    <button type="submit">
        Actualizar
    </button>

</form>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>