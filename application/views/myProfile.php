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
                        <h3 class="box-title">My Profile</h3>


                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-8">
                                <form method="post" action="<?php echo base_url(); ?>users/updateMyProfile" enctype='multipart/form-data'>
                                    <div class="box-body">
                                        <input type="hidden" id="userId" name="userId" value="<?php
                                                                                                echo $userData['id'];
                                                                                                ?>">
                                        <div class="form-group">
                                            <label>Name:</label>
                                            <input type="text" class="form-control" name="name" value="<?php
                                                                                                        echo $userData['name'];
                                                                                                        ?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Email:</label>
                                            <input type="email" class="form-control" name="email" value="<?php
                                                                                                            echo $userData['email'];
                                                                                                            ?>" required>
                                        </div>

                                        <div class="box-footer">
                                            <button type="submit" class="btn btn-block btn-success custom-button-submit">Submit</button>
                                        </div>
                                </form>
                                <hr>
                                <div style="display:inline-block; text-align:center;">
                                    <form method="post" action="<?php echo base_url();
                                                                ?>users/changePassword">

                                        <input type="hidden" id="userId" name="userId" value="<?php
                                                                                                echo $userData['id'];
                                                                                                ?>">
                                        <div class="form-group">
                                            <label>New Password:</label>
                                            <input type="text" class="form-control" name="password" required>
                                        </div>
                                        <button type="submit" class="btn btn-block btn-info">Reset Password</button>
                                    </form>
                                </div>

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