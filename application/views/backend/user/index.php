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
                    <h1 class="h3 mb-0 text-gray-800">User Management</h1>
                    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Create User</a>
                </div>

                <!-- Content Row -->

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Daftar User</h6>
                    </div>
                    <div class="card-body">
                        <?= $this->session->flashdata('message') ?>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th class="d-none">ID User</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th>Role As</th>
                                        <th>Active ?</th>
                                        <th>Image Avatar</th>
                                        <th>Date Created</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th class="d-none">ID User</th>
                                        <th>Name</th>
                                        <th>Email</th> 
                                        <th>Password</th>
                                        <th>Role As</th>
                                        <th>Active ?</th>
                                        <th>Image Avatar</th>
                                        <th>Role Name</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    foreach ($user as $us) { ?>
                                        <tr class="data">
                                            <th><?php echo $us['id_user']; ?></th>
                                            <td><?php echo $us['name']; ?></td>
                                            <td><?php echo $us['email']; ?></td>
                                            <td><?php echo $us['password']; ?></td>
                                            <td><?php echo $us['role_id']; ?></td>
                                            <td><?php echo $us['is_active']; ?></td>
                                            <td><?php echo $us['image']; ?></td>
                                            <td><?php echo $us['role']; ?></td>

                                            <!-- <td>
           <a  href="<?php echo base_url('mahasiswa/edit/' . $m->id); ?>"><i class="fa fa-edit" aria-hidden="true"></i></a>
           <a  href="<?php echo base_url('mahasiswa/delete/' . $m->id); ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
          </td> -->
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>
            <!-- /.container-fluid -->

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
<?php $this->load->view('backend/template/js') ?>

</body>


</html>