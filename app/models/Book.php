<?php

// Carga la clase base Model (para tener $this->db)
require_once(__DIR__ . '/../core/Model.php');

// Definición del modelo Book que hereda de Model
class Book extends Model
{
    // Método para obtener todos los libros
    public function getAll(): array
    {
        // Ejecuta una consulta SQL directa
        $stmt = $this->db->query("SELECT * FROM books ORDER BY id DESC");

        // Devuelve todos los resultados como array asociativo
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para buscar un libro por su ID
    public function findById(int $id): array|false
    {
        // Prepara la consulta (evita SQL Injection)
        $stmt = $this->db->prepare("SELECT * FROM books WHERE id=?");

        // Ejecuta la consulta pasando el ID como parámetro
        $stmt->execute([$id]);

        // Devuelve un solo resultado o false si no existe
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Método para crear un nuevo libro
    public function create(string $title, string $author, int $publishedYear, ?string $description): bool
    {
        // Prepara la consulta INSERT
        $stmt = $this->db->prepare("
            INSERT INTO books (title, author, published_year, description)
            VALUES (?, ?, ?, ?)
        ");

        // Ejecuta la consulta con los valores
        return $stmt->execute([$title, $author, $publishedYear, $description]);
    }

    // Método para actualizar un libro existente
    public function update(int $id, string $title, string $author, int $publishedYear, ?string $description): bool
    {
        // Prepara la consulta UPDATE
        $stmt = $this->db->prepare("
            UPDATE books
            SET title = ?, author = ?, published_year = ?, description = ?
            WHERE id = ?
        ");

        // Ejecuta la consulta con los nuevos valores
        return $stmt->execute([$title, $author, $publishedYear, $description, $id]);
    }

    // Método para eliminar un libro por ID
    public function delete(int $id): bool
    {
        // Prepara la consulta DELETE
        $stmt = $this->db->prepare("DELETE FROM books WHERE id = ?");

        // Ejecuta la eliminación
        return $stmt->execute([$id]);
    }
}
?>