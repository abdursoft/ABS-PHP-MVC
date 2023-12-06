<?php

/** Abs Framework
 *  Developed by abdursoft
 *  Author Abdur Rahim
 *  Version 1.0.1
 *  Born on 2023
 */


namespace System\Route;

use System\Loader;
use System\Session;

class Route extends Loader
{
    private array $handlers;
    private const METHOD_GET = 'GET';
    private const METHOD_POST = 'POST';
    private const METHOD_PUT = 'PUT';
    private const METHOD_DELETE = 'DELETE';
    private $middleware = null;
    private $param = [];

    public function __construct()
    {
        parent::__construct();
    }

    public function get(string $path, $handler): void
    {
        $this->addHandler(self::METHOD_GET, $path, $handler);
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
        $requestPath = $requestUri['path'];
        if (!empty($routes) && Session::get($middleware)) {
            for ($i = 0; $i < count($routes); $i++) {
                if ($routes[$i][0] === $requestPath) {
                    $this->addHandler($routes[$i]['1'], $routes[$i][0], $routes[$i][2]);
                }
            }
        }
    }

    private function addHandler(string $method, string $path, $handler): void
    {
        $this->handlers[$method . $path] = [
            "path" => $path,
            "method" => $method,
            "handler" => $handler,
            "middleware" => $this->middleware
        ];
    }


    public function run()
    {
        $requestUri = parse_url($_SERVER['REQUEST_URI']);
        $requestPath = $requestUri['path'] != '/' ? rtrim($requestUri['path'], '/') : $requestUri['path'];
        $method = $_SERVER['REQUEST_METHOD'];
        $callback = null;

        foreach ($this->handlers as $handler) {
            if ($handler['path'] === $requestPath && $method === $handler['method']) {
                if ($handler['middleware'] != null) {
                    if (isset($_SESSION[$handler['middleware']])) {
                        $callback = $handler['handler'];
                    }
                } else {
                    $callback = $handler['handler'];
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
            $this->notFound();
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
