<?php 
$I = new FunctionalTester($scenario);
$I->am('администратор LookApp');
$I->wantTo('добавить город Seattle');

$I->login();

$I->addTestCity();

$I->see('Seattle');
$I->seeRecord('cities', [
  'name' => 'Seattle',
  'country_id' => 1,
  'phonecode' => '666'
]);
