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
                                <!-- <h3>Tambah Barang Masuk</h3> -->
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?= base_url('Dashboard') ?>">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Data Barang Masuk
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                $noPemesanan = $this->M_OrderBahan->getNoPemesanan();
                ?>
                <section class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header bg-primary">
                                <h5 style="color: white;">Tambah Pemesanan Bahan</h5>
                                <!-- <h6 class="m-0 font-weight-bold text-primary">Data Pegawai </h6>
                                <a href="#" style="margin-left:900px" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="btn-tambah"><i class="fas fa-plus-square "></i> <span style="margin-left: 5px;">Tambah Pegawai</span></a> -->
                            </div>
                            <div class="card-body">
                                <form id="form-tambah" method="POST" enctype="multipart/form-data" style="margin-top: 40px">
                                    <!-- <a href="#" class="btn btn-primary shadow-sm" id="btn-tambah" style="width:200px !important; margin-left: 650px; position: relative; top:40px"><i class="fa fa-plus-square"></i> <span style="margin-left: 5px; ">Tambah Pegawai</span></a> -->
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label for="roundText">Nomor Pemesanan</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <input type="text" id="noPemesanan" name="noPemesanan" class="form-control round" placeholder="Masukan No. Pemesanan" value="<?= $noPemesanan; ?>">
                                            <div class="error"></div>
                                            </div>
                                            
                                        </div>

                                    </div>
                                    <div class="row" style="margin-top: 20px;">
                                        <div class="col-sm-3">
                                            <label for="roundText">Tanggal Pemesanan</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <input type="date" id="tgl_pemesanan" name="tgl_pemesanan" class="form-control round">
                                                <div class="error"></div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top: 20px;">
                                        <div class="col-sm-3">
                                            <label for="roundText">Supplier</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <input type="text" id="supplier" name="supplier" class="form-control round">
                                                <div class="error"></div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top: 20px;">
                                        <div class="col-sm-3">
                                            <label for="Bahan Group">Bahan Group</label>
                                        </div>
                                    </div>
                                    <div class="brg-group">
                                        <div class="brg-group-no">
                                            <div class="divider">

                                                <div class="divider-text"><span class="badge bg-dark">Bahan 1</span></div>

                                            </div>
                                            <div class="row" style="margin-top: 20px;">
                                                <div class="col-sm-3">
                                                    <label for="roundText">Nama Bahan</label>
                                                </div>
                                                <div class="col-sm-8 dynamic">
                                                    <div class="form-group add">

                                                        <input type="text" id="bahan1" name="bahan[]" class="form-control round bahan" placeholder="Masukan Nama atau Kode Bahan" required>
                                                        <div class="error"></div>
                                                    </div>
                                                    

                                                </div>
                                                <div class="col-sm-1 dynamic-del" style="margin-top: 50px;">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <label for="roundText">Jumlah Pemesanan</label>
                                                </div>
                                                <div class="col-sm-8 dynamic">
                                                    <div class="form-group add">
                                                        <input type="text" id="jmlPesanan1" name="jmlPesanan[]" class="form-control round jmlPesanan" placeholder="Jumlah Pemesanan" required>
                                                        <div class="error"></div>
                                                    </div>
                                                   
                                                </div>
                                                <div class="col-sm-1 dynamic-del" style="margin-top: 50px;">
                                                </div>
                                            </div>

                                            <div class="divider divider-right">
                                                <div class="divider-text del">
                                                    <!-- <button class="btn btn-danger"><i class="fas fa-minus-circle"></i></button> -->
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <button type="button" class="btn btn-success rounded-pill" id="addBarang" style="float: right; margin-right: 65px"><i class="fas fa-plus"></i> Tambah Bahan</button>
                                    </div>


                                    <input type="hidden" id="jumlah" name="jumlah">
                                    <div class="row" style="margin-top: 100px;">
                                        <hr>
                                        <input type="submit" class="btn btn-primary" value="Simpan">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>



        </div>
        <!-- End of Main Content -->

        <?php
        $this->load->view('parts/footer');
        ?>
        <script>
            $(document).ready(function() {

                $(".bahan").autocomplete({
                    source: "<?php echo site_url('PemesananBarang/get_autocomplete/?'); ?>"
                });

                // $('.barang').change(function() {
                //     var namaBahan = $('#bahan1').val();

                //     var kode = namaBahan.substring(1, 6);

                //     $.ajax({
                //         url: '<?php echo base_url('') ?>BarangMasuk/getSatuanBarang/' + kode,
                //         type: 'POST',
                //         cache: false,
                //         error: function() {
                //             alert('Something is wrong!');
                //         },
                //         success: function(data) {
                //             var value = JSON.parse(data);
                //             $('#satuan1').val(value.satuan);
                //         }
                //     });

                // });

                var i = 1;
                let barang = [];
                $('#addBarang').click(function() {

                    i++;
                    barang[i - 1] = i;
                    $('.brg-group').append(`
                                            <div class="brg-group-no` + i + `">
                                            <div class="divider">

                                                <div class="divider-text"><span class="badge bg-dark" id="title` + i + `">Bahan ` + i + `</span></div>

                                            </div>
                                            <div class="row" style="margin-top: 20px;">

                                            <div class="col-sm-3">
                                                <label for="roundText">Nama Barang</label>
                                            </div>
                                            <div class="col-sm-8 dynamic">
                                                <div class="form-group add">
                                                    <input type="text" id="bahan` + i + `" name="bahan[]" class="form-control round bahan" placeholder="Masukan Nama atau Kode Barang" required>
                                                    <div class="error"></div>

                                                </div>
                                                

                                            </div>
                                           


                                            </div>

                                            <div class="row">

                                            <div class="col-sm-3">

                                            </div>
                                            <div class="col-sm-4 dynamic">
                                                <div class="form-group add">
                                                    
                                                    <input type="text" id="supplier` + i + `" name="supplier[]" class="form-control round supplier" placeholder="Masukan Supplier" required>
                                                    <div class="error"></div>

                                                </div>
                                                
                                            </div>
                                            <div class="col-sm-4 dynamic">
                                                <div class="form-group add">
                                                    
                                                    <input type="text" id="jmlPemesanan` + i + `" name="jmlPemesanan[]" class="form-control round jmlPemesanan" placeholder="Masukan Jumlah Pemesanan" required>
                                                    <div class="error"></div>

                                                </div>
                                                
                                            </div>
                                          


                                            </div>

                                            <div class="divider divider-right">
                                            <div class="divider-text brg-group-no` + i + `">
                                                <button type="button" class="btn btn-danger del"><i class="fas fa-minus-circle"></i></button>
                                            </div>

                                            </div>

                                            </div>
                                            </div>`);
                    $('#jumlah').val(i);
                    $(".bahan").on('change', '.bahan', function() {

                    }).autocomplete({
                        source: "<?php echo site_url('PemesananBarang/get_autocomplete/?'); ?>"

                    });

                    // $('#bahan' + i).change(function() {
                    //     var namaBahan = $('#barang' + i).val();

                    //     var kode = namaBahan.substring(1, 6);

                    //     $.ajax({
                    //         url: '<?php echo base_url('') ?>BarangMasuk/getSatuanBarang/' + kode,
                    //         type: 'POST',
                    //         cache: false,
                    //         error: function() {
                    //             alert('Something is wrong!');
                    //         },
                    //         success: function(data) {
                    //             var value = JSON.parse(data);
                    //             $('#satuan' + i).val(value.satuan);
                    //         }
                    //     });

                    // });



                    // $('.rincian').on('keydown', function(event) {

                    //     key = event.which || event.keyCode;
                    //     if (key != 188 // Comma
                    //         &&
                    //         key != 8 // Backspace
                    //         &&
                    //         key != 17 && key != 86 & key != 67 // Ctrl c, ctrl v
                    //         &&
                    //         (key < 48 || key > 57) // Non digit
                    //         // Dan masih banyak lagi seperti tombol del, panah kiri dan kanan, tombol tab, dll
                    //     ) {
                    //         event.preventDefault();
                    //         return;
                    //     }
                    // });
                })



                $('div').on('click', '.del', function() {
                    let button_id = $(this).parent().attr('class');
                    let id = button_id.substring(13, 26);
                    let selector = $(this).parents().map(function() {
                            return this.className
                        })
                        .get(2);
                    var clean = selector.replace(/\D/g, '');

                    i--;
                    let index = barang.indexOf(clean);
                    barang.splice(index, 1);

                    // console.log(barang.length);
                    $('.' + id).remove();
                    let inc = parseInt(clean);

                    for (var j = 2; j <= barang.length; j++) {
                        inc++;
                        $('#title' + inc).attr('id', 'title' + (inc - 1));
                        $('#title' + (inc - 1)).text('Bahan ' + (inc - 1));

                    }
                });
               
                var status;
                $('#form-tambah').on('submit', function(e) {
                    e.preventDefault();

                    $('#jumlah').val(i);
                    var fd = new FormData();
                    var data = $('#form-tambah').serializeArray();

                    $.each(data, function(key, input) {
                        fd.append(input.name, input.value);
                    });


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
                        closeOnCancel: false,

                    }).then(result => {
                        if (result.value == true) {
                            // console.log(value.value);

                            Swal.fire({
                                title: 'Sedang Proses',
                                text: 'Tunggu Sebentar...',
                                timer: 1000,
                                showConfirmButton: false,
                                onOpen: () => {
                                    Swal.showLoading()
                                }
                            }).then(
                                function() {
                                   
                                    $.ajax({
                                        ///nambah url
                                        url: "<?php echo site_url('PemesananBarang/addPemesanan'); ?>",
                                        method: "POST",
                                        data: fd,
                                        contentType: false,
                                        processData: false,
                                        success: function(data) {
                                            console.log(data);
                                            var status = false;
                                            if (data.status == 'invalid') {
                                                swal.showLoading();
                                                $.each(data, function(key, value) {
                                                    //alert(value);
                                                    $('.' + key).parents('.form-group').find('.error').html(value);

                                                });
                                                fstatus = '';
                                                Swal.fire({
                                                    title: "Failed",
                                                    text: "Data gagal dimasukan!",
                                                    type: "error",
                                                    confirmButtonClass: "btn-primary",
                                                    confirmButtonText: "Oke",
                                                    closeOnConfirm: true
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
                                                    window.location.href = "<?php echo base_url(); ?>PemesananBarang";

                                                })
                                                // function() {
                                                //     location.reload();
                                                // }

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
                        } else {
                            Swal.fire(
                                'Cancelled',
                                '',
                                'error'
                            )
                        }

                    });
                });

            });
        </script>
</body>

</html>