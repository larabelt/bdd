<?php

namespace Contexts;

use Pages\LoginPage;
use Behat\Behat\Tester\Exception\PendingException;

/**
 * Defines application features from the specific context.
 */
class LoginContext extends BaseContext
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     * @param LoginPage $page
     */
    public function __construct(LoginPage $page)
    {
        $this->setPage($page);
    }

    /**
     * @Given I log in as a Super User
     */
    public function iAmLoggedInAsASuperUser()
    {


        $this->getPage()->fillField('email', 'super@larabelt.org');
        $this->getPage()->fillField('password', 'secret');
        $this->getPage()->pressButton('Login');

        if (str_contains($this->getPage()->getText(), 'Welcome to LaraBelt Admin')) {
            return true;
        }

        throw new PendingException();
    }

}