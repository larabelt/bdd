@validate-email

Feature: Email is validated and required

  Background:
    Given I am on "http://2.0.larabelt.test"

  Scenario Outline: Confirm email validation

    Given I fill in "email" with "<email_value>"
    And I press "Submit"
    Then I should see <submission result>

    Examples:

      | email_value     | submission result                             |
      |                 | a validation message that email is required   |
      | steve@          | a validation message that email must be valid |
      | valid@email.com | the review page                               |