<?php

namespace Pages;

use Behat\Mink\Session;
use SensioLabs\Behat\PageObjectExtension\PageObject\Factory;

class LoginPage extends BasePageObject
{
    /**
     * @var array
     */
    protected $elements = [
        'email' => 'input[name=email]',
        'password' => 'input[name=password]',
        'login' => 'input[value=Login]',
    ];

    public function __construct(Session $session, Factory $factory, array $parameters = array())
    {
        parent::__construct($session, $factory, $parameters);

        //$this->open([]);
    }
//
//    /**
//     * @param array $urlParameters
//     *
//     * @return string
//     */
//    protected function getUrl(array $urlParameters = array())
//    {
//        return 'http://2.0/larabelt.test/login';
//    }

}