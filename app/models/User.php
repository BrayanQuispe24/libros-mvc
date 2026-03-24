<?php
require_once(__DIR__ . '/../core/Model.php');

class User extends Model
{
    public function getAll(): array
    {
        $stmt = $this->db->query("SELECT * FROM users ORDER BY id ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create(string $nombre, string $apellido, string $carnet, int $edad, string $profesion): bool
    {

        $stmt = $this->db->prepare("
            INSERT INTO users (nombre, apellido, carnet, edad, profesion)
            VALUES (?, ?, ?, ?, ?)
        ");

        return $stmt->execute([$nombre, $apellido, $carnet, $edad, $profesion]);
    }
}
?>