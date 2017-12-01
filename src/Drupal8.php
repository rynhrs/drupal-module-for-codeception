<?php

namespace Codeception\Module;

use Drupal\Core\DrupalKernel;
use Symfony\Component\HttpFoundation\Request;
use Codeception\Module;

class Drupal8 extends Module
{

    public function drupalLogin($username)
    {
        $autoloader = require_once 'autoload.php';

        $kernel = new DrupalKernel('prod', $autoloader);
        $request = Request::createFromGlobals();
        $response = $kernel->handle($request);
        
        $user = user_load_by_name($username);
        user_login_finalize($user);

        $kernel->terminate($request, $response);
    }

}