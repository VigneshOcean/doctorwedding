<?php
namespace App\Core;

class Router {
    private $routes = [];

    // Add a GET route
    public function get($uri, $action) {
        $this->addRoute('GET', $uri, $action);
    }

    // Add a POST route
    public function post($uri, $action) {
        $this->addRoute('POST', $uri, $action);
    }

    // Add a PUT route
    public function put($uri, $action) {
        $this->addRoute('PUT', $uri, $action);
    }

    private function addRoute($method, $uri, $action) {
        // Convert route parameters (e.g., {id}) into regex patterns
        $routePattern = preg_replace('/\{([a-zA-Z0-9_-]+)\}/', '(?P<$1>[a-zA-Z0-9_-]+)', $uri);
        $routePattern = '#^' . $routePattern . '$#';
        
        $this->routes[] = [
            'method' => $method,
            'pattern' => $routePattern,
            'action' => $action
        ];
    }

    public function dispatch($uri, $method) {
        // Remove query strings
        $uri = parse_url($uri, PHP_URL_PATH);
        
        $scriptPath = dirname($_SERVER['SCRIPT_NAME']);
        if ($scriptPath !== '/' && $scriptPath !== '\\') {
            if (strpos($uri, $scriptPath) === 0) {
                $uri = substr($uri, strlen($scriptPath));
            }
        }

        // Normalize URI
        $uri = '/' . ltrim($uri, '/');
        
        // Root specifically
        if ($uri === '/' || $uri === '/index.php') {
            $legacyFile = __DIR__ . '/../../index_legacy.php';
            if (file_exists($legacyFile)) {
                require_once $legacyFile;
                exit;
            }
        }

        foreach ($this->routes as $route) {
            if ($route['method'] === $method && preg_match($route['pattern'], $uri, $matches)) {
                $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);

                if (is_callable($route['action'])) {
                    return call_user_func_array($route['action'], $params);
                }

                if (is_array($route['action'])) {
                    $controllerName = $route['action'][0];
                    $actionName = $route['action'][1];

                    if (class_exists($controllerName)) {
                        $controller = new $controllerName();
                        if (method_exists($controller, $actionName)) {
                            return call_user_func_array([$controller, $actionName], $params);
                        }
                    }
                }
            }
        }

        // Try to serve as a legacy file if it exists
        $legacyFile = __DIR__ . '/../../' . ltrim($uri, '/');
        if (file_exists($legacyFile) && is_file($legacyFile) && pathinfo($legacyFile, PATHINFO_EXTENSION) === 'php') {
            require_once $legacyFile;
            exit;
        }

        $this->abort();
    }

    private function abort($code = 404, $message = "Page Not Found") {
        http_response_code($code);
        echo "<h1>$code - $message</h1>";
        exit;
    }
}