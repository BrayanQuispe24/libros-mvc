<?php

// Carga la clase base Controller (para usar view() y redirect())
require_once(__DIR__ . '/../core/Controller.php');

// Definición del controlador HomeController que hereda de Controller
class HomeController extends Controller
{
    // Método index (normalmente el principal de un controlador)
    public function index(): void
    {
        // Llama al método view() de la clase padre
        // Carga la vista ubicada en: ../views/home/index.php
        $this->view('home/index');
    }
}
?>