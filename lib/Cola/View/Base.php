<?php
namespace Cola;

abstract class View_Base
{
	private $_data = array();
	private $_controller;

	public function __construct(Controller_Base $controller)
	{
		$this->_controller = $controller;
	}

	protected function addData($key, $data)
	{
		$this->_data[$key] = $data;
	}

	protected function setData($data)
	{
		if (is_array($data)) {
			$this->_data = $data;
		} else {
			throw new \Exception("setData expects a key, value array"); 
		}
	}

	protected function getData($key = null)
	{
		return is_null($key) ? $this->_data : $this->_data[$key];
	}

	public function render()
	{

	}

	public function controller()
	{
		return $this->_controller;
	}
}
