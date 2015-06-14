<?php 
$I = new FunctionalTester($scenario);
$I->am('администратор LookApp');
$I->wantTo('добавить тестовую роль');

$I->login();

$I->addTestRole();

$I->see('Test');
$I->seeRecord('roles', ['name' => 'Test']);