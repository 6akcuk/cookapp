<?php 
$I = new FunctionalTester($scenario);
$I->am('администратор LookApp');
$I->wantTo('отредактировать тестового пользователя');

$I->login();

$testUser = $I->addTestUser();

$I->amOnRoute('users.edit', [$testUser->id]);

$I->fillField('name', 'Test 2');

$I->click('Сохранить изменения');

$I->see('Test 2');
$I->seeRecord('users', [
  'name' => 'Test 2',
  'email' => 'test@test.com'
]);
