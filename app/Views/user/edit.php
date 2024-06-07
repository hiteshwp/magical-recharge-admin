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
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label"> Select User Type</label>
                                            <select class="form-control" name="txtusertype" required data-parsley-required-message="User Type field is required">
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
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label class="form-label"> User Full Name</label>
                                            <input type="text" class="form-control" name="txtuserfullname" placeholder="Enter user full name" required value="<?php echo @$user_model_data["user_full_name"]; ?>" data-parsley-required-message="User Full Name field is required">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label"> Phone Number</label>
                                            <input type="text" class="form-control" name="txtphonenumber" placeholder="Enter phone number" required value="<?php echo @$user_model_data["user_mobile_number"]; ?>"  data-parsley-required-message="Phone Number field is required" data-parsley-type="digits" data-parsley-type-message="Contact Number should be in digits" data-parsley-minlength="10" data-parsley-maxlength="10" data-parsley-minlength-message="Contact Number should be in 10 digits" data-parsley-maxlength-message="Contact Number should be in 10 digits">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label"> Referral By</label>
                                            <input type="text" class="form-control" name="txtreferralby" placeholder="Enter referral by" required value="<?php echo @$user_model_data["user_referral_by"]; ?>" data-parsley-required-message="Referral By field is required">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label"> User Status</label>
                                            <select class="form-control txtstatus" name="txtstatus" required data-parsley-required-message="User Status field is required">
                                                <option value="">Select Status</option>
                                                <option value="4" <?php if(@$user_model_data["user_status"] == "1"){ echo "selected"; } ?> selected>Active</option>
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
            </form>
        </div>
    </div>
</div>