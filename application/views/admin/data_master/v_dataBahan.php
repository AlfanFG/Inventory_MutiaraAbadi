<?php
$this->load->view('parts/header');
?>

<body>
    <div id="app">
        <?php $this->load->view('parts/sidebar'); ?>
        <div id="main" class='layout-navbar'>
            <header class='mb-3'>
                <nav class="navbar navbar-expand navbar-light ">
                    <div class="container-fluid">
                        <a href="#" class="burger-btn d-block">
                            <i class="bi bi-justify fs-3"></i>
                        </a>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                <!-- <li class="nav-item dropdown me-1">
                                    <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class='bi bi-envelope bi-sub fs-4 text-gray-600'></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                        <li>
                                            <h6 class="dropdown-header">Mail</h6>
                                        </li>
                                        <li><a class="dropdown-item" href="#">No new mail</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown me-3">
                                    <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class='bi bi-bell bi-sub fs-4 text-gray-600'></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                        <li>
                                            <h6 class="dropdown-header">Notifications</h6>
                                        </li>
                                        <li><a class="dropdown-item">No notification available</a></li>
                                    </ul>
                                </li> -->
                            </ul>
                            <div class="dropdown">
                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="user-menu d-flex">
                                        <div class="user-name text-end me-3">
                                            <h6 class="mb-0 text-gray-600"><?php echo $this->session->userdata('Nama'); ?></h6>
                                            <p class="mb-0 text-sm text-gray-600"><?php echo $this->session->userdata('jabatan'); ?></p>
                                        </div>
                                        <div class="user-img d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img src="assets/images/faces/1.jpg">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <h6 class="dropdown-header">Hello, <?php echo $this->session->userdata('Nama'); ?>!</h6>
                                    </li>
                                    <!-- <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-person me-2"></i> My
                                            Profile</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-gear me-2"></i>
                                            Settings</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-wallet me-2"></i>
                                            Wallet</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li> -->
                                    <li><a class="dropdown-item" href="<?= base_url('Login/logout') ?>"><i class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>


            <div id="main-content" style="bottom: 30px !important; position: relative">
                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-6 order-md-1 order-last">
                                <h3>Data Bahan</h3>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?= base_url('Dashboard') ?>">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Data Bahan
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <section class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <!-- <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Data Pegawai </h6>
                                <a href="#" style="margin-left:900px" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="btn-tambah"><i class="fas fa-plus-square "></i> <span style="margin-left: 5px;">Tambah Pegawai</span></a>
                            </div> -->
                            <div class="card-body">
                                <a href="#" class="btn btn-primary shadow-sm" id="btn-tambah" style="width:200px !important; margin-left: 650px; position: relative; top:40px"><i class="fa fa-plus-square"></i> <span style="margin-left: 5px; ">Tambah Bahan</span></a>
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-bahan" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Kode Bahan</th>
                                                <th>Nama Bahan</th>
                                                <th>Banyak</th>
                                                <th>Harga</th>
                                                <th>Tools</th>

                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($bahan as $data) { ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $data['KodeBahan'] ?></td>
                                                    <td style="width: 300px;"><?php echo $data['NamaBahan'] ?></td>
                                                    <td><?php echo $data['banyak'] .' '. $data['satuan'] ?></td>
                                                    <td><?php echo $data['harga'] ?></td>
                                                    <td class="text-center">
                                                        <a href="javascript:void(0)" class="btn btn-warning btn-edit"><i class="fa fa-edit"></i></a>

                                                    </td>

                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <?php
            $id = $this->M_Bahan->getKodeBahan();
            ?>
            <!-- modal tambah -->
            <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="databarang" aria-hidden="true">
                <div class="modal-dialog modal-sm-4">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Form Tambah Bahan</h4>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" id="form-bahan">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Kode Bahan</label>
                                            <input type="text" name="kodeBahan" id="kodeBahan" value="<?php echo $id ?>" class="form-control" required>
                                            <div class="error"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Nama Bahan</label>
                                            <input type="text" name="namaBahan" id="namaBahan" class="form-control">
                                            <div class="error"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Harga / Yard</label>
                                            <input type="text" name="harga" id="harga" class="form-control">
                                            <div class="error" style="font-size: medium; width:500px"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Banyak</label>
                                            <input type="text" name="banyak" id="banyak" class="form-control">
                                            <div class="error" style="font-size: medium; width:500px"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Satuan</label>
                                            <select name="satuan" id="satuan" class="form-select">
                                                <option value="Yard">Yard</option>
                                                <option value="Lembar">Lembar</option>
                                                <option value="Meter">Meter</option>
                                                <option value="Meter">Potong</option>
                                            </select>
                                            <div class="error" style="font-size: medium; width:500px"></div>
                                        </div>
                                    </div>
                                </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-bs-dismiss="modal">Cancel</button>
                            <input type="submit" class="btn btn-success btn-ModalInsert" id="btn-save" name="tambah" value="Simpan">
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Main Content -->


        <?php
        $this->load->view('parts/footer');
        ?>
        <script>
            $(document).ready(function() {
                var status;
                $('#table-bahan').DataTable({
                    dom: 'Blfrtip',
                    buttons: [{
                            extend: 'copy',
                            className: 'btn btn-primary'
                        },
                        {
                            extend: 'excel',
                            className: 'btn btn-primary'
                        },
                        {
                            extend: 'csv',
                            className: 'btn btn-primary'
                        },
                        {
                            extend: 'pdf',
                            className: 'btn btn-primary'
                        },
                    ],

                });

                $('#btn-tambah').click(function() {
                    $('.error').html('');
                    $('#form-bahan')[0].reset();
                    // $('#img').html(`<input type="file" class="form-control" id="image" name="image" value="" placeholder="Add image">
                    // <?php echo form_error('image'); ?>`);
                    // // $('#insert_form')[0].reset();
                    $('#btn-save').val('Save');
                    $('#tambah').modal('show');
                });

                $('#form-bahan').on('submit', function(e) {
                    e.preventDefault();
                    $('#tambah').modal('hide');
                    Swal.fire({
                        title: "Apakah anda yakin?",
                        text: "Anda akan mengakses data yang dicari",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonClass: "btn-primary",
                        confirmButtonText: "Yes",
                        cancelButtonText: "No",
                        closeOnConfirm: false,
                        closeOnCancel: false
                    }).then(function() {




                        $('#tambah').modal('hide');


                        var fd;
                        var files;
                        var URL;
                        if ($('#btn-save').val() == 'Save') {
                            URL = "<?php echo site_url('Bahan/addBahan'); ?>";

                        } else {
                            var id = $('#kodeBahan').val();
                            URL = "<?php echo site_url() ?>Bahan/editBahan/" + id;
                        }

                        Swal.fire({
                            title: 'Sedang Proses',
                            text: 'Tunggu Sebentar',
                            timer: 2000,
                            showConfirmButton: false,
                            onOpen: () => {
                                Swal.showLoading()
                            }
                        }).then(
                            function() {
                                $.ajax({
                                    ///nambah url
                                    url: URL,
                                    method: "POST",
                                    data: $('#form-bahan').serializeArray(),
                                    success: function(data) {

                                        var status = false;
                                        if (data.status == 'invalid') {

                                            $.each(data, function(key, value) {
                                                //alert(value);
                                                $('#' + key).parents('.form-group').find('.error').html(value);

                                            });
                                            fstatus = '';
                                            Swal.fire({
                                                title: "Failed",
                                                text: "Data gagal dimasukan!",
                                                type: "error",
                                                confirmButtonClass: "btn-primary",
                                                confirmButtonText: "Oke",
                                                closeOnConfirm: true
                                            }).then(function() {
                                                $('#tambah').modal('show');
                                            })
                                        } else {

                                            Swal.fire({
                                                title: "Success",
                                                text: "Data berhasil dimasukan!",
                                                type: "success",
                                                confirmButtonClass: "btn-primary",
                                                confirmButtonText: "Oke",
                                                closeOnConfirm: true
                                            }).then(function() {
                                                location.reload();
                                            })

                                        }
                                    }
                                });

                            },
                            // handling the promise rejection
                            function(dismiss) {
                                if (dismiss === 'timer') {
                                    console.log('I was closed by the timer')
                                }
                            }
                        )
                    }, function(dismiss) {
                        if (dismiss === 'cancel') {
                            swal(
                                'Cancelled',
                                '',
                                'error'
                            )
                        }
                    });
                });

                $("#table-bahan").on('click', '.btn-edit', function() {
                    // get the current row
                    $('.error').html('');
                    fstatus = 'update';
                    $('#btn-save').val('Update');
                    var currentRow = $(this).closest("tr");
                    var kodeBahan = currentRow.find("td:eq(1)").text(); // get current row 2nd TD
                    var namaBahan = currentRow.find("td:eq(2)").text();
                    var satuan = currentRow.find("td:eq(3)").text();
                    var harga = currentRow.find("td:eq(4)").text();
                    var banyak = currentRow.find("td:eq(5)").text();

                    $('#tambah').modal('show');
                    $('#kodeBahan').val(kodeBahan);
                    $('#namaBahan').val(namaBahan);
                    $('#satuan').val(satuan);
                    $('#harga').val(harga);
                    $('#banyak').val(banyak);

                });

                $("#table-bahan").on('click', '.btn-delete', function() {
                    // get the current row


                    var currentRow = $(this).closest("tr");
                    var id = currentRow.find("td:eq(1)").text(); // get id jenis

                    Swal.fire({
                            title: "Apakah anda yakin?",
                            text: "Anda akan mengakses data yang dicari",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonClass: "btn-primary",
                            confirmButtonText: "Yes",
                            cancelButtonText: "No",
                            closeOnConfirm: false,
                            closeOnCancel: false
                        },
                        function(isConfirm) {
                            if (isConfirm) {

                                var url = "<?php echo base_url() ?>Pegawai/hapusPegawai/" + id;


                                $.get(url, function() {
                                    location.reload();
                                });
                                swal("Deleted", "Data berhasil dihapus!", "error");
                            } else {
                                swal("Cancelled", "Gagal)", "error");
                            }
                        });
                });


            });
        </script>

</body>

</html>