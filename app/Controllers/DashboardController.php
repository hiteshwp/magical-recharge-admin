<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class DashboardController extends BaseController
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
            "pageTitle"     =>  "Dashboard | ".SITE_TITLE,
            "main_content"  =>  "dashboard",
        );
        return view('/innerpage/template', $pageData);
    }

    public function logout()
    {
        $session = session();
        unset($_SESSION['sessionData']);
        $session->setFlashdata('logout-success', 'You have successfully Logout!.');
        return redirect()->to('/');
    }

    public function my_profile()
    {
        $pageData = array(
            "pageTitle"     =>  "My Profile | ".SITE_TITLE,
            "title"         =>  "My Profile",
            "main_content"  =>  "my_profile",
        );
        return view('/innerpage/template', $pageData);
    }
}
