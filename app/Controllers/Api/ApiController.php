<?php

namespace App\Controllers\Api;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use App\Models\UserModel;

class ApiController extends ResourceController
{
    // POST
    public function verify_mobile_number()
    {
        $rules = [
            "mobile_number" => "required",
        ];

        if( ! $this->validate($rules) )
        {
            $response = [
                "status"    =>  false,
                "message"   =>  $this->validator->getErrors(),
            ];
        }
        else
        {
            $userModel = new UserModel();
            $loginData = $userModel->where("user_mobile_number", trim($this->request->getVar("mobile_number")))
                                    ->where("user_status != ", "0")
                                    ->first();
            if( ! $loginData )
            {
                $mobile_otp = rand(111111, 999999);
                $response = [
                    "status"    =>  true,
                    "message"   =>  "Mobile number available",
                    "data"      =>  [
                        "mobile_otp"            => $mobile_otp,
                    ]
                ];
            }
            else
            {
                $response = [
                    "status"    =>  false,
                    "message"   =>  "Mobile number already registered",
                ];
            }
        }

        return $this->respondCreated( $response ); 
    }
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
                $lastInsertId = $user_model_data->getInsertID();

                $userData = $user_model_data->where("user_id", $lastInsertId)
                                            ->where("user_status", "1")
                                            ->first();

                $token = $this->get_token();

