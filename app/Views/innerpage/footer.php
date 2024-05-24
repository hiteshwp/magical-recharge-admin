</div>

            <!-- FOOTER -->
            <footer class="footer">
                <div class="container">
                    <div class="row align-items-center flex-row-reverse">
                        <div class="col-md-12 col-sm-12 text-center">
                            Copyright © <?php echo date("Y"); ?> <a href="javascript:void(0);"><?php echo SITE_TITLE; ?></a> | Designed & Developed by <a href="javascript:void(0);"> Hitesh Prajapati </a> | All rights reserved
                        </div>
                    </div>
                </div>
            </footer>
            <!-- FOOTER END -->
        </div>

        <!-- BACK-TO-TOP -->
        <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

        <!-- JQUERY JS -->
        <script src="<?php echo base_url("assets/js/jquery.min.js"); ?>"></script>

        <!-- BOOTSTRAP JS -->
        <script src="<?php echo base_url("assets/plugins/bootstrap/js/popper.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/bootstrap/js/bootstrap.min.js"); ?>"></script>

        <!-- SPARKLINE JS-->
        <script src="<?php echo base_url("assets/js/jquery.sparkline.min.js"); ?>"></script>

        <!-- CHART-CIRCLE JS-->
        <script src="<?php echo base_url("assets/js/circle-progress.min.js"); ?>"></script>

        <!-- CHARTJS CHART JS-->
        <script src="<?php echo base_url("assets/plugins/chart/Chart.bundle.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/chart/utils.js"); ?>"></script>

        <!-- BOOTSTRAP-DATERANGEPICKER JS -->
		<script src="<?php echo base_url("assets/plugins/bootstrap-daterangepicker/moment.min.js"); ?>"></script>
		<script src="<?php echo base_url("assets/plugins/bootstrap-daterangepicker/daterangepicker.js"); ?>"></script>

		<!-- INTERNAL Bootstrap-Datepicker js-->
		<script src="<?php echo base_url("assets/plugins/bootstrap-datepicker/bootstrap-datepicker.js"); ?>"></script>

        <!-- TIMEPICKER JS -->
		<script src="<?php echo base_url("assets/plugins/time-picker/jquery.timepicker.js"); ?>"></script>
		<script src="<?php echo base_url("assets/plugins/time-picker/toggles.min.js"); ?>"></script>

        <script src="<?php echo base_url("assets/plugins/date-picker/date-picker.js"); ?>"></script>
		<script src="<?php echo base_url("assets/plugins/date-picker/jquery-ui.js"); ?>"></script>

        <!-- PIETY CHART JS-->
        <script src="<?php echo base_url("assets/plugins/peitychart/jquery.peity.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/peitychart/peitychart.init.js"); ?>"></script>

        <!-- INTERNAL Data tables js-->
        <script src="<?php echo base_url("assets/plugins/datatable/js/jquery.dataTables.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/datatable/js/dataTables.bootstrap5.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/datatable/dataTables.responsive.min.js"); ?>"></script>

        <!-- ECHART JS-->
        <script src="<?php echo base_url("assets/plugins/echarts/echarts.js"); ?>"></script>

        <!-- SIDE-MENU JS-->
        <script src="<?php echo base_url("assets/plugins/sidemenu/sidemenu.js"); ?>"></script>

        <!-- Sticky js -->
        <script src="<?php echo base_url("assets/js/sticky.js"); ?>"></script>

        <!-- DATA TABLE JS-->
		<script src="<?php echo base_url("assets/plugins/datatable/js/jquery.dataTables.min.js"); ?>"></script>
		<script src="<?php echo base_url("assets/plugins/datatable/js/dataTables.bootstrap5.js"); ?>"></script>
		<script src="<?php echo base_url("assets/plugins/datatable/js/dataTables.buttons.min.js"); ?>"></script>
		<script src="<?php echo base_url("assets/plugins/datatable/js/buttons.bootstrap5.min.js"); ?>"></script>
		<script src="<?php echo base_url("assets/plugins/datatable/js/jszip.min.js"); ?>"></script>
		<script src="<?php echo base_url("assets/plugins/datatable/pdfmake/pdfmake.min.js"); ?>"></script>
		<script src="<?php echo base_url("assets/plugins/datatable/pdfmake/vfs_fonts.js"); ?>"></script>
		<script src="<?php echo base_url("assets/plugins/datatable/js/buttons.html5.min.js"); ?>"></script>
		<script src="<?php echo base_url("assets/plugins/datatable/js/buttons.print.min.js"); ?>"></script>
		<script src="<?php echo base_url("assets/plugins/datatable/js/buttons.colVis.min.js"); ?>"></script>
		<script src="<?php echo base_url("assets/plugins/datatable/dataTables.responsive.min.js"); ?>"></script>
		<script src="<?php echo base_url("assets/plugins/datatable/responsive.bootstrap5.min.js"); ?>"></script>
		<script src="<?php echo base_url("assets/js/table-data.js"); ?>"></script>

        <!-- SWEET-ALERT JS -->
		<script src="<?php echo base_url("assets/plugins/sweet-alert/sweetalert.min.js"); ?>"></script>
		<script src="<?php echo base_url("assets/js/sweet-alert.js"); ?>"></script>

        <!-- SIDEBAR JS -->
        <script src="<?php echo base_url("assets/plugins/sidebar/sidebar.js"); ?>"></script>

        <!-- APEXCHART JS -->
        <script src="<?php echo base_url("assets/js/apexcharts.js"); ?>"></script>

        <!-- NOTIFY JS -->
        <script src="<?php echo base_url("assets/plugins/notify/js/notifIt.js"); ?>"></script>

        <!-- INDEX JS -->
        <script src="<?php echo base_url("assets/js/index1.js"); ?>"></script>

		<script src="<?php echo base_url("assets/js/form-elements.js"); ?>"></script>

        <!-- CUSTOM JS -->
        <script src="<?php echo base_url("assets/js/custom.js"); ?>"></script>

        <!-- PARSLEY JS -->
        <script src="<?php echo base_url("assets/js/parsley.js"); ?>"></script>

        <!-- AJAX JS -->
        <script src="<?php echo base_url("assets/js/ajax.js"); ?>"></script>

        <?php if(session()->getFlashdata('login-success')):?>
         <script type="text/javascript">
             $(document).ready(function() {
               let msg = "<?php echo session()->getFlashdata('login-success') ?>";
               notif({
                    msg: "<b>Whoa! </b> "+msg,
                    type: "success"
                });
             });
         </script>
     <?php endif;?>
    </body>

</html>