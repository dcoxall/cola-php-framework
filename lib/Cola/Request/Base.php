<?php
namespace Cola;

class Request_Base
{
	private $_method;
	private $_secure;
	private $_path;
	private $_query;
	private $_port;
	private $_host;
	private $_username;
	private $_password;
	private $_fragment;
	private $_ajax;

	public function __construct()
	{
		$this->_method = strtolower($_SERVER['REQUEST_METHOD']);
		$this->_secure = !empty($_SERVER['HTTPS']);
		$pathInfo = parse_url($this->fullUrl());
		$this->_host = $pathInfo['host'];
		$this->_username = !empty($pathInfo['username']) ? $pathInfo['username'] : null;
		$this->_password = !empty($pathInfo['password']) ? $pathInfo['password'] : null;
		$this->_path = !empty($pathInfo['path']) ? $pathInfo['path'] : null;
		$this->_query = !empty($pathInfo['query']) ? $pathInfo['query'] : null;
		$this->_fragment = !empty($pathInfo['fragment']) ? $pathInfo['fragment'] : null;
		$this->_ajax = !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
	}

	public function method()
	{
		return strtoupper($this->_method);
	}

	public function isGet()
	{
		return $this->_method === 'get';
	}

	public function isPost()
	{
		return $this->_method === 'post';
	}

	public function isPut()
	{
		return $this->_method === 'put';
	}

	public function isDelete()
	{
		return $this->_method === 'delete';
	}

	public function isSecure()
	{
		return $this->_secure;
	}

	public function isAjax()
	{
		return $this->_ajax;
	}

	public function abnormalPort()
	{
		return $this->_port != 80;
	}

	public function fullUrl()
	{
		$url = ($this->isSecure() ? 'https' : 'http') . '://';
		$url .= $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		return $url;
	}
}