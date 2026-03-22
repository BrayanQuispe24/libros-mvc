<?php
class Router
{
    // Arreglo donde se guardan las rutas registradas
    private array $routes = [];

    // Registra una ruta GET
    public function get(string $uri, string $action): void
    {
        // Guarda la ruta GET y su acción asociada
        $this->routes['GET'][$uri] = $action;
    }

    // Registra una ruta POST
    public function post(string $uri, string $action): void
    {
        // Guarda la ruta POST y su acción asociada
        $this->routes['POST'][$uri] = $action;
    }

    // Resuelve la petición actual
    public function resolve(): void
    {
        // Obtiene solo la ruta de la URL actual
        $requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        // Obtiene la URL base definida en config.php
        $basePath = BASE_URL;

        // Verifica si la URL pedida empieza con el BASE_URL
        if (str_starts_with($requestUri, $basePath)) {

            // Si sí empieza con BASE_URL, elimina esa parte
            $requestUri = substr($requestUri, strlen($basePath));
        }

        // Si la ruta quedó vacía, se asigna "/"
        if ($requestUri === '') {
            $requestUri = '/';
        }

        // Obtiene el método HTTP actual (GET o POST)
        $method = $_SERVER['REQUEST_METHOD'];

        // Busca la acción asociada a esa ruta y método
        $action = $this->routes[$method][$requestUri] ?? null;

        // Si no existe acción para esa ruta, devuelve 404
        if (!$action) {
            http_response_code(404);
            echo "404 - Ruta no encontrada";
            return;
        }

        // Separa controlador y método usando el símbolo @
        // Ejemplo: HomeController@index
        [$controllerName, $controllerMethod] = explode('@', $action);

        // Carga el archivo del controlador
        require_once(__DIR__ . '/../controllers/' . $controllerName . '.php');

        // Crea una instancia del controlador
        $controller = new $controllerName();

        // Ejecuta el método del controlador
        $controller->$controllerMethod();
    }
}
?>