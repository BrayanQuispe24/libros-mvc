<?php

// Definición de la clase base Controller
class Controller
{
    // Método protegido para cargar una vista
    // string $view → nombre de la vista
    // array $data → datos que se enviarán a la vista
    // : void → no retorna nada
    protected function view(string $view, array $data = []): void
    {
        // aqui dentro se ejecuta la vista, por eso puede tener acceso a la vista
        // Convierte el array $data en variables individuales
        // Ejemplo: ['name' => 'Juan'] → $name = 'Juan'
        extract($data);

        // __DIR__ devuelve la ruta del archivo actual (Controller.php)
        // Se concatena con la ruta hacia la carpeta views
        // y el nombre de la vista
        require __DIR__ . '/../views/' . $view . '.php';
    }

    // Método protegido para redireccionar a otra ruta
    protected function redirect(string $path): void
    {
        // Envía una cabecera HTTP para redirigir al navegador
        // BASE_URL viene de config.php
        header('location: ' . BASE_URL . $path);

        // Detiene la ejecución del script (muy importante)
        exit;
    }
}
?>