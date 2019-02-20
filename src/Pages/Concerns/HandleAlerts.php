<?php

namespace Pages\Concerns;

/**
 * Trait HandleAlerts
 * @credit https://gist.github.com/tmartin/2888877
 */
trait HandleAlerts
{
    /**
     * @when /^(?:|I )accept the alert$/
     */
    public function acceptAlert()
    {
        $this->getDriver()->getWebDriverSession()->accept_alert();
    }

    /**
     * @when /^(?:|I )dismiss the alert$/
     */
    public function dismissAlert()
    {
        $this->getDriver()->getWebDriverSession()->dismiss_alert();
    }

    /**
     * @When /^(?:|I )should see "([^"]*)" in alert$/
     *
     * @param string $message The message.
     *
     * @return bool
     */
    public function getAlertMessage()
    {
        return $this->getDriver()->getWebDriverSession()->getAlert_text();
    }

    /**
     * @When /^(?:|I )should see "([^"]*)" in alert$/
     *
     * @param string $message The message.
     *
     * @return bool
     */
    public function assertAlertMessage($message)
    {
        return $message == $this->getAlertMessage();
    }

}
