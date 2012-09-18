<?php
namespace Cola;

abstract class View_Base
{
	private $_data = array();
	private $_controller;
	private $_loadPath;

	public function __construct(Controller_Base $controller, $path)
	{
		$this->_controller = $controller;
		$this->_loadPath = $path;
	}

	public function addData($key, $data)
	{
		$this->_data[$key] = $data;
	}

	public function setData($data)
	{
		if (is_array($data)) {
			$this->_data = $data;
		} else {
			throw new \Exception("setData expects a key, value array"); 
		}
	}

	public function getData($key = null)
	{
		return is_null($key) ? $this->_data : $this->_data[$key];
	}

	public function render()
	{
		$data = $this->getData();
		include(COLA_ROOT . '/views/' . $this->_loadPath . '.php');
	}

	public function controller()
	{
		return $this->_controller;
	}
}
