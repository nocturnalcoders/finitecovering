<?php $this->load->view('frontend/template/meta') ?>

<?php $this->load->view('frontend/template/navbar') ?>

<title><?php echo $page_title ?></title>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Yang Diajukan</h6>
        </div>
        <div class="card-body">
            <?= $this->session->flashdata('message') ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Bahan Makanan</th>
                            <th>Karbohidrat</th>
                            <th>Protein</th>
                            <th>Lemak</th>
                            <th>Vitamin A</th>
                            <th>Vitamin D</th>
                            <th>Vitamin E</th>
                            <th>Vitamin K</th>
                            <th>Asam Folat</th>
                            <th>Kalsium</th>
                            <th>Zat Seng</th>
                            <th>Zat Besi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($gizi->result() as $row) { ?>
                            <tr class="data">
                                <th><?php echo $row->id_gizi; ?></th>
                                <td><?php echo  $row->name; ?></td>
                                <td><?php echo  $row->zat_karbohidrat; ?></td>
                                <td><?php echo  $row->zat_protein; ?></td>
                                <td><?php echo  $row->zat_lemak; ?></td>
                                <td><?php echo  $row->vitamin_a; ?></td>
                                <td><?php echo  $row->vitamin_d; ?></td>
                                <td><?php echo  $row->vitamin_e; ?></td>
                                <td><?php echo  $row->vitamin_k; ?></td>
                                <td><?php echo  $row->asam_folat; ?></td>
                                <td><?php echo  $row->zat_kalsium; ?></td>
                                <td><?php echo  $row->zat_seng; ?></td>
                                <td><?php echo $row->zat_besi; ?></td>
                                <td>
                                    <button type="button" id="<?php echo $row->id_gizi; ?>" class="btn btn-primary btn-circle btn-sm view_data m-1" title="Lihat Detail" data-target="#viewDetails" data-toggle="modal">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button type="button" id="<?php echo $row->id_gizi; ?>" class="btn btn-primary btn-circle btn-sm view_data m-1" title="Lihat Detail" data-target="#viewDetails" data-toggle="modal">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
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
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-lg-3">Name</div>
                                    <div class="col-lg-1">:</div>
                                    <div class="col-lg-8" id="ajaxName"></div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-lg-3">Takaran</div>
                                    <div class="col-lg-1">:</div>
                                    <div class="col-lg-8" id="ajaxTakaran"></div>
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

    


    <?php $this->load->view('frontend/template/footer') ?>
    <?php $this->load->view('backend/template/js') ?>
    <script>
        $(document).ready(function() {
            $("#dataTable").on('click', '.view_data', function() {
                var url = "<?= base_url() ?>";
                var id = $(this).attr('id');
                $.ajax({
                    url: '<?php echo base_url(); ?>frontend/data/dataGiziById/' + id,
                    type: 'GET',
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(response) {

                        $('#ajaxName').text(response.name);
                        $('#ajaxTakaran').text(response.jumlah_takaran);
                    }
                })
            });
        });
    </script>