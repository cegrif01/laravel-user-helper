<?php


class UserController extends BaseController
{

    protected $user;
    public $restful = true;

    public function get_new()
    {
       $this->user = $this->user ? : new User;
       return View::make('user.new')->with('user',$this->user);
    }

    public function home()
    {
        return View::make('home.index');
    }

    public function account_create()
    {
        $params=Input::get('user');
        $this->user= new User($params);

        if($this->user->save())
        {
            //IoC::resolve('user_session')->start_session($this->user);
            App::make('user_session')->start_session($this->user);
            Session::flash('success','Logged In Successfully');
            return Redirect::to(URL::to('home'));
        }
        else
        {
            Session::flash('error', 'Oops, there was a problem...');
            return Redirect::to(URL::to('home'));
	    //return Redirect::back()->withInput();
            //return $this->get_new();
        }
    }

	public function showProfile($id)
	{
		$user=User::find($id);
		return View::make('user.profile',array('user'=>$user));	
	}



}
	

