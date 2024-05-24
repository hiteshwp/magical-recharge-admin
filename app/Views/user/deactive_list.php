<!--app-content open-->
<div class="main-content app-content mt-0">
    <div class="side-app">
        <div class="main-container container-fluid">
            <div class="row row-sm">
                <div class="col-lg-12 mt-3">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="page-title"><?php echo $title; ?></h1>
                        </div>
                        <div class="card-status bg-blue br-tr-7 br-tl-7"></div>
                        <div class="card-body">
                            <div class="table-responsive export-table">
                                <table id="deactive_user-datatable-list" class="table table-bordered text-nowrap key-buttons border-bottom  w-100" data-tn="<?php echo csrf_token(); ?>" data-tnv="<?php echo csrf_hash(); ?>">
                                    <thead>
                                        <tr>
                                            <th class="border-bottom-0">#ID</th>
                                            <th class="border-bottom-0">User Type</th>
                                            <th class="border-bottom-0">Shop Name</th>
                                            <th class="border-bottom-0">First Name</th>
                                            <th class="border-bottom-0">Last Name</th>
                                            <th class="border-bottom-0">Email Address</th>
                                            <th class="border-bottom-0">Mobile Number</th>
                                            <th class="border-bottom-0">Status</th>
                                            <th class="border-bottom-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Row -->

        </div>
    </div>
</div>
<!-- CONTAINER CLOSED -->