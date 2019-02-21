@pages

Feature: Page UX

  Scenario: Edit Page

    Given I am on "http://2.0.larabelt.test/login"
    And I log in as a Super User

    Given I am on "http://2.0.larabelt.test/admin/belt/content/pages/edit/2"
    Then I should see "Page Editor"