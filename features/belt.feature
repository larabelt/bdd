@login

Feature: Select type and bread and update choice

  Scenario: Hide conditional sections when done

    Given I am on "http://2.0.larabelt.test/login"

    When I fill in "email" with "super@larabelt.org"
    And I fill in "password" with "secret"
    And I press "Login"
    Then I should see "Welcome to LaraBelt Admin"