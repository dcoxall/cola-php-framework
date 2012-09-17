<?php
namespace Cola;

class Controller_Front extends Controller_Base
{
	private $_router;

	public function __construct(Request_Base $request)
	{
		parent::__construct($request);
		$this->_router = new Request_Router();
		$this->_router->map('GET', '*', 'Controller_Front#index');
	}

	public function dispatch()
	{
		$params = $this->_router->match($this->request());
		if (!empty($params)) {
			list($controller, $action) = explode('#', $params['target']);
			$action = "{$action}Action";
			$controller = "Cola\\$controller";
			$controller = new $controller($this->request());
			$controller->$action();
		}
	}

	public function indexAction()
	{
		echo "Hello World";
	}
}
