<!DOCTYPE html>
<html>
<?php $this->load->view('layout/head'); ?>

<body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">



        <!-- =============================================== -->
        <?php $this->load->view('layout/header'); ?>
        <?php $this->load->view('layout/sidebar'); ?>

        <!-- =============================================== -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper custom-content-wapper">
            <!-- Content Header (Page header) -->

            <!-- Main content -->
            <section class="content">


                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Vehicle Details</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-8">

                                <div class="box-body">
                                    <div class="form-group">
                                        <label class="col-md-3 viewLabel">Number:</label>
                                        <label class="col-md-3"><?php echo $vehicleData['number']; ?></label>
                                    </div>
                                    <label class="col-md-3 viewLabel">Type:</label>
                                    <label class="col-md-3"><?php echo $vehicleData['type']; ?></label>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="col-md-5 viewLabel">District:</label>
                                            <label class="col-md-5"><?php echo $vehicleData['district']; ?></label>

                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="col-md-5 viewLabel">Station:</label>
                                            <label class="col-md-5"><?php echo $vehicleData['stationName']; ?></label>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="col-md-5 viewLabel">Company:</label>
                                            <label class="col-md-5"><?php echo $vehicleData['company']; ?></label>

                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="col-md-5 viewLabel">Model:</label>
                                            <label class="col-md-5"><?php echo $vehicleData['model']; ?></label>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 viewLabel">Colour:</label>
                                        <label class="col-md-3"><?php echo $vehicleData['colour']; ?></label>

                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 viewLabel">Case No:</label>
                                        <label class="col-md-3"><?php echo $vehicleData['case_no']; ?></label>

                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 viewLabel">Owner:</label>
                                        <label class="col-md-3"><?php echo $vehicleData['owner']; ?></label>

                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 viewLabel">Case Description:</label>
                                        <label class="col-md-3"><?php echo $vehicleData['case_description']; ?></label>

                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 viewLabel">Missing Date:</label>
                                        <label class="col-md-3"><?php echo $vehicleData['missing_date']; ?></label>

                                    </div>
                                    <label class="col-md-3 viewLabel">Status:</label>
                                    <label class="col-md-3"><?php echo $vehicleData['status']; ?></label>

                                </div>
                                <!-- /.col -->

                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.box-body -->

                    </div>
                    <!-- /.box -->
            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->

        <!-- jQuery 3 -->
        <script src="<?php echo base_url(); ?>assets/dashboard/bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap 3.3.5 -->
        <script src="<?php echo base_url(); ?>assets/dashboard/bootstrap/js/bootstrap.min.js"></script>
        <!-- DataTables -->
        <script src="<?php echo base_url(); ?>assets/dashboard/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/dashboard/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
        <!-- datepicker -->
        <script src="<?php echo base_url(); ?>assets/dashboard/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
        <!-- Slimscroll -->
        <script src="<?php echo base_url(); ?>assets/dashboard/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="<?php echo base_url(); ?>assets/dashboard/bower_components/fastclick/lib/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url(); ?>assets/dashboard/dist/js/app.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo base_url(); ?>assets/dashboard/dist/js/demo.js"></script>

        <script>
            $(function() {
                $('#example1').DataTable()
                $('#example2').DataTable({
                    'paging': true,
                    'lengthChange': false,
                    'searching': false,
                    'ordering': true,
                    'info': true,
                    'autoWidth': false
                })
            })
        </script>
        <script>
            $(function() {

                //Date picker
                $('#datepicker').datepicker({
                    autoclose: true,
                    endDate: new Date(),
                    format: 'yyyy-mm-dd'
                })
                $('#datepickerbegin').datepicker({
                    autoclose: true,
                    startDate: new Date(),
                    format: 'yyyy-mm-dd'
                })

            })
        </script>
</body>

</html>