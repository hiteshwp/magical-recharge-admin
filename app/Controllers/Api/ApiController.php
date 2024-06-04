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
        //echo "<pre>"; print_r($this->request->getVar()); die;
        $encrypter = \Config\Services::encrypter();
        $rules = [
            "full_name"     => "required",
            "mobile_number" => "required|is_unique[tbl_user.user_mobile_number]",
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
                "user_full_name"        =>  $this->request->getVar("full_name"),
                "user_mobile_number"    =>  $this->request->getVar("mobile_number"),
                "user_password"         =>  $encrypter->encrypt($this->request->getVar("password")),
                "user_referral_by"      =>  $this->request->getVar("user_referral_by"),
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
            $userModel = new UserModel();
            $loginData = $userModel->where("user_mobile_number", trim($this->request->getVar("mobile_number")))
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
                                "user_id"               => $loginData["user_id"],
                                "user_full_name"        => $loginData["user_full_name"],
                                "user_mobile_number"    => $loginData["user_mobile_number"],
                                "user_referral_by"      => $loginData["user_referral_by"],
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
            "mobile_number" => "required",
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
            $loginData = $userModel->where("user_mobile_number", trim($this->request->getVar("mobile_number")))
                                    ->where("user_status!=", "0")
                                    ->first();
            if( $loginData )
            {
                $updated_data = array(
                    "user_status"   => "5"
                );

                if( $userModel->update($loginData["user_id"], $updated_data) )
                {
                    $response = [
                        "status"    =>  true,
                        "message"   =>  "Mobile number exist",
                        "data"      =>  [
                            "user_id"               => $loginData["user_id"],
                            "user_full_name"        => $loginData["user_full_name"],
                            "user_mobile_number"    => $loginData["user_mobile_number"],
                            "user_referral_by"      => $loginData["user_referral_by"],
                        ]
                    ];
                }
                else
                {
                    $response = [
                        "status"    =>  false,
                        "message"   =>  "Invalid mobile number",
                        "data"      =>  []
                    ];
                }

            }
            else
            {
                $response = [
                    "status"    =>  false,
                    "message"   =>  "Invalid mobile number",
                    "data"      =>  []
                ];
            }
        }

        return $this->respondCreated( $response ); 
    }

    public function new_password()
    {
        $encrypter = \Config\Services::encrypter();
        $rules = [
            "user_id"       => "required",
            "new_password"  => "required",
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
            $loginData = $userModel->where("user_id", trim($this->request->getVar("user_id")))
                                    ->where("user_status!=", "0")
                                    ->first();
            if( $loginData )
            {
                $updated_data = array(
                    "user_password"  =>  $encrypter->encrypt($this->request->getVar("new_password")),
                );

                if( $userModel->update($loginData["user_id"], $updated_data) )
                {
                    $response = [
                        "status"    =>  true,
                        "message"   =>  "Password updated successfully",
                        "data"      =>  [
                            "user_id"               => $loginData["user_id"],
                            "user_full_name"        => $loginData["user_full_name"],
                            "user_mobile_number"    => $loginData["user_mobile_number"],
                            "user_referral_by"      => $loginData["user_referral_by"],
                        ]
                    ];
                }
                else
                {
                    $response = [
                        "status"    =>  false,
                        "message"   =>  "Invalid details",
                        "data"      =>  []
                    ];
                }

            }
            else
            {
                $response = [
                    "status"    =>  false,
                    "message"   =>  "Invalid details",
                    "data"      =>  []
                ];
            }
        }

        return $this->respondCreated( $response ); 
    }
}
