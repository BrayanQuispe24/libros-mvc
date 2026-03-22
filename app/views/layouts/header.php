<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= APP_NAME ?>
    </title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/style.css">
</head>

<body>
    <nav class="navbar">
        <div class="nav-container">
            <a href="<?= BASE_URL ?>/" class="brand">
                <?= APP_NAME ?>
            </a>
            <div class="nav-links">
                <a href="<?= BASE_URL ?>/">Inicio</a>
                <a href="<?= BASE_URL ?>/books">Libros</a>
                <a href="<?= BASE_URL ?>/books/create">Nuevo libro</a>
            </div>
        </div>
    </nav>