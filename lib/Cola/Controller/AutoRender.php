<?php
namespace Cola;

class Controller_AutoRender extends Controller_Base
{
	private $_view;
	private $_render = true;

	public function __construct(Request_Base $request)
	{
		parent::__construct($request);
	}

	public function beforeFilter($action)
	{
		$this->_view = new View_Basic($this, "{$this->request()->params('controller')}/{$this->request()->params('action')}");
	}

	protected function view()
	{
		return $this->_view;
	}

	public function afterFilter($action)
	{
		if ($this->_render) {
			$this->view()->render();
		}
	}

	protected function disableRender()
	{
		$this->_render = false;
	}
}
