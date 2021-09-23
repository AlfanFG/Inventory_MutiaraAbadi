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
                                                <img src="<?= base_url('') ?>assets/images/faces/1.jpg">
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
                                <!-- <h3>Tambah Barang Keluar</h3> -->
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?= base_url('Dashboard') ?>">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Data Barang Keluar
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
                            <div class="card-header bg-primary">
                                <h5 style="color: white;">Tambah Perhitungan Produksi</h5>
                                <!-- <h6 class="m-0 font-weight-bold text-primary">Data Pegawai </h6>
                                <a href="#" style="margin-left:900px" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="btn-tambah"><i class="fas fa-plus-square "></i> <span style="margin-left: 5px;">Tambah Pegawai</span></a> -->
                            </div>

                            <div class="card-body">
                                <form id="form-tambah" method="POST" enctype="multipart/form-data" style="margin-top: 40px">
                                    <!-- <a href="#" class="btn btn-primary shadow-sm" id="btn-tambah" style="width:200px !important; margin-left: 650px; position: relative; top:40px"><i class="fa fa-plus-square"></i> <span style="margin-left: 5px; ">Tambah Pegawai</span></a> -->
                                    <div class="row helm">

                                        <div class="col-sm-3">
                                            <label for="roundText">Helm</label>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <input type="text" id="helm" name="helm" class="form-control round" placeholder="Pilih Data Helm">
                                                <div class="error"></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <button type="button" style="display: inline;" class="btn btn-success" id="btn-pilih-helm">Pilih</button>
                                            <button type="button" style="display: inline;" class="btn btn-outline-dark" id="btn-lihat">Lihat</button>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top: 20px;">
                                        <div class="col-sm-3">
                                            <label for="roundText">Jumlah Produksi</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <input type="text" id="jmlProd" name="jmlProd" class="form-control round jmlProd" placeholder="Masukan Jumlah Produksi">
                                                <div class="error"></div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row" style="margin-top: 100px;">
                                        <hr>
                                        <input type="submit" class="btn btn-outline-primary" value="submit">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- End of Main Content -->
        <?php $helm = $this->M_Helm->getAllHelm(); ?>
        <div class="modal fade text-left" id="modal-table" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel17">Pilih Nomor Pemesanan</h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fas fa-window-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-helm" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>No Pemesanan</th>
                                        <th>Supplier</th>
                                        <th>Tanggal Pemesanan</th>
                                        <th>Tools</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($helm as $data) { ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data['kodeHelm'] ?></td>
                                            <td><?php echo $data['namaHelm'] ?></td>
                                            <td><?php echo $data['total'] ?></td>
                                            <td class="text-center">
                                                <a href="javascript:;" class="btn btn-outline-secondary btn-pilih" data-kodehelm="<?php echo $data['kodeHelm'] ?>">Pilih</a>

                                            </td>

                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">


                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade text-left" id="modal-table-detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel17">Detail Helm</h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fas fa-window-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-helm" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Kode Bahan</th>
                                        <th>Bagian Helm</th>
                                        <th>Harga</th>
                                        <th>Hasil</th>
                                        <th>Harga Set</th>
                                    </tr>
                                </thead>

                                <tbody id="field-detail">

                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">


                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        $this->load->view('parts/footer');
        ?>
        <script>
            $(document).ready(function() {
                $('#btn-lihat').prop('disabled', true);
                $('#table-helm').DataTable();

                $('#btn-pilih-helm').click(function() {

                    $('#modal-table').modal('show');
                });

                $('#btn-lihat').click(function() {

                    $('#modal-table-detail').modal('show');
                });

                $('#table-helm').on('click', '.btn-pilih', function() {
                    $('#btn-lihat').prop('disabled', false);
                    let kodeHelm = $(this).data('kodehelm');
                    $('#helm').val(kodeHelm);
                    $('#modal-table').modal('hide');
                    $.ajax({
                        url: '<?php echo base_url('') ?>KalkulasiBahan/getHelmByKode/' + kodeHelm,
                        type: 'GET',
                        error: function() {
                            alert('Something is wrong!');
                        },
                        success: function(data) {
                            var value = JSON.parse(data);
                            let no = 1;
                            for (var i = 0; i <= value.length - 1; i++) {
                                $('#field-detail').append(`<tr>
                                    <td>` + no++ + `</td>
                                    <td>` + value[i].KodeBahan + `</td>
                                    <td>` + value[i].bagianHelm + `</td>
                                    <td>` + value[i].harga + `</td>
                                    <td>` + value[i].hasil + `</td>
                                    <td>` + value[i].hargaSet + `</td>
                                    </tr>`);
                            }
                        }
                    });

                })

                $('#jmlProd').focus(function() {
                    if ($('#helm').val() == '') {
                        alert('Pilih helm terlebih dahulu!');
                        $('#helm').focus();
                    }
                })
                let jmlSatuan = [];
                $('#jmlProd').change(function() {
                    kodeHelm = $('#helm').val();
                    $.ajax({
                        url: '<?php echo base_url('') ?>KalkulasiBahan/getHelmByKode/' + kodeHelm,
                        type: 'GET',
                        error: function() {
                            alert('Something is wrong!');
                        },
                        success: function(data) {

                            let jmlProd = $('#jmlProd').val();
                            var value = JSON.parse(data);
                            for (var i = 0; i <= value.length - 1; i++) {
                                jmlSatuan[i] = jmlProd / value[i].hasil;
                            }
                        }
                    });
                });

                $('#form-tambah').on('submit', function(e) {
                    e.preventDefault();
                    let helm = $('#helm').val().toString();
                    let jmlProd = $('#jmlProd').val();
                    var fd = new FormData(this);
                    fd.append('jmlSatuan', jmlSatuan);

                    //     // Swal.fire({
                    //     //     title: "Apakah anda yakin?",
                    //     //     text: "Anda akan mengakses data yang dicari",
                    //     //     type: "warning",
                    //     //     showCancelButton: true,
                    //     //     confirmButtonClass: "btn-primary",
                    //     //     confirmButtonText: "Yes",
                    //     //     cancelButtonText: "No",
                    //     //     closeOnConfirm: false,
                    //     //     closeOnCancel: false,

                    //     // }).then(result => {
                    //     //     if (result.value == true) {


                    //     //         Swal.fire({
                    //     //             title: 'Sedang Proses',
                    //     //             text: 'Tunggu Sebentar...',
                    //     //             timer: 1000,
                    //     //             showConfirmButton: false,
                    //     //             onOpen: () => {
                    //     //                 Swal.showLoading()
                    //     //             }
                    //     //         }).then(
                    //     //             function() {
                    $.ajax({
                        ///nambah url
                        url: "<?php echo site_url('KalkulasiBahan/addKalkulasi'); ?>",
                        type: "POST",
                        data: {
                            helm: helm,
                            jmlProd: jmlProd,
                            jmlSatuan: jmlSatuan
                        },
                        dataType: 'json',
                        success: function(data) {

                            // Swal.fire({
                            //     title: "Success",
                            //     text: "Data berhasil dimasukan!",
                            //     type: "success",
                            //     confirmButtonClass: "btn-primary",
                            //     confirmButtonText: "Oke",
                            //     closeOnConfirm: true
                            // }).then(function() {
                            //     window.location.href = "<?php echo base_url(); ?>KalkulasiBahan";
                            // })
                        }
                    });

                    //                 },
                    //                 // handling the promise rejection
                    //                 function(dismiss) {
                    //                     if (dismiss === 'timer') {
                    //                         console.log('I was closed by the timer')
                    //                     }
                    //                 }
                    //             )
                    //         } else {
                    //             Swal.fire(
                    //                 'Cancelled',
                    //                 '',
                    //                 'error'
                    //             )
                    //         }

                    //     });
                    // });

                });
            });
        </script>
</body>

</html>