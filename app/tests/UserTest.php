<?php
/**
 * Created by PhpStorm.
 * User: macseem
 * Date: 1/25/15
 * Time: 1:13 PM
 */

namespace app\tests;


use app\models\User;
use app\models\UserInterest;

class UserTest extends \PHPUnit_Extensions_SeleniumTestCase {

    protected function setUp()
    {
        /** @noinspection PhpUnusedLocalVariableInspection */
        $this->setBrowserUrl('http://users.local:8080');
    }

    /**
     * @param array $profile
     * @param array $interests
     * @dataProvider userInfo
     */
    public function testRegistration(array $profile, array $interests)
    {
        $this->open('/user/sign-up');
        $this->fillPage($profile,$interests);
        $this->submitForm();
        $this->checkResult($profile,$interests);
    }

    public function fillPage($profile,$interests)
    {
        $this->fillMainForm($profile);
        $this->fillInterests($interests);
    }

    /**
     * @param array $profile
     */
    public function fillMainForm(array $profile)
    {
        $this->assertElementPresent('id=signup-form');
        foreach($profile as $id => $value) {
            $this->type('id='.$id,$value);
        }
    }

    /**
     * @param array $interests
     */
    public function fillInterests(array $interests)
    {
        foreach($interests as $interest) {
            $this->clickAndWait('id=add-new-interest');
            $this->type('css=.interest:last-of-type',$interest);
        }
    }

    public function submitForm()
    {
        $this->click('id=submit');
    }

    private function checkResult($profile, array $interests)
    {
        $this->checkBrowserResult();
        $this->checkResultInDB($profile, $interests);
    }

    private function checkBrowserResult()
    {
        $this->assertTextPresent('exact:Success');
    }

    private function checkResultInDB(array $profile, array $interests)
    {
        $userId = $this->profileCheck($profile);
        $this->interestsCheck($userId,$interests);
    }

    /**
     * @param array $profile
     * @return int
     */
    public function profileCheck(array $profile)
    {
        /** @var User $user */
        $model = new User();
        $user = $model->findOneBy('login',$profile['login']);
        $this->assertTrue(!empty($user));
        foreach($profile as $key => $value) {
            $this->assertTrue($user->$key == $profile[$key]);
        }
        return $user->id;
    }

    public function interestsCheck($userId, array $interests)
    {
        /** @var UserInterest[] $userInterests */
        $model = new UserInterest();
        $userInterests = $model->findAll(array('user_id' => $userId));
        foreach($userInterests as $userInterest) {
            $this->assertTrue(in_array($userInterest->getName(),$interests,true));
        }
    }

    public function userInfo() {
        return array(
            array(
                array(
                    'login' => 'macseem',
                    'password' => '1q2w3e',
                    'email' => 'lugamax@gmail.com',
                    'name' => 'Maksim',
                    'city' => 'Kiev',
                    'about' => 'About me. Somthing',
                ),
                array(
                    'Car',
                    'Computers',
                    'Girls'
                )
            )
        );
    }
}
