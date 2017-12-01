<?php

namespace Codeception\Module;

use Drupal\Core\DrupalKernel;
use Symfony\Component\HttpFoundation\Request;
use Codeception\Module;

class Drupal8 extends Module
{

	private $kernel;
	private $entityManager;

	public function _initialize()
    {

        $autoloader = require_once 'autoload.php';
        $request = Request::createFromGlobals();
        $this->kernel = DrupalKernel::createFromRequest($request, $autoloader, 'prod');

    	$this->kernel->boot();

    	$this->entityManager = $this->kernel->getContainer()->get('entity.manager');

    }

    public function login($username)
    {
    	//$user = $this->entityManager->getStorage('user')->load(1);
		$user = user_load_by_name($username);
		//print_r($user);
		user_login_finalize($user);
    }

}