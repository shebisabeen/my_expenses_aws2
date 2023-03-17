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
                        <h3 class="box-title">Edit User</h3>


                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-8">
                                <form method="post" action="<?php echo base_url(); ?>users/updateUser" enctype='multipart/form-data'>
                                    <div class="box-body">
                                        <input type="hidden" id="userId" name="userId" value="<?php
                                                                                                echo $userData['id'];
                                                                                                ?>">
                                        <input type="hidden" id="currentDistrict" name="currentDistrict" value="<?php
                                                                                                                echo $userData['district'];
                                                                                                                ?>">
                                        <input type="hidden" id="stationId" name="stationId" value="<?php
                                                                                                    echo $userData['station'];
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
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label>District:</label>
                                                <select id="district" name="district" list="district" placeholder="district" class="select-selected">
                                                    <option value="">Select District</option>
                                                    <?php foreach ($districtsList as $key => $value) { ?>
                                                        <option value="<?php echo $value['district']; ?>" <?php if ($value['district'] == $userData['district']) {
                                                                                                                echo "selected";
                                                                                                            } ?>><?php echo $value['district']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Station:</label>
                                                <select id="station" name="station" list="station" placeholder="station" class="select-selected">
                                                    <option value="">Select Station</option>
                                                </select>
                                            </div>
                                        </div>
                                        <label>Role:</label>
                                        <div class="form-group">
                                            <select name="role" list="role" placeholder="role" class="select-selected">
                                                <option value="admin" <?php if ($userData['role'] == "admin") {
                                                                            echo "selected";
                                                                        } ?>>Admin</option>
                                                <option value="editor" <?php if ($userData['role'] == "editor") {
                                                                            echo "selected";
                                                                        } ?>>Editor</option>
                                                <option value="guest" <?php if ($userData['role'] == "guest") {
                                                                            echo "selected";
                                                                        } ?>>Guest</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Is Active</label>
                                            <input class="left10" type="checkbox" name="isactive" value="yes" <?php if ($userData['is_active'] == 1) {
                                                                                                                    echo "checked";
                                                                                                                } ?>>
                                        </div>

                                        <div class="box-footer">
                                            <button type="submit" class="btn btn-block btn-success custom-button-submit">Submit</button>
                                        </div>
                                </form>
                                <div style="display:inline-block; text-align:center;">
                                    <form method="post" action="<?php echo base_url();
                                                                ?>users/changePassword">

                                        <input type="hidden" id="userId" name="userId" value="<?php
                                                                                                echo $userData['id'];
                                                                                                ?>">
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
        <script type='text/javascript'>
            // baseURL variable
            var baseURL = "<?php echo base_url(); ?>";

            $(document).ready(function() {


                var districtName = $("#currentDistrict").val();
                var stationid = $("#stationId").val();
                $.ajax({
                    url: '<?= base_url() ?>stations/getStationsByDistrict',
                    method: 'post',
                    data: {
                        district: districtName
                    },
                    dataType: 'json',
                    success: function(response) {
                        // Remove options 
                        $('#station').find('option').not(':first').remove();

                        // Add options
                        $.each(response, function(index, data) {
                            if (data['id'] === stationid) {
                                $('#station').append('<option value="' + data['id'] + '" selected>' + data['name'] + '</option>');
                            } else {
                                $('#station').append('<option value="' + data['id'] + '">' + data['name'] + '</option>');
                            }
                        });
                    }
                });

                // City change
                $('#district').change(function() {
                    var district = $(this).val();

                    // AJAX request
                    $.ajax({
                        url: '<?= base_url() ?>stations/getStationsByDistrict',
                        method: 'post',
                        data: {
                            district: district
                        },
                        dataType: 'json',
                        success: function(response) {
                            // Remove options 
                            $('#station').find('option').not(':first').remove();

                            // Add options
                            $.each(response, function(index, data) {
                                $('#station').append('<option value="' + data['id'] + '">' + data['name'] + '</option>');
                            });
                        }
                    });
                });

            });
        </script>
</body>

</html>