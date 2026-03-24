<?php
require_once(__DIR__ . '/../layouts/header.php');
?>

<div class="container form-container">
    <h1>Registrar Usuario</h1>

    <form method="POST" action="<?= BASE_URL ?>/users/store" class="book-form">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input id="nombre" type="text" name="nombre" required>
        </div>

        <div class="form-group">
            <label for="apellido">Apellido</label>
            <input id="apellido" type="text" name="apellido" required>
        </div>

        <div class="form-group">
            <label for="carnet">Carnet</label>
            <input id="carnet" type="text" name="carnet" required>
        </div>

        <div class="form-group">
            <label for="edad">Edad</label>
            <input id="edad" name="edad" type="number" required>
        </div>
        <div class="form-group">
            <label for="profesion">Profesion</label>
            <input id="profesion" name="profesion" type="text" required>
        </div>

        <div class="form-actions">
            <a class="btn-secondary" href="<?= BASE_URL ?>/users">Volver</a>
            <button type="submit" class="btn">Guardar</button>
        </div>
    </form>
</div>

<?php
require_once(__DIR__ . '/../layouts/footer.php');
?>