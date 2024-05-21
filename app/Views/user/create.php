<div class="main-content app-content mt-0">
    <div class="side-app">
        <div class="main-container container-fluid">
            <form  method="post"></form>
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
                                                            <select class="form-control select2-show-search form-select" data-placeholder="Choose one">
                                                                <option label="Choose one"></option>
                                                                <option value="1">Admin</option>
                                                                <option value="2">Master Distributor</option>
                                                                <option value="3">Distributor</option>
                                                                <option value="4">Retailer</option>
                                                                <option value="5">Staff</option>
                                                                <option value="6">APIUser</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="form-label"> Shop Name</label>
                                                            <input type="text" class="form-control" name="txtshopname" placeholder="Enter shop name" required>
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
                                                            <select class="form-control select2-show-search form-select" data-placeholder="Select Country" name="txtcountry">
                                                                <option label="Select Country"></option>
                                                                <option value="1">Admin</option>
                                                                <option value="2">Master Distributor</option>
                                                                <option value="3">Distributor</option>
                                                                <option value="4">Retailer</option>
                                                                <option value="5">Staff</option>
                                                                <option value="6">APIUser</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label"> State</label>
                                                            <select class="form-control select2-show-search form-select" data-placeholder="Select State" name="txtstate">
                                                                <option label="Select State"></option>
                                                                <option value="1">Admin</option>
                                                                <option value="2">Master Distributor</option>
                                                                <option value="3">Distributor</option>
                                                                <option value="4">Retailer</option>
                                                                <option value="5">Staff</option>
                                                                <option value="6">APIUser</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label"> City</label>
                                                            <select class="form-control select2-show-search form-select" data-placeholder="Select City" name="txtcity">
                                                                <option label="Select City"></option>
                                                                <option value="1">Admin</option>
                                                                <option value="2">Master Distributor</option>
                                                                <option value="3">Distributor</option>
                                                                <option value="4">Retailer</option>
                                                                <option value="5">Staff</option>
                                                                <option value="6">APIUser</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label"> Pincode</label>
                                                            <input type="text" class="form-control" id="txtpincode" name="txtpincode" placeholder="Enter pincode" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="form-label"> Address</label>
                                                            <textarea name="txtaddress" id="txtaddress" rows="5" placeholder="Enter address" class="form-control"></textarea>
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
                                                            <input type="text" class="form-control" name="txtfirstname" placeholder="Enter first name" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label"> Last Name</label>
                                                            <input type="text" class="form-control" name="txtlastname" placeholder="Enter last name" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label"> Email Address</label>
                                                            <input type="email" class="form-control" name="txtemailaddress" placeholder="Enter email address" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label"> Phone Number</label>
                                                            <input type="text" class="form-control" name="txtphonenumber" placeholder="Enter phone number" required>
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
                                                            <input type="text" class="form-control" name="txtalternativemobilenumber" placeholder="Enter number" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="form-label"> Wallet Cap</label>
                                                            <input type="text" class="form-control" name="txtwalletcap" placeholder="Enter wallet cap" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="form-label"> Company Name</label>
                                                            <input type="text" class="form-control" name="txtcompanyname" placeholder="Enter company name" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="form-label"> Pancard Number</label>
                                                            <input type="text" class="form-control" name="txtpancardnumber" placeholder="Enter pancard" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="form-label"> Aadhaar Number</label>
                                                            <input type="text" class="form-control" name="txtaadharnumber" placeholder="Enter aadhar number" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="form-label"> GST Number</label>
                                                            <input type="text" class="form-control" name="txtgstnumber" placeholder="Enter gst number" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="form-label"> Rights</label>
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <label class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" name="txtuserrights" value="Payment Transfer">
                                                                        <span class="custom-control-label">Payment Transfer</span>
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" name="txtuserrights" value="Payment Revert">
                                                                        <span class="custom-control-label">Payment Revert</span>
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" name="txtuserrights" value="Referral Status">
                                                                        <span class="custom-control-label">Referral Status</span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="form-label"> Referral By</label>
                                                            <input type="text" class="form-control" name="txtreferralby" placeholder="Enter referral by mobilenumber" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer ">
                                                <div class="btn-list text-end">
                                                    <a href="javascript:void(0);" class="btn btn-danger">Cancel</a>
                                                    <a href="javascript:void(0);" class="btn btn-primary">Save changes</a>
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