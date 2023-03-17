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
                        <h3 class="box-title">Edit Vehicles</h3>

                        <form method="post" action="<?php echo base_url();
                                                    ?>vehicles/deleteVehicle">

                            <input type="hidden" id="vehicleid" name="vehicleid" value="<?php
                                                                                        echo $vehicleData['id'];
                                                                                        ?>">
                            <button type="submit" class="btn btn-block btn-danger custom-button-submit">Delete</button>
                        </form>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-8">
                                <form method="post" action="<?php echo base_url(); ?>vehicles/updateVehicle" enctype='multipart/form-data'>
                                    <div class="box-body">
                                        <input type="hidden" id="vehicleId" name="vehicleId" value="<?php
                                                                                                    echo $vehicleData['id'];
                                                                                                    ?>">
                                        <input type="hidden" id="currentDistrict" name="currentDistrict" value="<?php
                                                                                                                echo $vehicleData['district'];
                                                                                                                ?>">
                                        <input type="hidden" id="stationId" name="stationId" value="<?php
                                                                                                    echo $vehicleData['station'];
                                                                                                    ?>">

                                        <div class="form-group">
                                            <label>Number:</label>
                                            <input type="text" class="form-control" name="number" value="<?php echo $vehicleData['number']; ?>" disabled>
                                        </div>
                                        <label>Type:</label>
                                        <div class="form-group">
                                            <select name="type" list="type" placeholder="type" class="select-selected">
                                                <option value="2wheeler" <?php if ($vehicleData['type'] == "2wheeler") {
                                                                                echo "selected";
                                                                            } ?>>2 Wheeler</option>
                                                <option value="3wheeler" <?php if ($vehicleData['type'] == "3wheeler") {
                                                                                echo "selected";
                                                                            } ?>>3 Wheeler</option>
                                                <option value="4wheeler" <?php if ($vehicleData['type'] == "4wheeler") {
                                                                                echo "selected";
                                                                            } ?>>4 Wheeler</option>
                                                <option value="heavy" <?php if ($vehicleData['type'] == "heavy") {
                                                                            echo "selected";
                                                                        } ?>>Heavy Vehicle</option>
                                            </select>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label>District:</label>
                                                <select id="district" name="district" list="district" placeholder="district" class="select-selected">
                                                    <option value="">Select District</option>
                                                    <?php foreach ($districtsList as $key => $value) { ?>
                                                        <option value="<?php echo $value['district']; ?>" <?php if ($value['district'] == $vehicleData['district']) {
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
                                        <div class="form-group">
                                            <label>Company:</label>
                                            <input type="text" class="form-control" name="company" value="<?php echo $vehicleData['company']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Model:</label>
                                            <input type="text" class="form-control" name="model" value="<?php echo $vehicleData['model']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Colour:</label>
                                            <input type="text" class="form-control" name="colour" value="<?php echo $vehicleData['colour']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Case No:</label>
                                            <input type="text" class="form-control" name="case_no" value="<?php echo $vehicleData['case_no']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Owner:</label>
                                            <input type="text" class="form-control" name="owner" value="<?php echo $vehicleData['owner']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Case Description:</label>
                                            <textarea class="form-control" name="case_description" rows="10" cols="50"><?php echo $vehicleData['case_description']; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Missing Date:</label>
                                            <input id="datepicker" type="text" class="form-control" name="missing_date" value="<?php echo $vehicleData['missing_date']; ?>" required>
                                        </div>
                                        <label>Status:</label>
                                        <div class="form-group">
                                            <select name="status" list="status" placeholder="status" class="select-selected">
                                                <option value="missing" <?php if ($vehicleData['status'] == "missing") {
                                                                            echo "selected";
                                                                        } ?>>Missing</option>
                                                <option value="recovered" <?php if ($vehicleData['status'] == "recovered") {
                                                                                echo "selected";
                                                                            } ?>>Recovered</option>
                                            </select>
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