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
        <div class="content-wrapper custom-content-wapper ">
            <!-- Content Header (Page header) -->

            <!-- Main content -->
            <section class="content">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Users List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped custom-table">
                            <thead>
                                <tr>
                                    <th>Sl No</th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // $usersList = [];
                                $i = 0;
                                foreach ($usersList as $rowc) {
                                    $i++;
                                ?>

                                    <tr>
                                        <td>
                                            <?php
                                            echo $i;
                                            ?></td>
                                        <td>
                                            <?php
                                            echo $rowc['name'];
                                            ?></td>
                                        <td>
                                            <?php
                                            echo $rowc['username'];
                                            ?></td>
                                        <td>
                                            <?php
                                            echo $rowc['email'];
                                            ?></td>

                                        <td>
                                            <form method="post" action="<?php echo base_url(); ?>users/editUser">
                                                <input type="hidden" id="userid" name="userid" value="<?php
                                                                                                        echo $rowc['id'];
                                                                                                        ?>">
                                                <button type="submit" class="btn btn-block btn-success" style="width: 100%;">Edit</button>
                                            </form>

                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>

                            </tbody>
                            <tfoot>
                                <button onclick="location.href ='<?php echo base_url(); ?>users/addUser';" class="btn btn-block btn-success custom-button-add">Add</button>
                            </tfoot>
                        </table>
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
        <script type="text/javascript">
            $(document).ready(function() {
                var table = $('#example1').DataTable({
                    columnDefs: [{
                        targets: [0, 1, 2],
                        className: 'mdl-data-table__cell--non-numeric'
                    }]
                });

                $(table.table().container()).removeClass('form-inline');

            });
        </script>
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