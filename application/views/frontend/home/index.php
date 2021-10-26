<?php $this->load->view('frontend/template/meta') ?>

<?php $this->load->view('frontend/template/navbar') ?>

<title><?php echo $page_title ?></title>

<div class="container-fluid">

    <!-- Content Row -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Nutrions List</h6>
        </div>
        <form method="post" id="insert_form">
            <span id="error"></span>
            <table class="table table-striped table-layout" id="item_table">
                <tr>
                    <th>Select Nutrion</th>
                    <th><button type="button" name="add" class="btn btn-success btn-sm add"><span class="fas fa-fw fa-plus"></span></button></th>
                </tr>
            </table>
            <div align="center">
                <input type="submit" name="submit" class="btn btn-success" value="insert" />
            </div>
        </form>
    </div>

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
                            <th>Sum Row</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <?php
                        foreach ($nutrionMatrixSum as $g) { ?>
                            <tr>
                                <th>Sum Column</th>
                                <th></th>
                                <th><?php echo $g['total_zat_karbohidrat']; ?></th>
                                <th><?php echo $g['total_zat_protein']; ?></th>
                                <th><?php echo $g['total_zat_lemak']; ?></th>
                                <th><?php echo $g['total_vitamin_a']; ?></th>
                                <th><?php echo $g['total_vitamin_d']; ?></th>
                                <th><?php echo $g['total_vitamin_e']; ?></th>
                                <th><?php echo $g['total_vitamin_k']; ?></th>
                                <th><?php echo $g['total_asam_folat']; ?></th>
                                <th><?php echo $g['total_zat_kalsium']; ?></th>
                                <th><?php echo $g['total_zat_seng']; ?></th>
                                <th><?php echo $g['total_zat_besi']; ?></th>
                                <th></th>

                            </tr>
                        <?php } ?>
                    </tfoot>
                    <tbody>
                        <?php
                        $total_sum = 0;
                        foreach ($gizi as $g) { ?>
                            <tr class="data">
                                <th><?php echo $g['id_gizi']; ?></th>
                                <td><?php echo  $g['name']; ?></td>
                                <td><?php echo  $g['zat_karbohidrat']; ?></td>
                                <td><?php echo  $g['zat_protein']; ?></td>
                                <td><?php echo  $g['zat_lemak']; ?></td>
                                <td><?php echo  $g['vitamin_a']; ?></td>
                                <td><?php echo  $g['vitamin_d']; ?></td>
                                <td><?php echo  $g['vitamin_e']; ?></td>
                                <td><?php echo  $g['vitamin_k']; ?></td>
                                <td><?php echo  $g['asam_folat']; ?></td>
                                <td><?php echo  $g['zat_kalsium']; ?></td>
                                <td><?php echo  $g['zat_seng']; ?></td>
                                <td><?php echo $g['zat_besi']; ?></td>
                                <td><?php echo $total_sum =
                                        $g['zat_karbohidrat'] +
                                        $g['zat_protein'] +
                                        $g['zat_lemak'] +
                                        $g['vitamin_a'] +
                                        $g['vitamin_d'] +
                                        $g['vitamin_e'] +
                                        $g['vitamin_k'] +
                                        $g['asam_folat'] +
                                        $g['zat_kalsium'] +
                                        $g['zat_seng'] +
                                        $g['zat_besi']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Step 5 Reduksi Sum row column 0</h6>
        </div>
        <div class="card-body">
            <?= $this->session->flashdata('message') ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Bahan Makanan</th>
                            <th class="karboh">Karbohidrat</th>
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
                            <th>Sum Row</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <?php
                        foreach ($nutrionMatrixSum as $g) { ?>
                            <tr>
                                <th>Sum Column</th>
                                <th></th>
                                <th><?php echo $g['total_zat_karbohidrat']; ?></th>
                                <th><?php echo $g['total_zat_protein']; ?></th>
                                <th><?php echo $g['total_zat_lemak']; ?></th>
                                <th><?php echo $g['total_vitamin_a']; ?></th>
                                <th><?php echo $g['total_vitamin_d']; ?></th>
                                <th><?php echo $g['total_vitamin_e']; ?></th>
                                <th><?php echo $g['total_vitamin_k']; ?></th>
                                <th><?php echo $g['total_asam_folat']; ?></th>
                                <th><?php echo $g['total_zat_kalsium']; ?></th>
                                <th><?php echo $g['total_zat_seng']; ?></th>
                                <th><?php echo $g['total_zat_besi']; ?></th>
                                <th></th>

                            </tr>
                        <?php } ?>
                    </tfoot>
                    <tbody>
                        <?php
                        $total_sum = 0;
                        foreach ($gizi as $g) { ?>
                            <tr class="data">
                                <td><?php echo $g['id_gizi']; ?></td>
                                <td><?php echo  $g['name']; ?></td>
                                <td><?php echo  $g['zat_karbohidrat']; ?></td>
                                <td><?php echo  $g['zat_protein']; ?></td>
                                <td><?php echo  $g['zat_lemak']; ?></td>
                                <td><?php echo  $g['vitamin_a']; ?></td>
                                <td><?php echo  $g['vitamin_d']; ?></td>
                                <td><?php echo  $g['vitamin_e']; ?></td>
                                <td><?php echo  $g['vitamin_k']; ?></td>
                                <td><?php echo  $g['asam_folat']; ?></td>
                                <td><?php echo  $g['zat_kalsium']; ?></td>
                                <td><?php echo  $g['zat_seng']; ?></td>
                                <td><?php echo $g['zat_besi']; ?></td>
                                <td><?php echo $total_sum =
                                        $g['zat_karbohidrat'] +
                                        $g['zat_protein'] +
                                        $g['zat_lemak'] +
                                        $g['vitamin_a'] +
                                        $g['vitamin_d'] +
                                        $g['vitamin_e'] +
                                        $g['vitamin_k'] +
                                        $g['asam_folat'] +
                                        $g['zat_kalsium'] +
                                        $g['zat_seng'] +
                                        $g['zat_besi']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Step 5 Reduksi Sum row column 1</h6>
        </div>
        <div class="card-body">
            <?= $this->session->flashdata('message') ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Bahan Makanan</th>
                            <th class="karboh">Karbohidrat</th>
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
                            <th>Sum Row</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <?php
                        foreach ($nutrionMatrixSum as $g) { ?>
                            <tr>
                                <th>Sum Column</th>
                                <th></th>
                                <th><?php echo $g['total_zat_karbohidrat']; ?></th>
                                <th><?php echo $g['total_zat_protein']; ?></th>
                                <th><?php echo $g['total_zat_lemak']; ?></th>
                                <th><?php echo $g['total_vitamin_a']; ?></th>
                                <th><?php echo $g['total_vitamin_d']; ?></th>
                                <th><?php echo $g['total_vitamin_e']; ?></th>
                                <th><?php echo $g['total_vitamin_k']; ?></th>
                                <th><?php echo $g['total_asam_folat']; ?></th>
                                <th><?php echo $g['total_zat_kalsium']; ?></th>
                                <th><?php echo $g['total_zat_seng']; ?></th>
                                <th><?php echo $g['total_zat_besi']; ?></th>
                                <th></th>

                            </tr>
                        <?php } ?>
                    </tfoot>
                    <tbody>
                        <?php
                        $total_sum = 0;
                        foreach ($gizi as $g) { ?>
                            <tr class="data">
                                <td><?php echo $g['id_gizi']; ?></td>
                                <td><?php echo  $g['name']; ?></td>
                                <td><?php echo  $g['zat_karbohidrat']; ?></td>
                                <td><?php echo  $g['zat_protein']; ?></td>
                                <td><?php echo  $g['zat_lemak']; ?></td>
                                <td><?php echo  $g['vitamin_a']; ?></td>
                                <td><?php echo  $g['vitamin_d']; ?></td>
                                <td><?php echo  $g['vitamin_e']; ?></td>
                                <td><?php echo  $g['vitamin_k']; ?></td>
                                <td><?php echo  $g['asam_folat']; ?></td>
                                <td><?php echo  $g['zat_kalsium']; ?></td>
                                <td><?php echo  $g['zat_seng']; ?></td>
                                <td><?php echo $g['zat_besi']; ?></td>
                                <td><?php echo $total_sum =
                                        $g['zat_karbohidrat'] +
                                        $g['zat_protein'] +
                                        $g['zat_lemak'] +
                                        $g['vitamin_a'] +
                                        $g['vitamin_d'] +
                                        $g['vitamin_e'] +
                                        $g['vitamin_k'] +
                                        $g['asam_folat'] +
                                        $g['zat_kalsium'] +
                                        $g['zat_seng'] +
                                        $g['zat_besi']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>






    <?php $this->load->view('frontend/template/footer') ?>
    <?php $this->load->view('frontend/template/js') ?>

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
        $(document).ready(function() {

            $(document).on('click', '.add', function() {
                var html = '';
                html += '<tr>';
                html += '<td><select name="name" class="form-control item_unit"><option value="">select nutrion</option><?php

                                                                                                                        foreach ($groups as $row) {
                                                                                                                            echo '<option value="' . $row->id_gizi . '">' . $row->name . '</option>';
                                                                                                                        }
                                                                                                                        ?></select></td>';
                html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="fas fa-fw fa-minus"></span></button></td></tr>';
                $('#item_table').append(html);
            });

            $(document).on('click', '.remove', function() {
                $(this).closest('tr').remove();
            });

            $(document).on('click', '.insert_form', function() {
                console.log('bacot')
            });

        });
    </script>