<?php

namespace Contexts;

use Pages\QAEChallengeForm;

/**
 * Defines application features from the specific context.
 */
class ValidateEmail extends BaseContext
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
     * @when /^(?:|I )should see a validation message that email is required/
     * @throws \Exception
     */
    public function iSeeAValidationMessageThatEmailIsRequired()
    {
        if (str_contains($this->getPage()->getAlertMessage(), 'problem with your submission')) {

            $this->getPage()->acceptAlert();

            if ($errorDiv = $this->getPage()->getElement('errors.email')) {
                if (str_contains($errorDiv->getText(), 'This field is required.')) {
                    return true;
                }
            }
        }

        $this->fail();
    }

    /**
     * @when /^(?:|I )should see a validation message that email must be valid$/
     */
    public function iSeeAValidationMessageThatEmailMustBeValid()
    {
        if (str_contains($this->getPage()->getAlertMessage(), 'problem with your submission')) {

            $this->getPage()->acceptAlert();

            if ($errorDiv = $this->getPage()->getElement('errors.email')) {
                if (str_contains($errorDiv->getText(), 'This does not appear to be a valid email address.')) {
                    return true;
                }
            }
        }

        $this->fail();
    }

}