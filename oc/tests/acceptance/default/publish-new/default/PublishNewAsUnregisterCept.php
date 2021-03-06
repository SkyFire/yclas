<?php 
$I = new AcceptanceTester($scenario);
$I->am('a visitor');
$I->wantTo('publish a new ad');

$I->amOnPage('/publish-new.html');
$I->see('Publish new advertisement','h1');
$I->fillField('#title','New ad unregister default');
$I->click('.select-category');
$I->fillField('category','18');
$I->fillField('location','4');
$I->fillField('#description','This is a new ad from unregister user on the default theme');
$I->attachFile('input[type="file"]', 'photo.jpg');
$I->fillField('#phone','99885522');
$I->fillField('#address','barcelona');
$I->fillField('#price','25');
$I->fillField('#website','https://www.google.com');
$I->fillField('#name','David');
$I->fillField('#email','david@gmail.com');
$I->click('submit_btn');

$I->see('Advertisement is posted. Congratulations!');

$I->amOnPage('/apartment/new-ad-unregister-default.html');
$I->see('New ad unregister default','h1');
$I->see('25.00','span');
$I->see('Phone: 99885522','a');
$I->see('This is a new ad from unregister user on the default theme');
$I->see('Barcelona');
$I->seeElement('a', ['href' => 'http://reoc.lo/user/david']);
$I->seeElement('a', ['href' => 'https://www.google.com']);

// Check if user has created
$I->amOnPage('/user/david');
$I->see('David','h3');
$I->dontSee('Page not found');

