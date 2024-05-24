<div class="main-content app-content mt-0">
    <div class="side-app">
        <div class="main-container container-fluid">
            <form  method="post" method="post" id="frmupdateuserdata"  data-tn="<?php echo csrf_token(); ?>" data-tnv="<?php echo csrf_hash(); ?>">
            <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col md-12 mt-3">
                        <div class="card">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <h1 class="page-title"><?php echo $title; ?></h1>
                                    </div>
                                    <div class="card-status bg-blue br-tr-7 br-tl-7"></div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">Parent Info</h3>
                                            </div>
                                            <div class="card-body ">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="form-label"> Select User Type</label>
                                                            <select class="form-control" name="txtusertype" required>
                                                                <option value="">Select User Type</option>
                                                                <?php
                                                                    foreach( USER_TYPE as $key => $value ) 
                                                                    {
                                                                        ?>
                                                                            <option <?php if($user_model_data["user_type"] == $key ){ echo "selected"; } ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                                                        <?php
                                                                    }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="form-label"> Shop Name</label>
                                                            <input type="text" class="form-control" name="txtshopname" placeholder="Enter shop name" value="<?php echo @$user_model_data["user_shop_name"]; ?>" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mt-5">
                                                    <div class="col-md-12">
                                                        <h3 class="card-title">Address Info</h3>
                                                        <hr>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label"> Country</label>
                                                            <select class="form-control txtcountry" name="txtcountry" required>
                                                                <option value="">Select Country</option>
                                                                <?php
                                                                    if( $country_model_data )
                                                                    {
                                                                        foreach( $country_model_data as $country )
                                                                        {
                                                                            ?>
                                                                                <option <?php if($user_model_data["user_country_id"] == $country["country_id"] ){ echo "selected"; } ?> value="<?php echo $country["country_id"]; ?>"><?php echo $country["country_name"]; ?></option>
                                                                            <?php
                                                                        }
                                                                    }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label"> State</label>
                                                            <select class="form-control txtstate" name="txtstate" required>
                                                                <option value="">Select State</option>
                                                                <?php
                                                                    if( $state_model_data )
                                                                    {
                                                                        foreach( $state_model_data as $statelist )
                                                                        {
                                                                            ?>
                                                                                <option <?php if($user_model_data["user_state_id"] == $statelist["state_id"] ){ echo "selected"; } ?> value="<?php echo $statelist["state_id"]; ?>"><?php echo $statelist["state_name"]; ?></option>
                                                                            <?php
                                                                        }
                                                                    }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label"> City</label>
                                                            <select class="form-control txtcity" data-placeholder="Select City" name="txtcity" required>
                                                                <option value="">Select City</option>
                                                                <?php
                                                                    if( $city_model_data )
                                                                    {
                                                                        foreach( $city_model_data as $citylist )
                                                                        {
                                                                            ?>
                                                                                <option <?php if($user_model_data["user_city_id"] == $citylist["city_id"] ){ echo "selected"; } ?> value="<?php echo $citylist["city_id"]; ?>"><?php echo $citylist["city_name"]; ?></option>
                                                                            <?php
                                                                        }
                                                                    }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label"> Pincode</label>
                                                            <input type="text" class="form-control" id="txtpincode" name="txtpincode" placeholder="Enter pincode" value="<?php echo @$user_model_data["user_pincode"]; ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="form-label"> Address</label>
                                                            <textarea name="txtaddress" id="txtaddress" rows="5" placeholder="Enter address" class="form-control"><?php echo @$user_model_data["user_address"]; ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">Personal Info</h3>
                                            </div>
                                            <div class="card-body ">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label"> First Name</label>
                                                            <input type="text" class="form-control" name="txtfirstname" placeholder="Enter first name" value="<?php echo @$user_model_data["user_first_name"]; ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label"> Last Name</label>
                                                            <input type="text" class="form-control" name="txtlastname" placeholder="Enter last name" value="<?php echo @$user_model_data["user_last_name"]; ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label"> Email Address</label>
                                                            <input type="email" class="form-control" name="txtemailaddress" placeholder="Enter email address" value="<?php echo @$user_model_data["user_email_address"]; ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label"> Phone Number</label>
                                                            <input type="text" class="form-control" name="txtphonenumber" placeholder="Enter phone number" value="<?php echo @$user_model_data["user_mobile_number"]; ?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-5">
                                                    <div class="col-md-12">
                                                        <h3 class="card-title">Company Info</h3>
                                                        <hr>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="form-label"> Alternative Mobile Number</label>
                                                            <input type="text" class="form-control" name="txtalternativemobilenumber" placeholder="Enter number" value="<?php echo @$user_model_data["user_alternative_mobile_number"]; ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="form-label"> Wallet Cap</label>
                                                            <input type="text" class="form-control" name="txtwalletcap" placeholder="Enter wallet cap" value="<?php echo @$user_model_data["user_wallet_cap"]; ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="form-label"> Company Name</label>
                                                            <input type="text" class="form-control" name="txtcompanyname" placeholder="Enter company name" value="<?php echo @$user_model_data["user_company_name"]; ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="form-label"> Pancard Number</label>
                                                            <input type="text" class="form-control" name="txtpancardnumber" placeholder="Enter pancard" value="<?php echo @$user_model_data["user_pan_card"]; ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="form-label"> Aadhaar Number</label>
                                                            <input type="text" class="form-control" name="txtaadharnumber" placeholder="Enter aadhar number" value="<?php echo @$user_model_data["user_aadhar_card"]; ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="form-label"> GST Number</label>
                                                            <input type="text" class="form-control" name="txtgstnumber" placeholder="Enter gst number" value="<?php echo @$user_model_data["user_gst_number"]; ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="form-label"> Rights</label>
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <label class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" name="txtuserrights[]" value="Payment Transfer" <?php if( in_array("Payment Transfer",$user_rights) ){ echo "checked"; } ?>>
                                                                        <span class="custom-control-label">Payment Transfer</span>
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" name="txtuserrights[]" value="Payment Revert" <?php if( in_array("Payment Revert",$user_rights) ){ echo "checked"; } ?>>
                                                                        <span class="custom-control-label">Payment Revert</span>
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" name="txtuserrights[]" value="Referral Status" <?php if( in_array("Referral Status",$user_rights) ){ echo "checked"; } ?>>
                                                                        <span class="custom-control-label">Referral Status</span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label class="form-label"> Referral By</label>
                                                            <input type="text" class="form-control" name="txtreferralby" placeholder="Enter referral by mobilenumber" value="<?php echo @$user_model_data["user_referral_by"]; ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="form-label"> User Status</label>
                                                            <select class="form-control txtstatus" name="txtstatus" required>
                                                                <option value="">Select Status</option>
                                                                <option value="1" <?php if(@$user_model_data["user_status"] == "1"){ echo "selected"; } ?>>Active</option>
                                                                <option value="2" <?php if(@$user_model_data["user_status"] == "2"){ echo "selected"; } ?>>Delete</option>
                                                                <option value="0" <?php if(@$user_model_data["user_status"] == "0"){ echo "selected"; } ?>>Deactive</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer ">
                                                <div class="btn-list text-end">
                                                    <a href="<?php echo base_url("/user/list"); ?>" class="btn btn-danger">Cancel</a>
                                                    <input type="submit" name="btnsubmitupdateuser" class="btn btn-primary btnsubmitupdateuser" value="Update" />
                                                    <input type="hidden" name="action_type" value="act_update_user_data">
                                                    <input type="hidden" name="update_user_id" value="<?php echo @$user_model_data["user_id"]; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>