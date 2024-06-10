<div class="main-content app-content mt-0">
    <div class="side-app">
        <div class="main-container container-fluid">
            <form  method="post" method="post" id="frmstoreuserdata"  data-tn="<?php echo csrf_token(); ?>" data-tnv="<?php echo csrf_hash(); ?>">
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
                                                        echo '<option value="'.$key.'">'.$value.'</option>';
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label class="form-label"> User Full Name</label>
                                            <input type="text" class="form-control" name="txtuserfullname" placeholder="Enter user full name" required data-parsley-required-message="User Full Name field is required">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label"> Phone Number</label>
                                            <input type="text" class="form-control" name="txtphonenumber" placeholder="Enter phone number" data-parsley-required-message="Phone Number field is required" data-parsley-type="digits" data-parsley-type-message="Contact Number should be in digits" data-parsley-minlength="10" data-parsley-maxlength="10" data-parsley-minlength-message="Contact Number should be in 10 digits" data-parsley-maxlength-message="Contact Number should be in 10 digits" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label"> Referral By</label>
                                            <input type="text" class="form-control" name="txtreferralby" placeholder="Enter referral by mobilenumber" required data-parsley-required-message="User Referral By field is required">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label"> User Status</label>
                                            <select class="form-control txtstatus" name="txtstatus" required data-parsley-required-message="User Status field is required">
                                                <option value="">Select Status</option>
                                                <option value="4" <?php if(@$user_model_data["user_status"] == "4"){ echo "selected"; } ?> selected>Active</option>
                                                <option value="2" <?php if(@$user_model_data["user_status"] == "0"){ echo "selected"; } ?>>Delete</option>
                                                <option value="0" <?php if(@$user_model_data["user_status"] == "5"){ echo "selected"; } ?>>Deactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <div class="btn-list text-end">
                                    <a href="<?php echo base_url("/user/list"); ?>" class="btn btn-danger">Cancel</a>
                                    <input type="submit" name="btnsubmitcreateuser" class="btn btn-primary btnsubmitcreateuser" value="Save" />
                                    <input type="hidden" name="action_type" value="act_store_user_data">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>