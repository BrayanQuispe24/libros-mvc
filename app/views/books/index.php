<?php require __DIR__ . '/../layouts/header.php'; ?>

<div class="container">
    <div class="top-bar">
        <h1>Lista de libros</h1>
        <a class="btn" href="<?= BASE_URL ?>/books/create">Nuevo libro</a>
    </div>

    <?php if (empty($books)): ?>
        <div class="empty-box">
            <p>No hay libros registrados.</p>
        </div>
    <?php else: ?>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Año</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($books as $book): ?>
                    <tr>
                        <td>
                            <?= (int) $book['id'] ?>
                        </td>
                        <td>
                            <?= htmlspecialchars($book['title']) ?>
                        </td>
                        <td>
                            <?= htmlspecialchars($book['author']) ?>
                        </td>
                        <td>
                            <?= (int) $book['published_year'] ?>
                        </td>
                        <td>
                            <?= htmlspecialchars($book['description'] ?? '') ?>
                        </td>
                        <td class="actions">
                            <a class="btn-edit" href="<?= BASE_URL ?>/books/edit?id=<?= (int) $book['id'] ?>">
                                Editar
                            </a>

                            <form method="POST" action="<?= BASE_URL ?>/books/delete" style="display:inline;">
                                <input type="hidden" name="id" value="<?= (int) $book['id'] ?>">
                                <button type="submit" class="btn-delete" onclick="return confirm('¿Eliminar este libro?')">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

<?php require __DIR__ . '/../layouts/footer.php'; ?>