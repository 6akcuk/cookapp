<?php
$I = new FunctionalTester($scenario);
$I->am('администратор LookApp');
$I->wantTo('отредактировать город Seattle');

$I->login();

$testCity = $I->addTestCity();

$I->amOnRoute('cities.edit', [$testCity->id]);

$I->fillField('name', 'Denver');

$I->click('Сохранить изменения');

$I->see('Denver');
$I->seeRecord('cities', [
  'name' => 'Denver',
  'country_id' => 1,
  'phonecode' => '666'
]);
