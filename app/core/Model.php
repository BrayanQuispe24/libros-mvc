<?php

// Definición de la clase base Model
class Model
{
    // Propiedad protegida que almacenará la conexión a la base de datos
    // PDO es el tipo de dato (objeto de conexión)
    protected PDO $db;

    // Constructor: se ejecuta automáticamente al crear un modelo
    public function __construct()
    {
        // Asigna a $this->db la conexión a la base de datos
        // Llama al método estático connect() de la clase Database
        $this->db = Database::connect();
    }
}