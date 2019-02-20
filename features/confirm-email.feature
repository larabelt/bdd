@confirm-email

Feature: Email confirmation sent on form submission

  Scenario: Register using a temporary email address

    Given I register a temporary email address at https://www.guerrillamail.com
    And I am on "http://2.0.larabelt.test"
    And I fill "email" with the temporary email address
    When I complete the form
    Then I see a confirmation email in my temporary email inbox