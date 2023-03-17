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
                        <h3 class="box-title">Add Expense</h3>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-8">
                                <form method="post" action="<?php echo base_url(); ?>expenses/createExpense" enctype='multipart/form-data'>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label>Title:</label>
                                            <input type="text" class="form-control" name="title" required>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label>Type:</label>
                                                <select id="type" name="type" list="type" placeholder="type" class="select-selected" required>
                                                    <option value="" disabled selected>Select Type</option>
                                                    <?php foreach ($typesList as $key => $value) { ?>
                                                        <option value="<?php echo $value['name']; ?>"><?php echo $value['name']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Amount:</label>
                                            <input type="number" step="0.01" class="form-control" name="amount" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Spent Date:</label>
                                            <input id="datepicker" type="text" class="form-control" name="spent_date" required>
                                        </div>
                                        <div class="box-footer">
                                            <button type="submit" class="btn btn-block btn-success custom-button-submit">Submit</button>
                                        </div>
                                </form>

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