<?php 
$I = new FunctionalTester($scenario);
$I->am('администратор LookApp');
$I->wantTo('добавить тестового пользователя');

$I->login();

$I->addTestUser();

$I->see('Test');
$I->seeRecord('users', [
  'name' => 'Test',
  'email' => 'test@test.com'
]);