                $response = [
                    "status"    =>  true,
                    "message"   =>  "User registration successfully",
                    "data"      =>  [
                        "user_id"               => $userData["user_id"],
                        "user_full_name"        => $userData["user_full_name"],
                        "user_mobile_number"    => $userData["user_mobile_number"],
                        "user_referral_by"      => $userData["user_referral_by"],
                        "token"                 => $token
                    ]
                ];
            }
            else
            {
                $response = [
                    "status"    =>  false,
                    "message"   =>  "Failed to user registreation",
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
            ];
        }
        else
        {
            $userModel = new UserModel();
            $loginData = $userModel->where("user_mobile_number", trim($this->request->getVar("mobile_number")))
                                    ->where("user_status != ", "0")
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
                        $getUserData = $userModel->where("user_id", trim($loginData["user_id"]))
                                                ->first();
                        $response = [
                            "status"    =>  true,
                            "message"   =>  "User login successfully",
                            "data"      =>  [
                                "user_id"               => $getUserData["user_id"],
                                "user_full_name"        => $getUserData["user_full_name"],
                                "user_mobile_number"    => $getUserData["user_mobile_number"],
                                "user_referral_by"      => $getUserData["user_referral_by"],
                                "user_status"           => $getUserData["user_status"],
                                "user_bio"              => $getUserData["user_bio"],
                                "token"                 => $token
                            ]
                        ];

                        if( $getUserData["user_image"] != "" )
                        {
                            $response["data"]["user_image"] = base_url()."/profileimage/". $getUserData["user_image"];
                        }
                        else
                        {
                            $response["data"]["user_image"] = "";
                        }
                    }
                }
                else
                {
                    $response = [
                        "status"    =>  false,
                        "message"   =>  "Invalid login credentials",
                    ];
                }
            }
            else
            {
                $response = [
                    "status"    =>  false,
                    "message"   =>  "Invalid login credentials",
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
                    $getUserData = $userModel->where("user_id", trim($loginData["user_id"]))
                                                ->first();
                    $response = [
                        "status"    =>  true,
                        "message"   =>  "Mobile number exist",
                        "data"      =>  [
                            "user_id"               => $getUserData["user_id"],
                            "user_full_name"        => $getUserData["user_full_name"],
                            "user_mobile_number"    => $getUserData["user_mobile_number"],
                            "user_referral_by"      => $getUserData["user_referral_by"],
                            "user_status"           => $getUserData["user_status"],
                        ]
                    ];
                }
                else
                {
                    $response = [
                        "status"    =>  false,
                        "message"   =>  "Invalid mobile number",
                    ];
                }

            }
            else
            {
                $response = [
                    "status"    =>  false,
                    "message"   =>  "Invalid mobile number",
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
            ];
        }
        else
        {
            $userModel = new UserModel();
            $loginData = $userModel->where("user_id", trim($this->request->getVar("user_id")))
                                    ->where("user_status", "4")
                                    ->orWhere("user_status", "5")
                                    ->first();
            if( $loginData )
            {
                $updated_data = array(
                    "user_password"     =>  $encrypter->encrypt($this->request->getVar("new_password")),
                    "user_status"       => "1"
                );

                if( $userModel->update($loginData["user_id"], $updated_data) )
                {
                    $getUserData = $userModel->where("user_id", trim($loginData["user_id"]))
                                            ->first();

                    $response = [
                        "status"    =>  true,
                        "message"   =>  "Password updated successfully",
                        "data"      =>  [
                            "user_id"               => $getUserData["user_id"],
                            "user_full_name"        => $getUserData["user_full_name"],
                            "user_mobile_number"    => $getUserData["user_mobile_number"],
                            "user_referral_by"      => $getUserData["user_referral_by"],
                            "user_status"           => $getUserData["user_status"],
                        ]
                    ];
                }
                else
                {
                    $response = [
                        "status"    =>  false,
                        "message"   =>  "Invalid details",
                    ];
                }

            }
            else
            {
                $response = [
                    "status"    =>  false,
                    "message"   =>  "Invalid details",
                ];
            }
        }

        return $this->respondCreated( $response ); 
    }

    public function edit_profile()
    {
        // echo "<pre>"; print_r($this->request->getFile("user_image"));
        // print_r($this->request->getVar()); die;
        $rules = [
            "user_id"      => "required",
            "full_name"    => "required",
        ];

        if( $this->request->getFile("user_image") )
        {
            $rules["user_image"] = "max_size[user_image,1024]|is_image[user_image]|mime_in[user_image,image/png,image/jpeg]";
        }

        if( ! $this->validate($rules) )
        {
            $response = [
                "status"    =>  false,
                "message"   =>  $this->validator->getErrors(),
            ];
        }
        else
        {
            $userModel = new UserModel();
            $checkUserData = $userModel->where("user_id", trim($this->request->getVar("user_id")))
                                    ->first();
            if( $checkUserData )
            {
                $updated_data = array(
                    "user_full_name"    =>  $this->request->getVar("full_name"),
                    "user_bio"          =>  $this->request->getVar("user_bio"),
                    "user_status"       => "1"
                );

                if( $this->request->getFile("user_image") )
                {
                    $userImage = $this->request->getFile('user_image');
                    if (! $userImage->hasMoved()) 
                    {
                        $name       =   $userImage->getName();
                        $ext        =   $userImage->getClientExtension();
                        $newname    =   $userImage->getRandomName();

                        if( $userImage->move("profileimage", $newname) )
                        {
                            $updated_data['user_image'] = $newname;
                        }
                    }
                }

                if( $userModel->update($checkUserData["user_id"], $updated_data) )
                {
                    $getUserData = $userModel->where("user_id", trim($this->request->getVar("user_id")))
                                                ->first();
                    $response = [
                        "status"    =>  true,
                        "message"   =>  "Profile updated successfully",
                        "data"      =>  [
                            "user_id"               => $getUserData["user_id"],
                            "user_full_name"        => $getUserData["user_full_name"],
                            "user_mobile_number"    => $getUserData["user_mobile_number"],
                            "user_referral_by"      => $getUserData["user_referral_by"],
                            "user_bio"              => $getUserData["user_bio"],
                            "user_status"           => $getUserData["user_status"],
                        ]
                    ];

                    if( $getUserData["user_image"] != "" )
                    {
                        $response["data"]["user_image"] = base_url()."/profileimage/". $getUserData["user_image"];
                    }
                    else
                    {
                        $response["data"]["user_image"] = "";
                    }
                }
                else
                {
                    $response = [
                        "status"    =>  false,
                        "message"   =>  "Invalid details",
                    ];
                }

            }
            else
            {
                $response = [
                    "status"    =>  false,
                    "message"   =>  "Invalid details",
                ];
            }
        }

        return $this->respondCreated( $response ); 
    }

    public function change_password()
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
            ];
        }
        else
        {
            $userModel = new UserModel();
            $loginData = $userModel->where("user_id", trim($this->request->getVar("user_id")))
                                    ->where("user_status", "1")
                                    ->first();
            if( $loginData )
            {
                $updated_data = array(
                    "user_password"  =>  $encrypter->encrypt($this->request->getVar("new_password")),
                    "user_status"   => "1"
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
                            "user_status"           => $loginData["user_status"],
                        ]
                    ];
                }
                else
                {
                    $response = [
                        "status"    =>  false,
                        "message"   =>  "Invalid details",
                    ];
                }

            }
            else
            {
                $response = [
                    "status"    =>  false,
                    "message"   =>  "Invalid details",
                ];
            }
        }

        return $this->respondCreated( $response ); 
    }
}
