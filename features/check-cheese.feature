@check-cheese

Feature: Select type and cheese and update choice

  Scenario: Hide conditional sections when done

    Given I am on "http://2.0.larabelt.test"

    When I check the favorite food option "Cheese"
    And I select the cheese option of "Swiss"
    And I fill in "email" with "valid@email.com"
    And I press "Submit"
    Then I should see my cheese selection of "Swiss"

    When I click the link "Make a correction"
    Then I should see the start page

    When I select the cheese option of "Chedder"
    And I press "Submit"
    Then I should see my cheese selection of "Chedder"