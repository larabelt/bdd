@check-veggies

Feature: Select type and veggies and update choice

  Scenario: Hide conditional sections when done

    Given I am on "http://2.0.larabelt.test"

    When I check the favorite food option "Veggies"
    And I select the veggies option of "Peppers"
    And I select the veggies option of "Celery"
    And I fill in "email" with "valid@email.com"
    And I press "Submit"
    Then I should see my veggies selection of "Peppers"
    And I should see my veggies selection of "Celery"