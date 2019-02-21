<?php

namespace Contexts;

use Services\GuerrillaMailService;
use Pages\LoginPage;

/**
 * Defines application features from the specific context.
 */
class ConfirmEmail extends BaseContext
{
    /**
     * @var GuerrillaMailService
     */
    public $service;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct(LoginPage $page)
    {
        $this->setPage($page);
    }

    /**
     * @return GuerrillaMailService
     */
    public function service()
    {
        return $this->service ?: $this->service = new GuerrillaMailService();
    }

    /**
     * @Given I register a temporary email address at https:\/\/www.guerrillamail.com
     * @throws \Exception
     */
    public function iRegisterATemporaryEmailAddressAtHttpsWwwGuerrillamailCom()
    {
        $this->service()->registerEmailAddress();
    }

    /**
     * @Given I fill :arg1 with the temporary email address
     */
    public function iFillEmailWithTheTemporaryEmailAddress($arg1)
    {
        if ($input = $this->getPage()->getElement($arg1)) {
            $this->getPage()->fillField($input->getAttribute('id'), $this->service()->getEmailAddress());
        }
    }

    /**
     * @Then I see a confirmation email in my temporary email inbox
     * @throws \Exception
     */
    public function iSeeAConfirmationEmailInMyTemporaryEmailInbox2()
    {
        sleep(30);

        $response = $this->service()->fetchInbox();

        foreach (array_get($response, 'list', []) as $email) {
            if (array_get($email, 'mail_subject') == 'Thank you for submitting QAE Challenge') {
                return true;
            }
        }

        $this->fail();
    }

}