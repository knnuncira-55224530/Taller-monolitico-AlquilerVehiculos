<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<h2>Registrar Cliente</h2>

<form method="POST" action="?module=clientes&action=store">

    <input
        type="text"
        name="nombre"
        placeholder="Nombre"
        required
    >

    <input
        type="text"
        name="telefono"
        placeholder="Teléfono"
    >

    <input
        type="email"
        name="correo"
        placeholder="Correo"
    >

    <input
        type="text"
        name="numero_licencia"
        placeholder="Número de licencia"
    >

    <button type="submit">
        Guardar
    </button>

</form>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>