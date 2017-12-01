<?php

namespace Codeception\Module;

use Codeception\Module;

class Drupal8 extends Module
{

    public function greet($name)
    {
        $this->debug("Hello {$name}!");
    }

}