<?php
/**
 * Created by JetBrains PhpStorm.
 * User: charles
 * Date: 7/9/13
 * Time: 10:13 PM
 * To change this template use File | Settings | File Templates.
 *
 * Mockery::close() is in the TestCase class
 *
 */

use Services\UserAuthenticator;
use Illuminate\Support\Facades\Hash;

class TestUserAuthenticator extends TestCase
{
    public function setUp()
    {
	    parent::setUp();
        $this->user=Mockery::mock('User');
        $this->password= 'secure1234';
        $this->wrong_password='wrong';

        $this->user->password = Hash::make($this->password);
    }

    public function test_can_authenticate_user()
    {
        $auth= new UserAuthenticator($this->user);

        $this->assertEquals($this->user,$auth->authenticate($this->password));
        $this->assertFalse($auth->authenticate($this->wrong_password));
    }
    
    public function test_false_when_user_null()
    {
        $auth = new UserAuthenticator(null);
        $this->assertFalse($auth->authenticate($this->password));
    }
}
