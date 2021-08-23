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
                <h3>Profile Statistics</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <a href="#" class="btn btn-primary shadow-sm" id="btn-tambah" style="width:200px !important"><i class="fa fa-plus-square"></i> <span style="margin-left: 5px; ">Tambah Pegawai</span></a>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="table-NamaPegawai" width="95%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>ID Pegawai</th>
                                            <th>ID Jabatan</th>
                                            <th>Nama Pegawai</th>
                                            <th>Alamat</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Nomor Telp</th>
                                            <th>Tools</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($bahan as $data) { ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $data['id_pegawai'] ?></td>
                                                <td><?php echo $data['id_jabatan'] ?></td>
                                                <td><?php echo $data['NamaPegawai'] ?></td>
                                                <td><?php echo $data['alamatPegawai'] ?></td>
                                                <td><?php echo $data['tgl_lahir'] ?></td>
                                                <td><?php echo $data['nomorTelp'] ?></td>
                                                <td>
                                                    <a href="javascript:void(0)" class="btn btn-warning btn-edit"><i class="fa fa-edit"></i></a>
                                                    <a href="javascript:void(0)" class="btn btn-danger btn-delete"><i class="fa fa-trash-alt"></i></a>
                                                </td>

                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <?php
            $id = $this->M_Pegawai->id_pegawai();
            ?>
            <!-- modal tambah -->
            <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="databarang" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Form Tambah Pegawai</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" id="form-NamaPegawai">
                                <div class="form-group">
                                    <label class="control-label">ID Pegawai</label>
                                    <input type="text" name="id_pegawai" id="id_pegawai" value="<?php echo $id ?>" class="form-control" required>
                                    <div class="error"></div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">ID jabatan</label>
                                    <input type="text" name="id_jabatan" id="id_jabatan" class="form-control">
                                    <div class="error"></div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Nama Pegawai</label>
                                    <input type="text" name="NamaPegawai" id="NamaPegawai" class="form-control">
                                    <div class="error" style="font-size: medium; width:500px"></div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Alamat Pegawai</label>
                                    <input type="text" name="alamatPegawai" id="alamatPegawai" class="form-control">
                                    <div class="error" style="font-size: medium; width:500px"></div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Tanggal Lahir</label>
                                    <input type="text" name="tgl_lahir" id="tgl_lahir" class="form-control">
                                    <div class="error" style="font-size: medium; width:500px"></div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Nomor Telp</label>
                                    <input type="text" name="nomorTelp" id="nomorTelp" class="form-control">
                                    <div class="error" style="font-size: medium; width:500px"></div>
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
                    $('#table-NamaPegawai').DataTable({
                        ddom: 'Bfrtip',
                        buttons: [
                            'copy', 'excel', 'pdf', 'print'
                        ]

                    });

                    $('#btn-tambah').click(function() {
                        $('.error').html('');
                        $('#form-NamaPegawai')[0].reset();
                        // $('#img').html(`<input type="file" class="form-control" id="image" name="image" value="" placeholder="Add image">
                        //                             <?php echo form_error('image'); ?>`);
                        // // $('#insert_form')[0].reset();
                        $('#btn-save').val('Save');
                        $('#tambah').modal('show');
                    });

                    $('#form-NamaPegawai').on('submit', function(e) {
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
                                URL = "<?php echo site_url('Pegawai/addPegawai'); ?>";

                            } else {
                                var id = $('#IdPegawai').val();
                                URL = "<?php echo site_url() ?>Pegawai/editPegawai/" + id;
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
                                        data: $('#form-NamaPegawai').serializeArray(),
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
                                                    },
                                                    function() {
                                                        $('#tambah').modal('show');
                                                    });

                                            } else {

                                                Swal.fire({
                                                        title: "Success",
                                                        text: "Data berhasil dimasukan!",
                                                        type: "success",
                                                        confirmButtonClass: "btn-primary",
                                                        confirmButtonText: "Oke",
                                                        closeOnConfirm: true
                                                    },
                                                    function() {
                                                        window.location = "<?php echo base_url('Pegawai') ?>";
                                                    });

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

                    $("#table-NamaPegawai").on('click', '.btn-edit', function() {
                        // get the current row
                        $('.error').html('');
                        fstatus = 'update';
                        $('#btn-save').val('Update');
                        var currentRow = $(this).closest("tr");
                        var IdPegawai = currentRow.find("td:eq(1)").text(); // get current row 2nd TD
                        var namaPegawai = currentRow.find("td:eq(2)").text();
                        var harga = currentRow.find("td:eq(3)").text();
                        var stok = currentRow.find("td:eq(4)").text();

                        $('#tambah').modal('show');
                        $('#IdPegawai').val(IdPegawai);
                        $('#namaPegawai').val(namaPegawai);
                        $('#harga').val(harga);
                        $('#stok').val(stok);

                    });

                    $("#table-NamaPegawai").on('click', '.btn-delete', function() {
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