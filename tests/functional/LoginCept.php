<?php 
$I = new FunctionalTester($scenario);
$I->am('пользователь LookApp');
$I->wantTo('авторизоваться');

$I->login();

$I->see('You are logged in!');
