<?php
class Router {
    private $routes = [];

    public function get($path, $callback) {
        $this->routes['GET'][$path] = $callback;
    }

    public function post($path, $callback) {
        $this->routes['POST'][$path] = $callback;
    }

    public function delete($path, $callback) {
        $this->routes['DELETE'][$path] = $callback; 
    }

    public function put($path, $callback){
        $this->routes['PUT'][$path] = $callback; 
    }

    public function run() {
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];

        // // Testando se pega a url
        // echo "Path: " . $path . "<br>";
        // echo "Method: " . $method . "<br>";

        $matched = false;

        
        foreach ($this->routes[$method] as $route => $callback) {
            $routePattern = preg_replace('/{[^\/]+}/', '([^\/]+)', $route);
            if (preg_match('#^' . $routePattern . '$#', $path, $matches)) {
                array_shift($matches);
                call_user_func_array($callback, $matches);
                $matched = true;
                break;
            }
        }

        if (!$matched) {
            http_response_code(404);
            echo '404 - Not Found';
        }
    }
}
?>
