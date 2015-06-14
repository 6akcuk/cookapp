<?php 
$I = new FunctionalTester($scenario);
$I->am('администратор LookApp');
$I->wantTo('отредактировать тестовую роль');

$I->login();

$testRole = $I->addTestRole();

$I->amOnRoute('roles.edit', [$testRole->id]);

$I->fillField('name', 'Test 2');

$I->click('Сохранить изменения');

$I->see('Test 2');
$I->seeRecord('roles', [
  'name' => 'Test 2',
  'id' => $testRole->id
]);