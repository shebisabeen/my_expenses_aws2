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
                        <h3 class="table-title">Dashboard</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body box-min-height">
                        <div class="row gap15">
                            <div class="col-md-3">
                                <div class="dashboard-card cornflowerblue">
                                    <div class="label-head">
                                        <h4>Today</h4>
                                    </div>
                                    <div class="label-value">
                                        ₹ <?php echo $dashboardCounts['todaysTotal'];
                                            ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="dashboard-card cadetblue">
                                    <div class="label-head">
                                        <h4>Last 7 Days</h4>
                                    </div>
                                    <div class="label-value">
                                        ₹ <?php echo $dashboardCounts['sevenDaysTotal'];
                                            ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="dashboard-card coral">
                                    <div class="label-head">
                                        <h4>This Month</h4>
                                    </div>
                                    <div class="label-value">
                                        ₹ <?php echo $dashboardCounts['currentMonthTotal'];
                                            ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="dashboard-card hotpink">
                                    <div class="label-head">
                                        <h4>Last Month</h4>
                                    </div>
                                    <div class="label-value">
                                        ₹ <?php echo $dashboardCounts['previousMonthTotal'];
                                            ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="table-title">Current Month Totals</h3>
                                <!-- /.box-header -->
                                <table id="typesDataTable" class="table table-bordered table-striped custom-table">
                                    <thead>
                                        <tr>
                                            <th>Type</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($currentMonthlyTypes as $rowc) {
                                        ?>

                                            <tr>
                                                <td>
                                                    <?php
                                                    echo $rowc['type'];
                                                    ?></td>
                                                <td>
                                                    <?php
                                                    echo round($rowc['amount'], 2);
                                                    ?></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <h3 class="table-title">List 6 Months Totals</h3>
                                <!-- /.box-header -->
                                <table id="typesDataTable" class="table table-bordered table-striped custom-table">
                                    <thead>
                                        <tr>
                                            <th>Month</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($LastFewMonths as $rowc) {
                                        ?>

                                            <tr>
                                                <td>
                                                    <?php
                                                    echo $rowc['Month'] . " " . $rowc['Year'];
                                                    ?></td>
                                                <td>
                                                    <?php
                                                    echo round($rowc['amount'], 2);
                                                    ?></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
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
                    startDate: new Date(),
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