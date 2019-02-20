<?php

namespace Contexts;

use Pages\QAEChallengeForm;

/**
 * Defines application features from the specific context.
 */
class UploadFile extends BaseContext
{
    private $path;

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

        if (BEHAT_HOST_PATH) {
            $this->path = BEHAT_HOST_PATH . 'resources/assets/img/splash.png';
        } else {
            $this->path = realpath(BEHAT_BASE_PATH . 'resources/assets/img/splash.png');
        }
    }

    /**
     * @When I attach a file for upload
     */
    public function iAttachAFileForUpload()
    {
        $this->getPage()->attachFileToField('tfa_13', $this->path);
    }

    /**
     * @Then I see the uploaded filename on the review page
     * @throws \Exception
     */
    public function iSeeTheUploadedFilenameOnTheReviewPage()
    {
        if (str_contains($this->getPage()->getText(), basename($this->path))) {
            return true;
        }

        $this->fail();
    }

}