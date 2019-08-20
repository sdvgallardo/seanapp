<?php

class LoginCest
{
    public function _before(FunctionalTester $I)
    {
    }

    // tests
    public function tryToTest(FunctionalTester $I)
    {
        $I->amOnPage('/');
        $I->see('Sean');
        $I->click('Login');
        $I->fillField('email', 'sean@test.com');
        $I->fillField('password', 'password');
        $I->click('Login');
        $I->see('Logout');
        // $I->click('Blog');
        // $I->see('Sean\'s Test Blog');
        // $I->click('Sean', 'a');
        // $I->amOnPage('/blog/user=1');
        // $I->see('Edit');
        // $I->click('Edit Profile');
        // $I->see('Edit User');
    }
}
