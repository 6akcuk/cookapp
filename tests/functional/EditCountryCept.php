<?php
$I = new FunctionalTester($scenario);
$I->am('администратор LookApp');
$I->wantTo('отредактировать страну Бургунди');

$I->login();

$testCountry = $I->addTestCountry();

$I->amOnRoute('countries.edit', [$testCountry->id]);

$I->fillField('name', 'Бургунди-Лимитед');
$I->fillField('phonecode', '667');

$I->click('Сохранить изменения');

$I->see('Бургунди-Лимитед');
$I->seeRecord('countries', [
  'name' => 'Бургунди-Лимитед',
  'phonecode' => '667'
]);
