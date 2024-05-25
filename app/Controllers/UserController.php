<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;
use App\Models\CountryModel;
use App\Models\StateModel;
use App\Models\CityModel;

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
    public function get_ajax_user_list()
    {
        $session            = session();
        $loginData          = $session->get('sessionData');
        $request            = service('request');
        $postData           = $request->getPost();
        $data               = array();
        $search             = "";
        $order              = "tbl_user.user_id";
        $orderBy            = "desc";
        $start              = $postData["start"];
        $draw               = $postData["draw"];
        $rowperpage         = $postData["length"];
        $userModel       = new UserModel();

        //echo "<pre>"; print_r($_POST); die;

        if( isset($_POST["order"][0]["column"]) && $_POST["order"][0]["column"] != "" )
        {
            $case = $_POST["order"][0]["column"];
            switch ($case) {
                case 0:
                    $order = "tbl_user.user_id";
                    $orderBy = $_POST["order"][0]["dir"];
                    break;
                case 1:
                    $order = "tbl_user.user_shop_name";
                    $orderBy = $_POST["order"][0]["dir"];
                    break; 
                case 2:
                    $order = "tbl_user.user_first_name";
                    $orderBy = $_POST["order"][0]["dir"];
                    break; 
                case 3:
                    $order = "tbl_user.user_last_name";
                    $orderBy = $_POST["order"][0]["dir"];
                    break; 
                case 4:
                    $order = "tbl_user.user_email_address";
                    $orderBy = $_POST["order"][0]["dir"];
                    break;  
                case 5:
                    $order = "tbl_user.user_mobile_number";
                    $orderBy = $_POST["order"][0]["dir"];
                    break;            
                default:
                    $order = "tbl_user.user_id";
                    $orderBy = "DESC";
            }
        }

        $userModelTotalData = $userModel->where("user_status", "1")
                                        ->findAll();
        $userModelData      = $userModel->where("user_status", "1")
                                        ->orderBy($order, $orderBy)
                                        ->findAll($rowperpage, $start);   
                       
        if( isset($_POST["search"]["value"]) && $_POST["search"]["value"] != "" )
        {
            $search = $_POST["search"]["value"];

            $userModelData = $userModel->like("user_shop_name", $search)
                                        ->where("user_status", "1")
                                        ->orderBy($order, $orderBy)
                                        ->findAll($rowperpage, $start);
        }
        if($userModelData)
        {
            foreach($userModelData as $userModelTotalDataList )
            {
                $status = "";
                if($userModelTotalDataList["user_status"] == 1)
                { 
                    $status = '<span class="badge bg-success me-1 mb-1 mt-1">Active</span>'; 
                    //$status = '<div class="material-switch"><input id="someSwitchOptionSuccess" name="someSwitchOption001" type="checkbox" checked=""><label for="someSwitchOptionSuccess" class="label-success"></label></div>'; 
                }
                else if($userModelTotalDataList["user_status"] == 0)
                { 
                    $status = '<span class="badge bg-warning me-1 mb-1 mt-1">Deactive</span>'; 
                }
                else
                { 
                    $status = '<span class="badge bg-danger me-1 mb-1 mt-1">Delete</span>'; 
                }
                 $thisArr = array(
                    "user_id"           =>  $userModelTotalDataList["user_id"],
                    "user_type"         =>  USER_TYPE[$userModelTotalDataList["user_type"]],
                    "user_shop_name"    =>  $userModelTotalDataList["user_shop_name"],
                    "user_first_name"   =>  $userModelTotalDataList["user_first_name"],
                    "user_last_name"    =>  $userModelTotalDataList["user_last_name"],
                    "user_email_address"=>  $userModelTotalDataList["user_email_address"],
                    "user_mobile_number"=>  $userModelTotalDataList["user_mobile_number"],
                    "user_status"       =>  $status,
                );

                //$thisArr["Action"] = '<a class="btn btn-sm whitetext btn-success updateuser">Edit</a>';
                $thisArr["Action"] = '<a href="'.base_url().'user/select/'.$userModelTotalDataList["user_id"].'" class="btn btn-sm whitetext btn-success updateuser">Edit</a>';
                if( $userModelTotalDataList["user_status"] != 2 )
                {
                    $thisArr["Action"] .= ' <a class="btn btn-danger btn-sm whitetext deleteuser" data-user-id="'.$userModelTotalDataList["user_id"].'" title="Delete Record" >Delete</a>';
                }

                array_push($data, $thisArr);
            }
        }

        $output = array(  
            "draw"              =>  intval($draw), 
            "recordsTotal"      =>  count($userModelData),  
            "recordsFiltered"   =>  count($userModelTotalData),  
            "data"              =>  $data,
            "loginData"         =>  $loginData, 
        );  
        echo json_encode($output);
    }
    public function create()
    {
        $country_model = new CountryModel();
        $country_model_data = $country_model->orderBy('country_name','asc')->findAll();
        $pageData = array(
            "pageTitle"             =>  "Create User | ".SITE_TITLE,
            "title"                 =>  "Create User",
            "main_content"          =>  "user/create",
            "country_model_data"   => $country_model_data
        );
        return view('/innerpage/template', $pageData);
    }
    public function store_user_data()
    {
        $request   = service('request');
        $postData  = $request->getPost();
        $user_model = new UserModel();
        
        if( $postData["action_type"] == "act_store_user_data")
        {
            // $categoryModelCheck = $categoryModel->where("category_name",$postData["txtcategoryname"])
            //                                         ->first();
            // if($categoryModelCheck)
            // {
            //     echo 3; die;
            // }

            $insertdata = array(
                    'user_type'                         =>  $postData["txtusertype"],
                    'user_shop_name'                    =>  $postData["txtshopname"],
                    'user_country_id'                   =>  $postData["txtcountry"],
                    'user_state_id'                     =>  $postData["txtstate"],
                    'user_city_id'                      =>  $postData["txtcity"],
                    'user_pincode'                      =>  $postData["txtpincode"],
                    'user_address'                      =>  $postData["txtaddress"],
                    'user_first_name'                   =>  $postData["txtfirstname"],
                    'user_last_name'                    =>  $postData["txtlastname"],
                    'user_email_address'                =>  $postData["txtemailaddress"],
                    'user_mobile_number'                =>  $postData["txtphonenumber"],
                    'user_alternative_mobile_number'    =>  $postData["txtalternativemobilenumber"],
                    'user_wallet_cap'                   =>  $postData["txtwalletcap"],
                    'user_company_name'                 =>  $postData["txtcompanyname"],
                    'user_pan_card'                     =>  $postData["txtpancardnumber"],
                    'user_aadhar_card'                  =>  $postData["txtaadharnumber"],
                    'user_gst_number'                   =>  $postData["txtgstnumber"],
                    'user_rights'                       =>  implode(",", $postData["txtuserrights"]),
                    'user_referral_by'                  =>  $postData["txtreferralby"],
                    'created_at'                        =>  date("Y-m-d H:i:s"),
                    'updated_at'                        =>  date("Y-m-d H:i:s"),
                    'user_status'                       =>  "1",
            );

            if($user_model->insert($insertdata))
            {
                $data = array(
                    "status"    => "Success",
                    "message"   => "New User data are stored!",
                );
            }
            else
            {
                $data = array(
                    "status"    => "Failed",
                    "message"   => "Something went wrong!",
                );
            }
        }
        else
        {
            $data = array(
                "status"    => "Failed",
                "message"   => "Params are missing!",
            );
        }

        return json_encode($data);
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
    public function get_state_data()
    {
        $request   = service('request');
        $postData  = $request->getPost();
        $html_output = "";
        if( isset($postData["action"]) && $postData['action'] == 'act_get_state' && $postData['country_id'] != '')
        {
            $state_model = new StateModel();
            $state_model_data = $state_model->where('country_id', $postData['country_id'])
                                            ->orderBy('state_name','asc')
                                            ->findAll();
            if( $state_model_data )
            {
                $html_output .= '<option value="">Select State</option>';
                foreach( $state_model_data as $state_model_data_list )
                {
                    $html_output .= '<option value="'.$state_model_data_list["state_id"].'">'.$state_model_data_list["state_name"].'</option>';
                }

                $data = array(
                    "status"    => "Success",
                    "message"   => "Record found!.",
                    "data"      => $html_output
                );
            }
            else
            {
                $data = array(
                    "status"    => "Failed",
                    "message"   => "Record not found !.",
                    "data"      => ""
                );
            }
        }
        else
        {
            $data = array(
                "status"    => "Failed",
                "message"   => "Params are missing.",
                "data"      => ""
            );
        }

        return json_encode($data);
    }
    public function get_city_data()
    {
        $request   = service('request');
        $postData  = $request->getPost();
        $html_output = "";
        if( isset($postData["action"]) && $postData['action'] == 'act_get_city' && $postData['state_id'] != '')
        {
            $city_Model = new CityModel();
            $city_model_data = $city_Model->where('state_id', $postData['state_id'])
                                            ->orderBy('city_name','asc')
                                            ->findAll();
            if( $city_model_data )
            {
                $html_output .= '<option value="">Select City</option>';
                foreach( $city_model_data as $city_model_data_list )
                {
                    $html_output .= '<option value="'.$city_model_data_list["city_id"].'">'.$city_model_data_list["city_name"].'</option>';
                }

                $data = array(
                    "status"    => "Success",
                    "message"   => "Record found!.",
                    "data"      => $html_output
                );
            }
            else
            {
                $data = array(
                    "status"    => "Failed",
                    "message"   => "Record not found !.",
                    "data"      => ""
                );
            }
        }
        else
        {
            $data = array(
                "status"    => "Failed",
                "message"   => "Params are missing.",
                "data"      => ""
            );
        }

        return json_encode($data);
    }

    public function select_user($id)
    {
        $country_model = new CountryModel();
        $user_model = new UserModel();
        $state_model_data = "";
        $city_model_data = "";
        $user_model_data = $user_model->where("user_id", $id)->first();
        $country_model_data = $country_model->orderBy('country_name','asc')->findAll();
        if( $country_model_data )
        {
            $state_model = new StateModel();
            $state_model_data = $state_model->where('country_id', $user_model_data['user_country_id'])
                                            ->orderBy('state_name','asc')
                                            ->findAll();

            $city_Model = new CityModel();
            $city_model_data = $city_Model->where('state_id', $user_model_data['user_state_id'])
                                            ->orderBy('city_name','asc')
                                            ->findAll();

            $user_rights = explode(',', $user_model_data['user_rights']);
        }
        $pageData = array(
            "pageTitle"             =>  "Edit User | ".SITE_TITLE,
            "title"                 =>  "Edit User",
            "main_content"          =>  "user/edit",
            "country_model_data"    => $country_model_data,
            "user_model_data"       => $user_model_data,
            "state_model_data"      => $state_model_data,
            "city_model_data"       => $city_model_data,
            "user_rights"           => $user_rights
        );
        return view('/innerpage/template', $pageData);
    }

    public function update_user_data()
    {
        $request   = service('request');
        $postData  = $request->getPost();
        $user_model = new UserModel();
        $update_user_id = $postData["update_user_id"];
        
        if( $postData["action_type"] == "act_update_user_data")
        {
            // $categoryModelCheck = $categoryModel->where("category_name",$postData["txtcategoryname"])
            //                                         ->first();
            // if($categoryModelCheck)
            // {
            //     echo 3; die;
            // }

            $updatedata = array(
                    'user_type'                         =>  $postData["txtusertype"],
                    'user_shop_name'                    =>  $postData["txtshopname"],
                    'user_country_id'                   =>  $postData["txtcountry"],
                    'user_state_id'                     =>  $postData["txtstate"],
                    'user_city_id'                      =>  $postData["txtcity"],
                    'user_pincode'                      =>  $postData["txtpincode"],
                    'user_address'                      =>  $postData["txtaddress"],
                    'user_first_name'                   =>  $postData["txtfirstname"],
                    'user_last_name'                    =>  $postData["txtlastname"],
                    'user_email_address'                =>  $postData["txtemailaddress"],
                    'user_mobile_number'                =>  $postData["txtphonenumber"],
                    'user_alternative_mobile_number'    =>  $postData["txtalternativemobilenumber"],
                    'user_wallet_cap'                   =>  $postData["txtwalletcap"],
                    'user_company_name'                 =>  $postData["txtcompanyname"],
                    'user_pan_card'                     =>  $postData["txtpancardnumber"],
                    'user_aadhar_card'                  =>  $postData["txtaadharnumber"],
                    'user_gst_number'                   =>  $postData["txtgstnumber"],
                    'user_rights'                       =>  implode(",", $postData["txtuserrights"]),
                    'user_referral_by'                  =>  $postData["txtreferralby"],
                    'created_at'                        =>  date("Y-m-d H:i:s"),
                    'updated_at'                        =>  date("Y-m-d H:i:s"),
                    'user_status'                       =>  $postData["txtstatus"],
            );

            if($user_model->update($update_user_id, $updatedata))
            {
                $data = array(
                    "status"    => "Success",
                    "message"   => "User data are updated!",
                );
            }
            else
            {
                $data = array(
                    "status"    => "Failed",
                    "message"   => "Something went wrong!",
                );
            }
        }
        else
        {
            $data = array(
                "status"    => "Failed",
                "message"   => "Params are missing!",
            );
        }

        return json_encode($data);
    }
    public function delete_user_data()
    {
        $request   = service('request');
        $postData  = $request->getPost();
        $user_model = new UserModel();

        if( isset($postData["action_type"]) && isset($postData["deleteuserid"]) && $postData["action_type"] == "act_delete_user_data" )
        {
            $requestDeleteId = $postData["deleteuserid"];
            $userModelCheck = $user_model->where("user_id",$requestDeleteId)
                                            ->first();
            if(!$userModelCheck)
            {
                $data = array(
                    "status"    => "failed",
                    "message"   => "Invalid user id!",
                );
            }

            $updatedata = [
                'deleted_at'                    =>  date("Y-m-d H:i:s"),
                'user_status'                =>  "2",
            ];

            if($user_model->update($requestDeleteId, $updatedata))
            {
                $data = array(
                    "status"    => "Success",
                    "message"   => "User data are deleted!",
                );
            }
            else
            {
                $data = array(
                    "status"    => "Failed",
                    "message"   => "Something went wrong!",
                );
            }
        }
        else
        {
            $data = array(
                "status"    => "Failed",
                "message"   => "Params are missing!",
            );
        }

        return json_encode($data);
    }
    public function get_ajax_user_deactive_list()
    {
        $session            = session();
        $loginData          = $session->get('sessionData');
        $request            = service('request');
        $postData           = $request->getPost();
        $data               = array();
        $search             = "";
        $order              = "tbl_user.user_id";
        $orderBy            = "desc";
        $start              = $postData["start"];
        $draw               = $postData["draw"];
        $rowperpage         = $postData["length"];
        $userModel       = new UserModel();

        //echo "<pre>"; print_r($_POST); die;

        if( isset($_POST["order"][0]["column"]) && $_POST["order"][0]["column"] != "" )
        {
            $case = $_POST["order"][0]["column"];
            switch ($case) {
                case 0:
                    $order = "tbl_user.user_id";
                    $orderBy = $_POST["order"][0]["dir"];
                    break;
                case 1:
                    $order = "tbl_user.user_shop_name";
                    $orderBy = $_POST["order"][0]["dir"];
                    break; 
                case 2:
                    $order = "tbl_user.user_first_name";
                    $orderBy = $_POST["order"][0]["dir"];
                    break; 
                case 3:
                    $order = "tbl_user.user_last_name";
                    $orderBy = $_POST["order"][0]["dir"];
                    break; 
                case 4:
                    $order = "tbl_user.user_email_address";
                    $orderBy = $_POST["order"][0]["dir"];
                    break;  
                case 5:
                    $order = "tbl_user.user_mobile_number";
                    $orderBy = $_POST["order"][0]["dir"];
                    break;            
                default:
                    $order = "tbl_user.user_id";
                    $orderBy = "DESC";
            }
        }

        $userModelTotalData = $userModel->where("user_status", "0")
                                        ->findAll();
        $userModelData      = $userModel->where("user_status", "0")
                                        ->orderBy($order, $orderBy)
                                        ->findAll($rowperpage, $start);   
                       
        if( isset($_POST["search"]["value"]) && $_POST["search"]["value"] != "" )
        {
            $search = $_POST["search"]["value"];

            $userModelData = $userModel->like("user_shop_name", $search)
                                        ->where("user_status", "0")
                                        ->orderBy($order, $orderBy)
                                        ->findAll($rowperpage, $start);
        }
        if($userModelData)
        {
            foreach($userModelData as $userModelTotalDataList )
            {
                $status = "";
                if($userModelTotalDataList["user_status"] == 0)
                { 
                    $status = '<span class="badge bg-warning me-1 mb-1 mt-1">Deactive</span>'; 
                }
                 $thisArr = array(
                    "user_id"           =>  $userModelTotalDataList["user_id"],
                    "user_type"         =>  USER_TYPE[$userModelTotalDataList["user_type"]],
                    "user_shop_name"    =>  $userModelTotalDataList["user_shop_name"],
                    "user_first_name"   =>  $userModelTotalDataList["user_first_name"],
                    "user_last_name"    =>  $userModelTotalDataList["user_last_name"],
                    "user_email_address"=>  $userModelTotalDataList["user_email_address"],
                    "user_mobile_number"=>  $userModelTotalDataList["user_mobile_number"],
                    "user_status"        =>  $status,
                );

                //$thisArr["Action"] = '<a class="btn btn-sm whitetext btn-success updateuser">Edit</a>';
                $thisArr["Action"] = '<a href="'.base_url().'user/select/'.$userModelTotalDataList["user_id"].'" class="btn btn-sm whitetext btn-success updateuser">Edit</a>';
                if( $userModelTotalDataList["user_status"] != 2 )
                {
                    $thisArr["Action"] .= ' <a class="btn btn-danger btn-sm whitetext deleteuser" data-user-id="'.$userModelTotalDataList["user_id"].'" title="Delete Record" >Delete</a>';
                }

                array_push($data, $thisArr);
            }
        }

        $output = array(  
            "draw"              =>  intval($draw), 
            "recordsTotal"      =>  count($userModelData),  
            "recordsFiltered"   =>  count($userModelTotalData),  
            "data"              =>  $data,
            "loginData"         =>  $loginData, 
        );  
        echo json_encode($output);
    }
    public function staff_list()
    {

    }
}
