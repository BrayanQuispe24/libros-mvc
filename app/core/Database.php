<?php

// Definición de la clase Database
class Database
{
    // Propiedad estática privada que almacenará la conexión
    // ?PDO significa que puede ser un objeto PDO o null
    private static ?PDO $connection = null;

    // Método estático para obtener la conexión a la base de datos
    public static function connect(): PDO
    {
        // Verifica si aún NO existe una conexión creada
        if (self::$connection === null) {

            // Crea una nueva conexión usando PDO
            self::$connection = new PDO(
                // DSN: define el tipo de base de datos y parámetros
                // DB_HOST y DB_NAME vienen de config.php
                'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4',

                // Usuario de la base de datos
                DB_USER,

                // Contraseña de la base de datos
                DB_PASS
            );

            // Configura PDO para que lance excepciones cuando haya errores
            self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        // Retorna la conexión (ya sea nueva o reutilizada)
        return self::$connection;
    }
}
// self:: se usa para metodos estaticos
// $this-> para las instancias de las clases