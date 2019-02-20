<?php

namespace Contexts;

use Behat\Behat\Context\Context;
use SensioLabs\Behat\PageObjectExtension\PageObject\Page;

/**
 * Defines application features from the specific context.
 */
class BaseContext implements Context
{
    /**
     * @var Page
     */
    private $page;

    /**
     * @param Page $page
     */
    public function setPage(Page $page)
    {
        $this->page = $page;
    }

    /**
     * @return Page
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @param $message
     * @throws \Exception
     */
    public function fail($message = null)
    {
        throw new \Exception($message);
    }
}