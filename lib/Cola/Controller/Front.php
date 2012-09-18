<?php
namespace Cola;

class Controller_Front extends Controller_Base
{
	private $_router;

	public function __construct(Request_Base $request)
	{
		parent::__construct($request);
		$this->_router = new Request_Router();
		$this->_router->map('GET', '*', 'home#index');
	}

	public function dispatch()
	{
		$params = $this->_router->match($this->request());
		if (!empty($params)) {
			list($controller, $action) = explode('#', $params['target']);
			$this->request()->addParam('controller', $controller);
			$this->request()->addParam('action', $action);
			$controller = 'Controller_' . Utils_TextHelper::strToClass($controller);
			$controller = '\\' . APP_NAMESPACE . '\\' . $controller;
			$method = "{$action}Action";
			$controller = new $controller($this->request());
			$controller->beforeFilter($action);
			$controller->$method();
			$controller->afterFilter($action);
		}
	}
}
