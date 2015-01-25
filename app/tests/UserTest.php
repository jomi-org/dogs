<?php
/**
 * Created by PhpStorm.
 * User: macseem
 * Date: 1/25/15
 * Time: 1:13 PM
 */

namespace app\tests;


class UserTest extends \PHPUnit_Extensions_Selenium2TestCase {

    protected function setUp()
    {
        $this->setBrowser('chrome');
        $this->setBrowserUrl('http://users.local/');
    }

    public function testRegistration()
    {
        $this->assertTrue(true);
        /*$this->url('http://users.local/user/signUp');
        $this->assertEquals('Title',$this->title());

        /**$this->byName('login')->value('login');
        $this->byName('password')->value('password');*/

    }
}
