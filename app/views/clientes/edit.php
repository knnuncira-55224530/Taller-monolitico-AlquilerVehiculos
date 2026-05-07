<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<h2>Editar Cliente</h2>

<form method="POST" action="?module=clientes&action=update&id=<?= $data['id']; ?>">

    <input
        type="text"
        name="nombre"
        value="<?= $data['nombre']; ?>"
        required
    >

    <input
        type="text"
        name="telefono"
        value="<?= $data['telefono']; ?>"
    >

    <input
        type="email"
        name="correo"
        value="<?= $data['correo']; ?>"
    >

    <input
        type="text"
        name="numero_licencia"
        value="<?= $data['numero_licencia']; ?>"
    >

    <button type="submit">
        Actualizar
    </button>

</form>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>