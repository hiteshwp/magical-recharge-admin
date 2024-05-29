<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\AdminModel;

class LoginController extends BaseController
{
    public function __construct()
    {
        $session = session();
        if( $session->has('sessionData') )
        {
            $session = session();
            header("Location: dashboard");
            die;
        }
    }
    public function index()
    {
        $pageData = array(
            "pageTitle" =>  "Login | ".SITE_TITLE,
        );
        return view('login', $pageData);
    }

    public function login()
    {
        $adminModel = new AdminModel();
        $encrypter = \Config\Services::encrypter();
        $request   = service('request');
        $postData  = $request->getPost();
        $session   = session();

        if( isset($postData['action']) && isset($postData['txtloginemail']) && isset($postData['txtloginpassword']) && $postData['action'] == "actDoLogin" )
        {
            $emailPassword = $encrypter->encrypt($_POST["txtloginpassword"]);

            $loginData = $adminModel->where("admin_email_address", trim($_POST["txtloginemail"]))
                                    ->where("admin_status", "1")
                                    ->first();
            if( $loginData )
            {
                if( trim($postData["txtloginpassword"]) == $encrypter->decrypt($loginData["admin_password"]) )
                {
                    $sessionData = [
                        'login_id'              => $loginData['admin_id'],
                        'login_full_name'       => $loginData['admin_fullname'],  
                        'login_email_address'   => $loginData['admin_email_address'],
                        'isLoggedIn'            => TRUE,
                        'login_type'            => "Admin",
                    ];
                    $session->set("sessionData", $sessionData);

                    $session->setFlashdata('login-success', 'Welcomes to '.SITE_TITLE.'!.');

                    $response = array(
                        "status"    =>  "Success",
                        "msg"       =>  "You have Successfully Login!.",
                    );
        
                }
                else
                {
                    $response = array(
                        "status"    =>  "Fail",
                        "msg"       =>  "Invalid Login Credentials !.",
                    );
        
                }
            }   
            else
            {
                $response = array(
                    "status"    =>  "Fail",
                    "msg"       =>  "Invalid Login Credentials !.",
                );
    
            }                     
        }
        else
        {
            $response = array(
                "status"    =>  "Fail",
                "msg"       =>  "Missing details !.",
            );

        }
        echo json_encode($response); die;
    }
    
    public function forgot_password()
    {
        $pageData = array(
            "pageTitle" =>  "Forgot Password | ".SITE_TITLE,
        );
        return view('forgot_password', $pageData);
    }

    public function reset_password()
    {
        if( $this->request->getGet() && $this->request->getGet("rp") )
        {
            $userModel = new UserModel();
            $query_string = base64_decode($this->request->getGet("rp"));
            $query_string = json_decode($query_string, true);
            if( isset($query_string["email_address"]) )
            {
                $userData = $userModel->where("user_email_address", trim($query_string["email_address"]))
                                        ->where("user_status", "5")
                                        ->first();
                if( $userData )
                {
                    $pageData = array(
                        "pageTitle" =>  "Reset Password | ".SITE_TITLE,
                        "getDetails" =>  $this->request->getGet("rp"),
                    );
                    return view('reset_password', $pageData);
                }
                else
                {
                    return redirect()->to('/');
                }
            }
            else
            {
                return redirect()->to('/');
            }
        }
        else
        {
            return redirect()->to('/');
        }
    }

    public function do_reset_password()
    {
        $userModel = new UserModel();
        $encrypter = \Config\Services::encrypter();
        $postData  = $this->request->getPost();
        $session   = session();

        if ($this->request->isAJAX()) 
        {
            if( isset($postData['action']) && isset($postData['txtnewpassword']) && isset($postData['requestdetails']) && $postData['action'] == "actDoResetPassword" )
            {
                $query_string = base64_decode($this->request->getPost("requestdetails"));
                $query_string = json_decode($query_string, true);
                if( isset($query_string["email_address"]) )
                {
                    $userData = $userModel->where("user_email_address", trim($query_string["email_address"]))
                                            ->where("user_status", "5")
                                            ->first();
                    if( $userData )
                    {
                        $update_data = array(
                            "user_password" => $encrypter->encrypt($postData["txtnewpassword"]),
                            "user_status"   => "1",
                        );

                        if( $userModel->update($userData["user_id"], $update_data) )
                        {
                            $response = array(
                                "status"    =>  "Success",
                                "msg"       =>  "New password updated succesfully!.",
                            );
                        }                    
                        else
                        {
                            $response = array(
                                "status"    =>  "Fail",
                                "msg"       =>  "Something went wrong.",
                            );
                
                        }
                    }   
                    else
                    {
                        $response = array(
                            "status"    =>  "Fail",
                            "msg"       =>  "Invalid Email Address!.",
                        );
            
                    } 
                }
                else
                {
                    $response = array(
                        "status"    =>  "Fail",
                        "msg"       =>  "Invalid url.",
                    );
    
                }                    
            }
            else
            {
                $response = array(
                    "status"    =>  "Fail",
                    "msg"       =>  "Missing details !.",
                );

            }
        }

        echo json_encode($response); die;
    }
}
