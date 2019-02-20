@check-bread

Feature: Select type and bread and update choice

  Scenario: Hide conditional sections when done

    Given I am on "http://2.0.larabelt.test"

    When I check the favorite food option "Bread"
    And I select the bread option of "Rye"
    And I select the bread option of "Something else"
    And I fill in "email" with "valid@email.com"
    And I press "Submit"
    Then I should see my bread selection of "Rye"
    And I should see my bread selection of "Something else"