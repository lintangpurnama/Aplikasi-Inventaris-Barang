    <div class="auth-wrapper">
        <div class="container-fluid h-100">
            <div class="row flex-row h-100 bg-white">
                <div class="col-xl-8 col-lg-6 col-md-5 p-0 d-md-block d-lg-block d-sm-none d-none">
                    <div class="lavalite-bg" style="background-image: url('<?= base_url('assets/') ?>img/auth/login-bg.jpg')">
                        <div class="lavalite-overlay"></div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-7 my-auto p-0">
                    <div class="authentication-form mx-auto">
                        <div class="logo-centered">
                            <a href="<?= base_url('assets/') ?>index.html"><img src="<?= base_url('assets/') ?>src/img/brand.svg" alt=""></a>
                        </div>
                        <h3>Sign In to ThemeKit</h3>
                        <p>Happy to see you again!</p>

                        <?php if ($this->session->flashdata('success')) : ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?= $this->session->flashdata('success');
                                ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <i class="ik ik-x"></i>
                                </button>
                            </div>
                        <?php endif ?>
                        <?php if ($this->session->flashdata('error')) : ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?= $this->session->flashdata('error');
                                ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <i class="ik ik-x"></i>
                                </button>
                            </div>
                        <?php endif ?>
                        <!-- <?= base_url('assets/') ?>index.html -->
                        <form action="" method="POST">
                            <div class="form-group">
                                <input type="text" class="form-control <?= form_error('user') ? 'is-invalid' : '' ?>" placeholder="Email atau NPP anda" name="user" value="<?= set_value('user') ?>">
                                <div class="invalid-feedback">
                                    <?= form_error('user') ?>
                                </div>
                                <i class="ik ik-user"></i>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control <?= form_error('password') ? 'is-invalid' : '' ?>" placeholder="Password" name="password" value="<?= set_value('password') ?>">
                                <div class="invalid-feedback">
                                    <?= form_error('password') ?>
                                </div>
                                <i class="ik ik-lock"></i>
                            </div>
                            <div class="row">

                                <div class="col text-right">
                                    <a href="<?= base_url('forget') ?>">Forgot Password ?</a>
                                </div>
                            </div>
                            <div class="sign-btn text-center">
                                <button class="btn btn-theme" type="submit">Sign In</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>