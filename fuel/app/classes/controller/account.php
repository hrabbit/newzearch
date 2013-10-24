<?php

class Controller_Account extends Controller_Base
{
    public function action_login()
    {
        \Session::set('id', 1);
        \Response::redirect('/');
    }

    public function action_logout()
    {
        \Session::destroy();
        \Response::redirect('/');
    }
}