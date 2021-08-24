<?php
$this->load->view('parts/header');
?>

<body>
    <div id="app">
        <?php $this->load->view('parts/sidebar'); ?>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>Data Bahan</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <!-- <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Data Pegawai </h6>
                                <a href="#" style="margin-left:900px" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="btn-tambah"><i class="fas fa-plus-square "></i> <span style="margin-left: 5px;">Tambah Pegawai</span></a>
                            </div> -->
                            <div class="card-body">
                                <a href="#" class="btn btn-primary shadow-sm" id="btn-tambah" style="width:200px !important"><i class="fa fa-plus-square"></i> <span style="margin-left: 5px; ">Tambah Pegawai</span></a>
                                <div class="table-responsive" style="margin-top: 30px;">
                                    <table class="table table-bordered" id="table-bahan" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Kode Bahan</th>
                                                <th>Nama Bahan</th>
                                                <th>pcs</th>
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
                                                    <td><?php echo $data['NamaBahan'] ?></td>
                                                    <td><?php echo $data['pcs'] ?></td>

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
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Form Tambah Bahan</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" id="form-bahan">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Kode Bahan</label>
                                            <input type="text" name="kodeBahan" id="kodeBahan" value="<?php echo $id ?>" class="form-control" required>
                                            <div class="error"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Nama Bahan</label>
                                            <input type="text" name="namaBahan" id="namaBahan" class="form-control">
                                            <div class="error"></div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Sisa</label>
                                            <input type="text" name="sisa" id="sisa" class="form-control">
                                            <div class="error" style="font-size: medium; width:500px"></div>
                                        </div>
                                    </div>

                                </div>

                        </div>






                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
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
                            title: 'Auto close alert!',
                            text: 'I will close in 5 seconds.',
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
                                            swal.showLoading();
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
                    var sisa = currentRow.find("td:eq(3)").text();

                    $('#tambah').modal('show');
                    $('#kodeBahan').val(kodeBahan);
                    $('#namaBahan').val(namaBahan);
                    $('#sisa').val(sisa);

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