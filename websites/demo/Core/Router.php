<?php

namespace Core;

class Router
{
	protected $routes = [];

	public function get($uri,$controller) {
		$this->generic($uri, $controller, 'GET');
	}
	public function post($uri,$controller) {
		$this->generic($uri, $controller, 'POST');
	}
	public function delete($uri,$controller) {
		$this->generic($uri, $controller, 'DELETE');
	}
	public function patch($uri,$controller) {
		$this->generic($uri, $controller, 'PATCH');
	}
	public function put($uri,$controller) {
		$this->generic($uri, $controller, 'PUT');
	}
	private function generic($uri,$controller,$method) {
		$this->routes[] = ['url' => $uri, 'controller' => $controller, 'method' => $method];
	}

	public function route($uri,$route) {
		foreach ($this->routes as $route) {
			if ($route['uri'] === $uri) {
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
