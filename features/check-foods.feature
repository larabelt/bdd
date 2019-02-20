@check-foods

Feature: Conditional sections should display when trigger is selected

  Background:
    Given I am on "http://2.0.larabelt.test"

  Scenario Outline: Hide conditional sections when done

    When I check the favorite food option "<food_value>"
    Then I should see the "<food_value>" section

    When I uncheck the favorite food option "<food_value>"
    Then I should not see the field section "<food_value>"

    Examples:

      | food_value |
      | Bread      |
      | Cheese     |
      | Veggies    |