<?php

namespace App\Controllers\Api;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use App\Models\UserModel;

class ApiController extends ResourceController
{
    // POST
    public function user_registration()
    {
        $encrypter = \Config\Services::encrypter();
        $rules = [
            "first_name"    => "required",
            "last_name"     => "required",
            "email_address" => "required|valid_email|is_unique[tbl_user.user_email_address]",
            "mobile_number" => "required",
            "password"      => "required",
        ];

        if( ! $this->validate($rules) )
        {
            $response = [
                "status"    =>  false,
                "message"   =>  $this->validator->getErrors(),
                "data"      =>  []
            ];
        }
        else
        {
            $user_model_data = new UserModel();
            $data = [
                "user_first_name"       =>  $this->request->getVar("first_name"),
                "user_last_name"        =>  $this->request->getVar("last_name"),
                "user_email_address"    =>  $this->request->getVar("email_address"),
                "user_mobile_number"    =>  $this->request->getVar("mobile_number"),
                "user_password"         =>  $encrypter->encrypt($this->request->getVar("password")),
            ];

            if( $user_model_data->insert($data) )
            {
                $response = [
                    "status"    =>  true,
                    "message"   =>  "User registration successfully",
                    "data"      =>  []
                ];
            }
            else
            {
                $response = [
                    "status"    =>  false,
                    "message"   =>  "Failed to user registreation",
                    "data"      =>  []
                ];
            }
        }

        return $this->respondCreated( $response );
    }

    public function user_login()
    {
        $encrypter = \Config\Services::encrypter();
        $rules = [
            "email_address" => "required|valid_email",
            "password"      => "required",
        ];

        if( ! $this->validate($rules) )
        {
            $response = [
                "status"    =>  false,
                "message"   =>  $this->validator->getErrors(),
                "data"      =>  []
            ];
        }
        else
        {
            $userModel = new UserModel();
            $loginData = $userModel->where("user_email_address", trim($this->request->getVar("email_address")))
                                    ->where("user_status", "1")
                                    ->first();
            if( $loginData )
            {
                if( trim($this->request->getVar("password")) == $encrypter->decrypt($loginData["user_password"]) )
                {
                    $token = $this->get_token();
                    $update_data = array(
                        "user_login_token"  => $token,
                    );
                    if( $userModel->update($loginData["user_id"],$update_data) )
                    {
                        $response = [
                            "status"    =>  true,
                            "message"   =>  "User login successfully",
                            "data"      =>  [
                                "user_id"   => $loginData["user_id"],
                                "token"     => $token
                            ]
                        ];
                    }
                }
                else
                {
                    $response = [
                        "status"    =>  false,
                        "message"   =>  "Invalid login credentials",
                        "data"      =>  []
                    ];
                }
            }
            else
            {
                $response = [
                    "status"    =>  false,
                    "message"   =>  "Invalid login credentials",
                    "data"      =>  []
                ];
            }
        }

        return $this->respondCreated( $response ); 
    }

    public function get_token()
    {
        $char = "bcdfghjkmnpqrstvzBCDFGHJKLMNPQRSTVWXZaeiouyAEIOUY!@#%";
        $token = '';
        for ($i = 0; $i < 47; $i++) $token .= $char[(rand() % strlen($char))];
        return $token;
    }

    public function forgot_password()
    {
        $rules = [
            "email_address" => "required|valid_email",
        ];

        if( ! $this->validate($rules) )
        {
            $response = [
                "status"    =>  false,
                "message"   =>  $this->validator->getErrors(),
                "data"      =>  []
            ];
        }
        else
        {
            $userModel = new UserModel();
            $loginData = $userModel->where("user_email_address", trim($this->request->getVar("email_address")))
                                    ->where("user_status!=", "0")
                                    ->first();
            if( $loginData )
            {
                $email = \Config\Services::email();

                $email->setFrom('wp@stagingurlhub.in', 'Hitesh Prajapati');
                $email->setTo($this->request->getVar("email_address"));

                $encode_code = array(
                    "email_address"     => $this->request->getVar("email_address")
                );

                $updated_data = array(
                    "user_status"   => "5"
                );

                $encode_code = json_encode($encode_code);
                $encode_code = base64_encode($encode_code);
                $url = base_url("reset-password/?rp=".$encode_code);

                $html = "";
                $html .= "<h3>Reset your password?</h3>";
                $html .= "<p>We've received a request to set a new password for this Email Account:</p>";
                $html .= "<p><b>".$this->request->getVar("email_address")."</b></p><br>";
                $html .= "<a href='".$url."' style='padding:5px 10px; background-color:#6710c2 !important; color:#fff !important; text-decoration:none;'>Set Password</a><br><br>";
                $html .= "<p>If you didn't request this, you can safely ignore this email.</p>";

                $email->setSubject('Reset Password - '.SITE_TITLE);
                $email->setMessage($html);

                if( $userModel->update($loginData["user_id"], $updated_data) )
                {
                    $email->send();
                }

                $response = [
                    "status"    =>  true,
                    "message"   =>  "Password reset link send to your registered email address.",
                    "data"      =>  []
                ];
            }
            else
            {
                $response = [
                    "status"    =>  false,
                    "message"   =>  "Invalid email address",
                    "data"      =>  []
                ];
            }
        }

        return $this->respondCreated( $response ); 
    }

    public function reset_password()
    {
        echo "Hello"; die;
    }
}
