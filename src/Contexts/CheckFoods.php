<?php

namespace Contexts;

use Pages\LoginPage;

/**
 * Defines application features from the specific context.
 */
class CheckFoods extends BaseContext
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
     * @When I check the favorite food option :arg1
     * @param $arg1
     * @throws \Exception
     */
    public function iCheckTheFavoriteFoodOption($arg1)
    {
        $this->getPage()->getElement("option.$arg1")->check();
    }

    /**
     * @Then I should see the :arg1 section
     * @param $arg1
     * @return bool
     * @throws \Exception
     */
    public function iShouldSeeTheSection($arg1)
    {
        /* @var $section \SensioLabs\Behat\PageObjectExtension\PageObject\InlineElement */
        if ($section = $this->getPage()->getElement("section.$arg1")) {
            if ($section->isVisible()) {
                return true;
            }
        }

        $this->fail();
    }

    /**
     * @When I uncheck the favorite food option :arg1
     */
    public function iUncheckTheFavoriteFoodOption($arg1)
    {
        $this->getPage()->getElement("option.$arg1")->uncheck();
    }

    /**
     * @Then I should not see the field section :arg1
     * @param $arg1
     * @return bool
     * @throws \Exception
     */
    public function iShouldNotSeeTheFieldSection($arg1)
    {
        /* @var $section \SensioLabs\Behat\PageObjectExtension\PageObject\InlineElement */
        if ($section = $this->getPage()->getElement("section.$arg1")) {
            if (!$section->isVisible()) {
                return true;
            }
        }

        $this->fail();
    }

    /**
     * @When I select the cheese option of :arg1
     */
    public function iSelectTheCheeseOptionOf($arg1)
    {
        $this->getPage()->getElement("option.Cheese.$arg1")->click();
    }

    /**
     * @param $arg1
     * @param $arg2
     * @return bool
     * @throws \Exception
     */
    private function iShouldSeeMyFoodSelectionOf($arg1, $arg2)
    {
        if (str_contains($this->getPage()->getText(), $arg1)) {
            if (str_contains($this->getPage()->getText(), $arg2)) {
                return true;
            }
        }

        $this->fail();
    }

    /**
     * @Then I should see my cheese selection of :arg1
     */
    public function iShouldSeeMyCheeseSelectionOf($arg1)
    {
        $this->iShouldSeeMyFoodSelectionOf('Cheese', $arg1);
    }

    /**
     * @When I select the bread option of :arg1
     */
    public function iSelectTheBreadOptionOf($arg1)
    {
        $this->getPage()->getElement("option.Bread.$arg1")->check();
    }

    /**
     * @Then I should see my bread selection of :arg1
     */
    public function iShouldSeeMyBreadSelectionOf($arg1)
    {
        $this->iShouldSeeMyFoodSelectionOf('Bread', $arg1);
    }

    /**
     * @When I select the veggies option of :arg1
     */
    public function iSelectTheVeggiesOptionOf($arg1)
    {
        $this->getPage()->getElement("option.Veggies.multiple")->selectOption($arg1, true);
    }

    /**
     * @Then I should see my veggies selection of :arg1
     */
    public function iShouldSeeMyVeggiesSelectionOf($arg1)
    {
        $this->iShouldSeeMyFoodSelectionOf('Veggies', $arg1);
    }

}