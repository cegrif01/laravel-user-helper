<?php
/**
 * Created by JetBrains PhpStorm.
 * User: charles
 * Date: 7/10/13
 * Time: 10:59 PM
 * To change this template use File | Settings | File Templates.
 */

class TestUserSession extends TestCase
{

    public function setUp()
    {
        parent::setUp();
        Config::set('session.driver','memory');
        Session::start();

        $this->user=Mockery::mock('User');
        $this->user->id=1;
        $this->session_name='erb_user';

        $this->user_finder=Mockery::mock('User');
        $this->user_finder->shouldReceive('find')->andReturn($this->user);

        $this->session= new UserSession($this->user_finder);
    }

    public function test_can_start_session()
    {
        $this->session->start_session($this->user);
        $this->assertEquals($this->user->id, Session::get($this->session_name));
    }

    public function test_can_destroy_session()
    {
        $this->session->start_session($this->user);
        $this->session->destroy_session($this->user);
        $this->assertNull(Session::get($this->session_name));
        $this->assertNotEquals($this->user->id, Session::get($this->session_name));
    }

    public function test_can_determine_current_user()
    {
        $this->session->start_session($this->user);
        $this->assertEquals($this->user,$this->session->current_user());
    }
}