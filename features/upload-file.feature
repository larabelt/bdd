@upload-file

Feature: Upload files

  Scenario: Display filename on confirmation page

    Given I am on "http://2.0.larabelt.test"
    And I fill in "email" with "valid@email.com"
    And I check the favorite food option "Cheese"
    When I attach a file for upload
    And I press "Submit"
    Then I see the uploaded filename on the review page