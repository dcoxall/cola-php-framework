<?php
namespace Application;

class Controller_Home extends \Cola\Controller_AutoRender
{
	public function indexAction()
	{
		$this->view()->addData('name', "Darren Coxall");
	}
}
