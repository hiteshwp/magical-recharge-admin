<div class="main-content app-content mt-0">
    <div class="side-app">
        <div class="main-container container-fluid">
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
								<div class="col-xl-4 col-md-12 col-sm-12">
									<div class="card">
										<div class="card-header">
											<div class="card-title">Edit profile and password details</div>
										</div>
										<div class="card-body">
											<div class="d-flex mb-3">
												<img alt="User Avatar" class="rounded-circle avatar-lg me-2" src="<?php echo base_url("assets/images/users/8.jpg"); ?>">
                                                <input type="file" class="form-control" name="userprofileimageupload">
											</div>
											<div class="form-group">
												<label class="form-label">New Password</label>
												<input type="password" class="form-control" value="password">
											</div>
											<div class="form-group">
												<label class="form-label">Confirm Password</label>
												<input type="password" class="form-control" value="password">
											</div>
										</div>
										<div class="card-footer text-end">
											<a href="javascript:void(0);" class="btn btn-primary">Update</a>
											<a href="javascript:void(0);" class="btn btn-danger">Cancel</a>
										</div>
									</div>
								</div>
								<div class="col-xl-8 col-md-12 col-sm-12">
									<div class="card">
										<div class="card-header">
											<h3 class="card-title">Edit profile details</h3>
										</div>
										<div class="card-body">
											<div class="row">
												<div class="col-lg-6 col-md-6">
													<div class="form-group">
														<label for="txtfullname">Full Name</label>
														<input type="text" class="form-control" name="txtfullname" id="txtfullname" placeholder="Enter Full Name">
													</div>
												</div>
                                                <div class="col-lg-6 col-md-6">
													<div class="form-group">
														<label for="txtmobilenumber">Mobile Number</label>
														<input type="text" class="form-control" name="txtmobilenumber" id="txtmobilenumber" readonly>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="form-label">User Bio</label>
												<textarea class="form-control" name="txtuserbio" id="txtuserbio" rows="4" placeholder="Enter details"></textarea>
											</div>											
										</div>
										<div class="card-footer text-end">
											<a href="javascript:void(0);" class="btn btn-primary mt-1">Update</a>
											<a href="javascript:void(0);" class="btn btn-danger mt-1">Cancel</a>
										</div>
									</div>
								</div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>