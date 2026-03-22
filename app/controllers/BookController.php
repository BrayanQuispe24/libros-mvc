<?php

// Carga la clase base Controller para poder usar métodos como view() y redirect()
require_once(__DIR__ . '/../core/Controller.php');

// Carga el modelo Book para poder interactuar con la tabla books
require_once(__DIR__ . '/../models/Book.php');

// Define el controlador de libros
// Ojo: aquí debería llamarse BookController, no BockController
class BookController extends Controller
{
    // Muestra la lista de libros
    public function index(): void
    {
        // Crea una instancia del modelo Book
        $bookModel = new Book();

        // Obtiene todos los libros de la base de datos
        $books = $bookModel->getAll();

        // Carga la vista books/index y le pasa el arreglo de libros
        $this->view('books/index', ['books' => $books]);
    }

    // Muestra el formulario para crear un nuevo libro
    public function create(): void
    {
        // Carga la vista del formulario de creación
        $this->view('books/create');
    }

    // Procesa el formulario de creación
    public function store(): void
    {
        // Obtiene el título enviado por POST y elimina espacios al inicio y final
        $title = trim($_POST['title'] ?? '');

        // Obtiene el autor enviado por POST y elimina espacios sobrantes
        $author = trim($_POST['author'] ?? '');

        // Obtiene el año de publicación y lo convierte a entero
        $publishedYear = (int) ($_POST['published_year'] ?? 0);

        // Obtiene la descripción y elimina espacios sobrantes
        $description = trim($_POST['description'] ?? '');

        // Valida que los campos obligatorios estén completos
        if ($title === '' || $author === '' || $publishedYear <= 0) {
            echo 'Todos los campos obligatorios deben completarse.';
            return;
        }

        // Crea una instancia del modelo Book
        $bookModel = new Book();

        // Inserta el nuevo libro en la base de datos
        // Si la descripción está vacía, envía null
        $bookModel->create($title, $author, $publishedYear, $description ?: null);

        // Redirige a la lista de libros
        $this->redirect('/books');
    }

    // Muestra el formulario para editar un libro existente
    public function edit(): void
    {
        // Obtiene el id desde la URL usando GET
        $id = (int) ($_GET['id'] ?? 0);

        // Valida que el id sea correcto
        if ($id <= 0) {
            echo 'ID inválido';
            return;
        }

        // Crea una instancia del modelo Book
        $bookModel = new Book();

        // Busca el libro por su id
        $book = $bookModel->findById($id);

        // Si no existe el libro, muestra mensaje de error
        if (!$book) {
            echo 'Libro no encontrado';
            return;
        }

        // Carga la vista de edición y le pasa los datos del libro
        $this->view('books/edit', [
            'book' => $book
        ]);
    }

    // Procesa el formulario de actualización
    public function update(): void
    {
        // Obtiene el id enviado por POST
        $id = (int) ($_POST['id'] ?? 0);

        // Obtiene el título enviado por POST
        $title = trim($_POST['title'] ?? '');

        // Obtiene el autor enviado por POST
        $author = trim($_POST['author'] ?? '');

        // Obtiene el año de publicación enviado por POST
        $publishedYear = (int) ($_POST['published_year'] ?? 0);

        // Obtiene la descripción enviada por POST
        $description = trim($_POST['description'] ?? '');

        // Valida que los datos sean correctos
        if ($id <= 0 || $title === '' || $author === '' || $publishedYear <= 0) {
            echo 'Datos inválidos';
            return;
        }

        // Crea una instancia del modelo Book
        $bookModel = new Book();

        // Actualiza el libro en la base de datos
        $bookModel->update($id, $title, $author, $publishedYear, $description ?: null);

        // Redirige a la lista de libros
        $this->redirect('/books');
    }

    // Elimina un libro
    public function delete(): void
    {
        // Obtiene el id enviado por POST
        $id = (int) ($_POST['id'] ?? 0);

        // Valida que el id sea correcto
        if ($id <= 0) {
            echo 'ID inválido';
            return;
        }

        // Crea una instancia del modelo Book
        $bookModel = new Book();

        // Elimina el libro de la base de datos
        $bookModel->delete($id);

        // Redirige a la lista de libros
        $this->redirect('/books');
    }
}
?>