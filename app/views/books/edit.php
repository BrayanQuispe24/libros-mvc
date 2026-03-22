<?php require __DIR__ . '/../layouts/header.php'; ?>

<div class="container form-container">
    <h1>Editar libro</h1>

    <form method="POST" action="<?= BASE_URL ?>/books/update" class="book-form">
        <input type="hidden" name="id" value="<?= (int) $book['id'] ?>">

        <div class="form-group">
            <label for="title">Título</label>
            <input id="title" type="text" name="title" value="<?= htmlspecialchars($book['title']) ?>" required>
        </div>

        <div class="form-group">
            <label for="author">Autor</label>
            <input id="author" type="text" name="author" value="<?= htmlspecialchars($book['author']) ?>" required>
        </div>

        <div class="form-group">
            <label for="published_year">Año de publicación</label>
            <input id="published_year" type="number" name="published_year" value="<?= (int) $book['published_year'] ?>"
                required>
        </div>

        <div class="form-group">
            <label for="description">Descripción</label>
            <textarea id="description" name="description"
                rows="4"><?= htmlspecialchars($book['description'] ?? '') ?></textarea>
        </div>

        <div class="form-actions">
            <a class="btn-secondary" href="<?= BASE_URL ?>/books">Volver</a>
            <button type="submit" class="btn">Actualizar</button>
        </div>
    </form>
</div>

<?php require __DIR__ . '/../layouts/footer.php'; ?>