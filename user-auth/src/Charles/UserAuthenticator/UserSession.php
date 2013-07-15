<?php
/**
 * Created by JetBrains PhpStorm.
 * User: charles
 * Date: 7/10/13
 * Time: 11:03 PM
 * To change this template use File | Settings | File Templates.
 */
namespace Charles\UserAuthenticator;
class UserSession
{
    protected $session_name='erb_user';
    protected $current_user;
    protected $user_finder;

    /*
     * The default behavior will go to false (new User) because user_finder= null by default
     * same as
     * if($user_finder !== null)
     *  $this->user_finder=$user_finder
     * else
     *  $this->user_finder=new User;
     *
     */
    /*public function __construct($user_finder=null)
    {
        $this->user_finder=$user_finder ?:new User;
    }*/

    public function testing()
    {
        return print 'spice';
    }

    public function start_session($user)
    {
        Session::put($this->session_name,(int) $user->id);
        $this->current_user=$user;
    }

    public function destroy_session()
    {
        Session::forget($this->session_name);
    }

    public function current_user()
    {
        if( ! $this->current_user)
        {
            $this->current_user=$this->user_find->find(
                Session::get($this->session_name)
            );
        }
        return $this->current_user;
    }

}
