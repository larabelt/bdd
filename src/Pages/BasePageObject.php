<?php

namespace Pages;

use SensioLabs\Behat\PageObjectExtension\PageObject\Page;

class BasePageObject extends Page
{
    use Concerns\HandleAlerts;
}