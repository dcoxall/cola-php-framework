<?php
namespace Cola;

abstract class Controller_Base
{
	private $_request;

	public function __construct(Request_Base $request)
	{
		$this->_request = $request;
	}

	public function beforeFilter($action)
	{
		
	}

	public function afterFilter($action)
	{

	}

	private function render()
	{

	}

	protected function request()
	{
		return $this->_request;
	}
}
