<?php $this->load->view('backend/template/meta') ?>

<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <form class="user needs-validation" method="post" novalidate>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="name" placeholder="Full Name" value="<?php echo set_value('name'); ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user" id="email" placeholder="Email Address" value="<?php echo set_value('email'); ?>" required>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user" id="password" placeholder="Password" value="<?php echo set_value('password'); ?>" required>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-primary btn-user btn-block" value="Daftar" name="submit_register">
                        </form>
                        <div class="text-center">
                            <a class="small" href="<?= base_url('frontend/auth'); ?>">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?php $this->load->view('backend/template/js') ?>