<?php namespace Hdphp\Session;

use Hdphp\Session\AbSession;

class File implements AbSession
{
    public function __construct()
    {
    }

    //执行SESSION控制
    public function make()
    {
    	session_save_path('storage/session');

    	session_start();
    }
}