<?php
namespace Cola;

abstract class Controller_Base
{
	private $_request;

	public function __construct(Request_Base $request)
	{
		$this->_request = $request;
	}

	public function beforeAction()
	{
		
	}

	public function afterAction()
	{

	}

	/*
	 *	Renders to the browser
	 */
	private function render()
	{

	}

	protected function request()
	{
		return $this->_request;
	}
}
