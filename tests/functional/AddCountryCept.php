<?php 
$I = new FunctionalTester($scenario);
$I->am('a LookApp Administrator');
$I->wantTo('add new country');

$I->login();

$I->addTestCountry();

$I->see('Бургунди');
$I->seeRecord('countries', [
  'name' => 'Бургунди',
  'phonecode' => '666'
]);
