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
                        <h3 class="box-title">Expenses List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped custom-table">
                            <thead>
                                <tr>
                                    <th>Sl No</th>
                                    <th>Title</th>
                                    <th>Type</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                // $vehiclesList = [];
                                foreach ($expensesList as $rowc) {
                                    $i++;

                                ?>

                                    <tr>
                                        <td>
                                            <?php
                                            echo $i;
                                            ?></td>
                                        <td>
                                            <?php
                                            echo $rowc['title'];
                                            ?></td>
                                        <td>
                                            <?php
                                            echo  $rowc['type'];;
                                            ?></td>
                                        <td>
                                            <?php
                                            echo $rowc['amount'];
                                            ?></td>
                                        <td>
                                            <?php
                                            echo date('d-m-Y', strtotime($rowc['spent_date']));
                                            ?></td>
                                        <td>
                                            <div style="display:inline-block; width:45%;text-align:center;">
                                                <form method="post" action="<?php echo base_url(); ?>expenses/editExpense">
                                                    <input type="hidden" id="expenseId" name="expenseId" value="<?php
                                                                                                                echo $rowc['id'];
                                                                                                                ?>">
                                                    <button type="submit" class="btn btn-block btn-success">Edit</button>
                                                </form>
                                            </div>
                                            <div style="display:inline-block; width:45%;text-align:center;">
                                                <form method="post" action="<?php echo base_url();
                                                                            ?>expenses/viewExpense">

                                                    <input type="hidden" id="expenseId" name="expenseId" value="<?php
                                                                                                                echo $rowc['id'];
                                                                                                                ?>">
                                                    <button type="submit" class="btn btn-block btn-success">View</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>

                            </tbody>
                            <tfoot>
                                <?php if ($this->session->userdata('role') != "guest") { ?>
                                    <button onclick="location.href ='<?php echo base_url(); ?>expenses/addExpense';" class="btn btn-block btn-success custom-button-add">Add</button>
                                <?php  } ?>
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