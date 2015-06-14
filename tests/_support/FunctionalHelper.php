<?php
namespace Codeception\Module;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

class FunctionalHelper extends \Codeception\Module
{
  public function login() {
    $I = $this->getModule('Laravel5');

    $I->amOnPage('/auth/login');
    $I->fillField('email', '6akcuk@gmail.com');
    $I->fillField('password', 'n72A13bfg');
    $I->click('Войти');
  }

  public function addTestUser() {
    $I = $this->getModule('Laravel5');

    $I->amOnRoute('users.create');

    $I->fillField('name', 'Test');
    $I->fillField('email', 'test@test.com');
    $I->fillField('password', '123');

    $I->click('Добавить пользователя');

    return $I->grabRecord('users', [
      'name' => 'Test',
      'email' => 'test@test.com'
    ]);
  }

  public function addTestRole() {
    $I = $this->getModule('Laravel5');

    $I->amOnRoute('roles.create');

    $I->fillField('name', 'Test');
    $I->click('Создать роль');

    return $I->grabRecord('roles', [
      'name' => 'Test'
    ]);
  }

  public function addTestCountry() {
    $I = $this->getModule('Laravel5');

    $I->amOnRoute('countries.create');

    $I->fillField('name', 'Бургунди');
    $I->fillField('phonecode', '666');

    $I->click('Добавить страну');

    return $I->grabRecord('countries', [
      'name' => 'Бургунди',
      'phonecode' => '666'
    ]);
  }

  public function addTestCity() {
    $I = $this->getModule('Laravel5');

    $I->amOnRoute('cities.create');

    $I->fillField('name', 'Seattle');
    $I->selectOption('country_id', 1);
    $I->fillField('phonecode', '666');

    $I->click('Добавить город');

    return $I->grabRecord('cities', [
      'name' => 'Seattle',
      'country_id' => 1,
      'phonecode' => '666'
    ]);
  }
}
