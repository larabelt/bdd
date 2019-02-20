<?php

namespace Contexts;

use Pages\QAEChallengeForm;

/**
 * Defines application features from the specific context.
 */
class FormHelper extends BaseContext
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct(QAEChallengeForm $page)
    {
        $this->setPage($page);
    }

    /**
     * @When I complete the form
     * @throws \Behat\Mink\Exception\ElementNotFoundException
     */
    public function iCompleteTheForm()
    {
        $this->getPage()->pressButton('Submit');
        $this->getPage()->pressButton('Confirm');
    }

    /**
     * @When I click the link :arg1
     */
    public function iClick($arg1)
    {
        $this->getPage()->clickLink($arg1);
    }

    /**
     * @when /^(?:|I )should see the start page$/
     */
    public function iSeeTheStartPage()
    {
        if (str_contains($this->getPage()->getText(), 'QAE Challenge')) {
            return true;
        }

        $this->fail();
    }

    /**
     * @when /^(?:|I )should see the review page$/
     */
    public function iSeeTheReviewPage()
    {
        if (str_contains($this->getPage()->getText(), 'Please review your response and confirm')) {
            return true;
        }

        $this->fail();
    }

}