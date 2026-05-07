<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<h2>Registrar Vehículo</h2>

<form method="POST" action="?action=store">

    <input type="text" name="marca" placeholder="Marca" required>

    <input type="text" name="modelo" placeholder="Modelo" required>

    <input type="number" name="anio" placeholder="Año" required>

    <input type="text" name="categoria" placeholder="Categoría">

    <select name="estado">

        <option value="disponible">Disponible</option>

        <option value="alquilado">Alquilado</option>

        <option value="mantenimiento">Mantenimiento</option>

    </select>

    <button type="submit">Guardar</button>

</form>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>