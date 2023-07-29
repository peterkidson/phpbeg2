<?php

namespace Core;

class Router
{
	protected $routes = [];

	public function addGetRoute($uri, $controller) {
		$this->addRoute($uri, $controller, 'GET');
	}
	public function addPostRoute($uri,$controller) {
		$this->addRoute($uri, $controller, 'POST');
	}
	public function addDeleteRoute($uri,$controller) {
		$this->addRoute($uri, $controller, 'DELETE');
	}
	public function addPatchRoute($uri,$controller) {
		$this->addRoute($uri, $controller, 'PATCH');
	}
	public function addPutRoute($uri,$controller) {
		$this->addRoute($uri, $controller, 'PUT');
	}
	private function addRoute($uri, $controller, $method) {
		$this->routes[] = ['uri' => $uri, 'controller' => $controller, 'method' => $method];
	}

	public function routeTheRequest($uri, $method) {
		foreach ($this->routes as $route) {
			if ($route['uri'] === $uri  &&  $route['method'] === strtoupper($method) ) {
				return require basepath($route['controller']);
			}
		}
		$this->abort();
	}
	protected function abort($code = 404) {
		http_response_code($code);      						// SET the http response code
		require basepath("views/{$code}.php");		// Need a page for each one
		die();
	}


}

//function routeToController($url, $routes)
//{
//	if (array_key_exists($url, $routes)) {
//		$controller = $routes[$url];
//		require basepath($controller);
//	} else {
//		abort();
//	}
//}
//
//function abort($code = 404)
//{
//	http_response_code($code);      						// SET the http response code
//	require basepath("views/{$code}.php");		// Need a page for each one
//	die();
//}
//
////////////
//
//$request = $_SERVER['REQUEST_URI'];
//$routes = require basepath('routes.php');
//
//$url = parse_url($request)['path'];
//
//routeToController($url, $routes);
