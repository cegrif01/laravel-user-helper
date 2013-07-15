<?php
/**
 * Created by JetBrains PhpStorm.
 * User: charles
 * Date: 7/9/13
 * Time: 10:17 PM
 * To change this template use File | Settings | File Templates.
 */
namespace Charles\UserAuthenticator;
use Illuminate\Support\Facades\Hash;

class UserAuthenticator
{
    /*public function __construct($user)
    {
        $this->user=$user;
    }*/

    public function authenticate($password)
    {
        $user=false;
        $hash=isset($this->user->password) ? $this->user->password:null;

        if($hash and Hash::check($password,$hash))
            $user=$this->user;
        return $user;
    }

    public function testFunction()
    {
        exit(print('function conjunction'));
    }
}
