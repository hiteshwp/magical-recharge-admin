<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class UserController extends BaseController
{
    public function __construct()
    {
        $session = session();
        //echo "<pre>"; print_r($session); die;
        if( !$session->has('sessionData') )
        {
            $session = session();
            header("Location: ".base_url("/"));
            die;
            
        }
    }
    public function index()
    {
        $pageData = array(
            "pageTitle"     =>  "User List | ".SITE_TITLE,
            "title"         =>  "User List",
            "main_content"  =>  "user/list",
        );
        return view('/innerpage/template', $pageData);
    }

    public function create()
    {
        $pageData = array(
            "pageTitle"     =>  "Create User | ".SITE_TITLE,
            "title"         =>  "Create User",
            "main_content"  =>  "user/create",
        );
        return view('/innerpage/template', $pageData);
    }

    public function deactive_user_list()
    {
        $pageData = array(
            "pageTitle"     =>  "Deactive User List | ".SITE_TITLE,
            "title"         =>  "Deactive User List",
            "main_content"  =>  "user/deactive_list",
        );
        return view('/innerpage/template', $pageData);
    }
}
