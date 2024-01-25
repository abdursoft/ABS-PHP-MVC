<?php

/** Abs Framework
 *  Developed by abdursoft
 *  Author Abdur Rahim
 *  Version 1.0.1
 *  Born on 2023
 */

namespace System\Route;

use System\Loader;

session_start();
class Route extends Loader
{
    private array $handlers;
    private const METHOD_GET = 'GET';
    private const METHOD_POST = 'POST';
    private const METHOD_PUT = 'PUT';
    private const METHOD_DELETE = 'DELETE';
    private $middleware = null;
    private $isAuth = false;
    private $parameter = [];
    private $param = [];

    public function __construct()
    {
        parent::__construct();
    }

    public function get(string $path, $handler, array $parameter = null): void
    {
        $this->addHandler(self::METHOD_GET, $path, $handler, $parameter);
    }
    public function post(string $path, $handler): void
    {
        $this->addHandler(self::METHOD_POST, $path, $handler);
    }

    public function put(string $path, $handler): void
    {
        $this->addHandler(self::METHOD_PUT, $path, $handler);
    }

    public function delete(string $path, $handler): void
    {
        $this->addHandler(self::METHOD_DELETE, $path, $handler);
    }

    public function middleware(string $middleware, array $routes): void
    {
        $this->middleware = $middleware;
        $requestUri = parse_url($_SERVER['REQUEST_URI']);
        $requestPath = $requestUri['path'] != '/' ? rtrim($requestUri['path'], '/') : $requestUri['path'];
        if (MOOD == 'web') {
            if (isset($_SESSION[$middleware])) {
                if (!empty($routes)) {
                    foreach ($routes as $route) {
                        if ($route[1] == $requestPath) {
                            $this->addHandler($this->method_sanitizer($route['0']), $route[1], $route[2]);
                        }
                    }
                }
            } else {
                $this->isAuth = true;
            }
        } else {
            if (!empty($routes)) {
                foreach ($routes as $route) {
                    if ($route[1] == $requestPath) {
                        $this->addHandler($this->method_sanitizer($route['0']), $route[1], $route[2]);
                    }
                }
            }
        }
    }

    public function group(string $gorup_name, array $routes): void
    {
        $requestUri = parse_url($_SERVER['REQUEST_URI']);
        $requestPath = $requestUri['path'] != '/' ? rtrim($requestUri['path'], '/') : $requestUri['path'];

        if (!empty($routes)) {
            foreach ($routes as $route) {
                if ($gorup_name != '') {
                    if(!array_key_exists('extends',$route)){
                        $this->addHandler($this->method_sanitizer($route['0']), '/'.trim($gorup_name,'/')."/".trim($route['1'],'/'), $route[2],$route[3] ?? null);
                    }else{
                        foreach($route['routes'] as $item){
                            $this->addHandler($this->method_sanitizer($item['0']), '/'.trim($gorup_name.'/'.$route['slug'],'/')."/".trim($item['1'],'/'), $item[2],$item[3] ?? null);
                        }
                    }
                }
            }
        }
    }

    public function method_sanitizer($method)
    {
        switch ($method) {
            case 'get':
                return self::METHOD_GET;
            case 'post':
                return self::METHOD_POST;
            case 'delete':
                return self::METHOD_DELETE;
            case 'put':
                return self::METHOD_PUT;
            default:
                return self::METHOD_GET;
        }
    }

    private function addHandler(string $method, string $path, $handler, array $parameter = null): void
    {
        $this->handlers[$method . $path] = [
            "path" => $path,
            "method" => $method,
            "handler" => $handler,
            "parameter" => $parameter,
            "middleware" => $this->middleware
        ];
    }


    public function run()
    {
        $requestUri = parse_url($_SERVER['REQUEST_URI']);
        $requestPath = $requestUri['path'] != '/' ? rtrim($requestUri['path'], '/') : $requestUri['path'];
        $method = $_SERVER['REQUEST_METHOD'];
        $callback = null;

        if (!empty($this->handlers)) {
            foreach ($this->handlers as $handler) {
                if (!empty($handler['parameter'])) {
                    $path = explode($handler['path'], $requestPath);
                    if (isset($path[1])) {
                        $param_get = trim($path[1], '/');
                        $param_explode = explode('/', $param_get);
                        for ($p = 0; $p < count($handler['parameter']); $p++) {
                            $_GET[$handler['parameter'][$p]] = $param_explode[$p] ?? '';
                        }
                        $callback = $handler['handler'];
                    }
                } else {
                    if ($handler['path'] === $requestPath && $method === $handler['method']) {
                        if ($handler['middleware'] != null) {
                            $callback = $handler['handler'];
                        } else {
                            $callback = $handler['handler'];
                        }
                    }
                }
            }
        }

        if (is_string($callback)) {
            $parts = explode('::', $callback);
            if (is_array($parts)) {
                $class = array_shift($parts);
                $handler = new $class;

                $method = array_shift($parts);
                $callback = [$handler, $method];
            }
        }

        if (!$callback) {
            if ($this->isAuth) {
                $this->unAuthorized();
            } else {
                $this->notFound();
            }
            return;
        }

        if (file_get_contents("php://input") != '') {
            $this->param = json_decode(file_get_contents("php://input"), true);
        }

        if (!empty($this->param)) {
            call_user_func_array($callback, [
                array_merge($_GET, $_POST, $this->param)
            ]);
        } else {
            call_user_func_array($callback, [
                array_merge($_GET, $_POST)
            ]);
        }
    }
}
