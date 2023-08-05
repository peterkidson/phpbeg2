<?php

namespace Core;

class Router
{
	public function __construct()
	{
	}

	private $routes = [];

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

	public function routeTheRequest($puri, $pmethod) {
		foreach ($this->routes as $route) {
			if (	$route['uri']		=== $puri
				&&	$route['method']	=== strtoupper($pmethod) ) {
				$controller = $route['controller'];
				return require basepath($controller);
			}
		}
		$this->abort2();
	}
	private function abort2($code = 404) {
		http_response_code($code);      						// SET the http response code
		require basepath("views/{$code}.php");		// Need a page for each one
		die();
	}

}

