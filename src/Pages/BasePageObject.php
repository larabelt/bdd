<?php

namespace Pages;

use SensioLabs\Behat\PageObjectExtension\PageObject\Page;

class BasePageObject extends Page
{
    use Concerns\HandleAlerts;

    protected $path = 'http://2.0.larabelt.test';
}