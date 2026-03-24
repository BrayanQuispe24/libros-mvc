<?php
// Cargamos la base controller para poder acceder a los metodos de view y redirect
require_once(__DIR__ . '/../core/Controller.php');
require_once(__DIR__ . '/../models/User.php');

class UserController extends Controller
{
    //vamos a mostrar la lista de libros

    public function index(): void
    {
        //tenemos que instanciar la clase usuario
        $userModel = new User();
        //tenemos que obtener todos los usuarios
        $users = $userModel->getAll();
        //llamamos a la vista usuario
        $this->view('users/index', ['users' => $users]);
    }
    // Muestra el formulario para crear un nuevo libro
    public function create(): void
    {
        // Carga la vista del formulario de creación
        $this->view('users/create');
    }
    // con esta funcion registramos un usuario
    public function store(): void
    {
        // Obtiene el título enviado por POST y elimina espacios al inicio y final
        $nombre = trim($_POST['nombre'] ?? '');

        // Obtiene el autor enviado por POST y elimina espacios sobrantes
        $apellido = trim($_POST['apellido'] ?? '');

        // Obtiene el año de publicación y lo convierte a entero
        $carnet = trim($_POST['carnet'] ?? '');

        // Obtiene la descripción y elimina espacios sobrantes
        $edad = trim($_POST['edad'] ?? 0);

        $profesion = trim($_POST['profesion'] ?? 'none');

        // Valida que los campos obligatorios estén completos
        if ($nombre === '' || $apellido === '' || $carnet == '' || $edad <= 0) {
            echo 'Todos los campos obligatorios deben completarse.';
            return;
        }

        // Crea una instancia del modelo Book
        $userModel = new User();

        // Inserta el nuevo libro en la base de datos
        // Si la descripción está vacía, envía null
        $userModel->create($nombre, $apellido, $carnet, $edad, $profesion);

        // Redirige a la lista de libros
        $this->redirect('/users');
    }
}
?>