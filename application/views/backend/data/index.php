<!-- meta -->
<?php $this->load->view('backend/template/meta') ?>
<!-- meta -->

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <?php $this->load->view('backend/template/sidebar') ?>

    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <?php $this->load->view('backend/template/navbar') ?>

            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Nutrion Data Management</h1>
                    <button id="btn_tambah" class="btn btn-sm btn-primary btn-icon-split float-right" data-toggle="modal" data-target="#tambahEdit-nut">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah Data</span>
                    </button>
                </div>


                <!-- Content Row -->

                <!-- DataTales Example -->
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Nutrion Generator</h6>
                        </div>
                        <div class="card-body">
                            <?= $this->session->flashdata('message') ?>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID Gizi</th>
                                            <th>Name</th>
                                            <th>Karbohidrat</th>
                                            <th>Protein</th>
                                            <th>Lemak</th>
                                            <th>Vitamin A</th>
                                            <th>Vitamin D</th>
                                            <th>Vitamin E</th>
                                            <th>Vitamin K</th>
                                            <th>Asam Folat</th>
                                            <th>Zat Kalsium</th>
                                            <th>Zat Seng</th>
                                            <th>Zat Besi</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID Gizi</th>
                                            <th>Name</th>
                                            <th>Karbohidrat</th>
                                            <th>Protein</th>
                                            <th>Lemak</th>
                                            <th>Vitamin A</th>
                                            <th>Vitamin D</th>
                                            <th>Vitamin E</th>
                                            <th>Vitamin K</th>
                                            <th>Asam Folat</th>
                                            <th>Zat Kalsium</th>
                                            <th>Zat Seng</th>
                                            <th>Zat Besi</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        foreach ($gizi->result() as $g) { ?>
                                            <tr class="data">
                                                <th><?php echo $g->id_gizi; ?></th>
                                                <td><?php echo  $g->name; ?></td>
                                                <td><?php echo  $g->zat_karbohidrat; ?></td>
                                                <td><?php echo  $g->zat_protein; ?></td>
                                                <td><?php echo  $g->zat_lemak; ?></td>
                                                <td><?php echo  $g->vitamin_a; ?></td>
                                                <td><?php echo  $g->vitamin_d; ?></td>
                                                <td><?php echo  $g->vitamin_e; ?></td>
                                                <td><?php echo  $g->vitamin_k; ?></td>
                                                <td><?php echo  $g->asam_folat; ?></td>
                                                <td><?php echo  $g->zat_kalsium; ?></td>
                                                <td><?php echo  $g->zat_seng; ?></td>
                                                <td><?php echo $g->zat_besi; ?></td>
                                                <td>
                                                    <button type="button" id="<?php echo $g->id_gizi; ?>" class="btn btn-primary btn-circle btn-sm view_data m-1" title="Lihat Detail" data-target="#viewDetails" data-toggle="modal">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                    <!-- edit btn BELOM -->
                                                    <button type="button" id="<?php echo $g->id_gizi; ?>" class="btn btn-success btn-circle btn-sm edit_data m-1" data-target="#tambahEdit-nut" data-toggle="modal">
                                                        <i class="fas fa-pen"></i>
                                                    </button>
                                                    <a onclick="return confirm('Apakah Anda Ingin Menghapus Data Gizi Nutrisi ? <?= $g->name; ?> ?');" href="<?php echo site_url('admin/data/delete_gizi/' . $g->id_gizi); ?>" class="btn btn-danger btn-circle btn-sm m-1"><i class="fas fa-trash"></i></a>

                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- /.container-fluid -->

</div>
<div class="modal fade" id="tambahEdit-nut" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary font-weight-bold" id="exampleModalCenterTitle">Add Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('admin/data/saveDataNutrisi'); ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="idGizi">
                    <input type="hidden" name="fotoBahanMakanan">
                    <div class="form-group">
                        <label for="name">Nama Bahan Makanan</label>
                        <input value="" type="text" class="form-control" id="name" name="name" aria-describedby="Name" placeholder="Masukkan nama bahan makanan" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Takaran yang Di anjurkan</label>
                        <input value="" type="text" class="form-control" id="jumlah_takaran" name="jumlah_takaran" aria-describedby="JumlahTakaran" placeholder="Masukkan Jumlah Takaran makanan" required>
                    </div>
                    <div class="form-group">
                        <label for="zat_karbohidrat">Zat Karbohidrat</label>
                        <select name="zat_karbohidrat" class="form-control" id="zat_karbohidrat" required>
                            <option value="1">Ada</option>
                            <option value="0">Tidak Ada</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="zat_protein">Zat Protein</label>
                        <select name="zat_protein" class="form-control" id="zat_protein" required>
                            <option value="0">Tidak Ada</option>
                            <option value="1">Ada</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="zat_lemak">Zat Lemak</label>
                        <select name="zat_lemak" class="form-control" id="zat_lemak" required>
                            <option value="0">Tidak Ada</option>
                            <option value="1">Ada</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="vitamin_a">Vitamin A</label>
                        <select name="vitamin_a" class="form-control" id="vitamin_a" required>
                            <option value="0">Tidak Ada</option>
                            <option value="1">Ada</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="vitamin_d">Vitamin D</label>
                        <select name="vitamin_d" class="form-control" id="vitamin_d" required>
                            <option value="1">Ada</option>
                            <option value="0">Tidak Ada</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="vitamin_e">Vitamin E</label>
                        <select name="vitamin_e" class="form-control" id="vitamin_e" required>
                            <option value="0">Tidak Ada</option>
                            <option value="1">Ada</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="vitamin_k">Vitamin K</label>
                        <select name="vitamin_k" class="form-control" id="vitamin_k" required>
                            <option value="0">Tidak Ada</option>
                            <option value="1">Ada</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="asam_folat">Asam Folat</label>
                        <select name="asam_folat" class="form-control" id="asam_folat" required>
                            <option value="0">Tidak Ada</option>
                            <option value="1">Ada</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="zat_kalsium">Zat Kalsium</label>
                        <select name="zat_kalsium" class="form-control" id="zat_kalsium" required>
                            <option value="0">Tidak Ada</option>
                            <option value="1">Ada</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="zat_seng">Zat Seng</label>
                        <select name="zat_seng" class="form-control" id="zat_seng" required>
                            <option value="0">Tidak Ada</option>
                            <option value="1">Ada</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="zat_besi">Zat Besi</label>
                        <select name="zat_besi" class="form-control" id="zat_besi" required>
                            <option value="0">Tidak Ada</option>
                            <option value="1">Ada</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="profil">Foto Bahan Makanan</label>
                        <input value="" type="file" class="form-control-file" id="profil" name="profil" aria-describedby="profil" accept="image/*">
                    </div>
                    <div class="form-group">
                        <img id="fotolama" style="width:20%; margin-top:10px;" src="" alt="image" />
                    </div>

                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                        <button type="submit" id="btnSubmitTambahEdit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="viewDetails" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="viewDetailsLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="viewDetailsLabel"><strong>Rincian Data Nutrisi</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <ul class="list-group list-group-flush">
                    <center>
                        <h1 class="center" id="ajaxName"></h1>  
                    </center>
                    <img src="" alt="fotoo" id="ajaxImage" class="img-thumbnail rounded mx-auto d-block mb-3">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-lg-6">Takaran yang diajukan</div>
                                <div class="col-lg-2">:</div>
                                <div class="col-lg-4" id="ajaxTakaran"></div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-lg-3">Karbohidrat</div>
                                <div class="col-lg-1">:</div>
                                <div class="col-lg-8" id="ajaxKarbo"></div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-lg-3">Protein</div>
                                <div class="col-lg-1">:</div>
                                <div class="col-lg-8" id="ajaxProtein"></div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-lg-3">Lemak</div>
                                <div class="col-lg-1">:</div>
                                <div class="col-lg-8" id="ajaxLemak"></div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-lg-3">Vitamin A</div>
                                <div class="col-lg-1">:</div>
                                <div class="col-lg-8" id="ajaxVitA"></div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-lg-3">Vitamin D</div>
                                <div class="col-lg-1">:</div>
                                <div class="col-lg-8" id="ajaxVitD"></div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-lg-3">Vitamin E</div>
                                <div class="col-lg-1">:</div>
                                <div class="col-lg-8" id="ajaxVitE"></div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-lg-3">Vitamin K</div>
                                <div class="col-lg-1">:</div>
                                <div class="col-lg-8" id="ajaxVitK"></div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-lg-3">Asam Folat</div>
                                <div class="col-lg-1">:</div>
                                <div class="col-lg-8" id="ajaxAsamFolat"></div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-lg-3">Zat Kalsium</div>
                                <div class="col-lg-1">:</div>
                                <div class="col-lg-8" id="ajaxKalsium"></div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-lg-3">Zat Seng</div>
                                <div class="col-lg-1">:</div>
                                <div class="col-lg-8" id="ajaxSeng"></div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-lg-3">Zat Besi</div>
                                <div class="col-lg-1">:</div>
                                <div class="col-lg-8" id="ajaxBesi"></div>
                            </div>
                        </li>
                        
                    </ul>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->

<!-- Footer -->
<?php $this->load->view('backend/template/footer') ?>

<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
</body>
<!-- ./wrapper -->

<!-- js -->

</body>


</html>

<?php $this->load->view('backend/template/js') ?>
<script>
    $(document).ready(function() {
        $('#btnSubmitTambahEdit').click(function() {
            var file = $('#profil').val(); //Ambil Value 
            var ekstensi = ['jpg', 'png', 'jpeg']; //Variabel array untuk penentuan Ekstensi
            if (file) {
                var ambilekstensi = file.split('.'); //Ambil Ekstensi
                ambilekstensi = ambilekstensi.reverse();
                if ($.inArray(ambilekstensi[0].toLowerCase(), ekstensi) > -1) {
                    var file_size = $('#profil')[0].files[0].size;
                    if (file_size > 2097152) {
                        alert('Ukuran file Max 2 MB');
                        return false;
                    }
                    return true;
                } else {
                    alert('Tipe Foto harus .jpg / .png / .jpeg'); //Alert jika ekstensi tidak cocok
                    return false;
                }
            }
        });

        function bacaGambar(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#fotolama').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#profil").change(function() {
            bacaGambar(this);
        });


        $("#btn_tambah").click(function() {
            $('#tambahEdit-nut').find('form')[0].reset();
            $('#btnSubmitTambahEdit').text('Tambah');
            $('#tambahEdit-nut h5').text('Tambah Data Nutrisi');
        });

        $("#dataTable").on('click', '.view_data', function() {
            var url = "<?= base_url() ?>";
            var id = $(this).attr('id');
            $.ajax({
                url: '<?php echo base_url(); ?>frontend/data/dataGiziById/' + id,
                type: 'POST',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(response) {
                    $("#ajaxImage").attr("src", url + "assets/img/" + response.foto_bahan_makanan);
                    $('#ajaxName').text(response.name);
                    $('#ajaxKarbo').text(response.zat_karbohidrat);
                    $('#ajaxProtein').text(response.zat_protein);
                    $('#ajaxLemak').text(response.zat_lemak);
                    $('#ajaxVitA').text(response.vitamin_a);
                    $('#ajaxVitD').text(response.vitamin_d);
                    $('#ajaxVitE').text(response.vitamin_e);
                    $('#ajaxVitK').text(response.vitamin_k);
                    $('#ajaxAsamFolat').text(response.asam_folat);
                    $('#ajaxKalsium').text(response.zat_kalsium);
                    $('#ajaxSeng').text(response.zat_seng);
                    $('#ajaxBesi').text(response.zat_besi);
                    $('#ajaxTakaran').text(response.jumlah_takaran);
                }
            })
        });

        $("#dataTable").on('click', '.edit_data', function() {
            $('#btnSubmitTambahEdit').text('Edit');
            $('#tambahEdit-nut h5').text('Edit Data Nutrisi');

            var url = "<?= base_url() ?>";
            var id = $(this).attr('id');

            $.ajax({
                url: '<?php echo base_url(); ?>Admin/Data/dataGiziById/' + id,
                type: 'POST',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(response) {
                    $("#fotolama").attr("src", url + "assets/img/" + response.foto_bahan_makanan);
                    $('input[name="idGizi"]').val(response.id_gizi);
                    $('input[name="fotoBahanMakanan"]').val(response.foto_bahan_makanan);
                    $('input[name="name"]').val(response.name);
                    $('select[name="zat_karbohidrat"]').val(response.zat_karbohidrat);
                    $('select[name="zat_protein"]').val(response.zat_protein);
                    $('select[name="zat_lemak"]').val(response.zat_lemak);
                    $('select[name="vitamin_a"]').val(response.vitamin_a);
                    $('select[name="vitamin_d"]').val(response.vitamin_d);
                    $('select[name="vitamin_e"]').val(response.vitamin_e);
                    $('select[name="vitamin_k"]').val(response.vitamin_k);
                    $('select[name="asam_folat"]').val(response.asam_folat);
                    $('select[name="zat_kalsium"]').val(response.zat_kalsium);
                    $('select[name="zat_seng"]').val(response.zat_seng);
                    $('select[name="zat_besi"]').val(response.zat_besi);
                    $('input[name="jumlah_takaran"]').val(response.jumlah_takaran);
                }
            })
        });

    });
</script>