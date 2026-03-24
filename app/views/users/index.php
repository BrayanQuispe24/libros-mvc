<?php
require_once(__DIR__ . '/../layouts/header.php');
?>

<div class="container">
    <div class="top-bar">
        <h1>Lista de usuarios</h1>
        <a href="<?= BASE_URL ?>/users/create">Nuevo usuario</a>
    </div>
    <?php if (empty($users)): ?>
        <div class="empty-box">
            <p>No hay usuarios registrados</p>
        </div>
    <?php else: ?>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Carnet</th>
                    <th>Edad</th>
                    <th>Profesion</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= (int) $user['id'] ?></td>
                        <td><?= htmlspecialchars($user['nombre']) ?></td>
                        <td><?= htmlspecialchars($user['apellido']) ?></td>
                        <td><?= htmlspecialchars($user['carnet']) ?></td>
                        <td><?= (int) $user['edad'] ?></td>
                        <td>
                            <?= htmlspecialchars($user['profesion']) ?>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
<?php
require_once(__DIR__ . '/../layouts/footer.php');
?>