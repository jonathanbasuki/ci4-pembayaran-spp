<?= $this->extend('templates/base_auth'); ?>
<?= $this->section('auth'); ?>

<section class="signin-section">
  <div class="container-fluid p-0 m-0 h-100">
    <div class="row g-0 auth-row">
      <div class="col-lg-6">
        <div class="auth-cover-wrapper bg-primary-100">
          <div class="auth-cover">
            <div class="title text-center">
              <h1 class="text-primary mb-10">Get Started</h1>
              <p class="text-medium">
                It's completely free.
              </p>
            </div>
            <div class="cover-image">
              <img src="assets/images/auth/signin-image.svg" alt="" />
            </div>
            <div class="shape-image">
              <img src="assets/images/auth/shape.svg" alt="" />
            </div>
          </div>
        </div>
      </div>
      <!-- end col -->
      <div class="col-lg-6">
        <div class="signup-wrapper">
          <div class="form-wrapper">
            <h6 class="mb-15">Sign Up Form</h6>
            <p class="text-sm mb-25">
              It's completely free.
            </p>
            
            <form action="<?= route_to('register') ?>" method="post">

              <?= csrf_field() ?>

              <div class="row">
                <div class="col-12 col-md-6">
                  <div class="input-style-1">
                    <label for="email"><?=lang('Auth.email')?></label>
                    <input type="email" name="email" id="email" value="<?= old('email'); ?>" placeholder="<?=lang('Auth.email')?>" class="form-control <?php if(session('errors.email')) : ?>is-invalid<?php endif ?>" />
                    <div class="invalid-feedback">
                      <?= session('errors.email') ?>
                    </div>
                  </div>
                </div>
                <!-- end col -->
                <div class="col-12 col-md-6">
                  <div class="input-style-1">
                    <label for="username"><?=lang('Auth.username')?></label>
                    <input type="text" name="username" id="username" value="<?= old('username'); ?>" placeholder="<?=lang('Auth.username')?>" class="form-control <?php if(session('errors.username')) : ?>is-invalid<?php endif ?>" />
                    <div class="invalid-feedback">
                      <?= session('errors.username') ?>
                    </div>
                  </div>
                </div>
                <!-- end col -->
                <div class="col-12 col-md-6">
                  <div class="input-style-1">
                    <label for="nisn">NISN</label>
                    <input type="number" name="nisn" id="nisn" value="<?= old('nisn'); ?>" placeholder="NISN" class="form-control <?php if(session('errors.nisn')) : ?>is-invalid<?php endif ?>" />
                    <div class="invalid-feedback">
                      <?= session('errors.nisn') ?>
                    </div>
                  </div>
                </div>
                <!-- end col -->
                <div class="col-12 col-md-6">
                  <div class="input-style-1">
                    <label for="nis">NIS</label>
                    <input type="number" name="nis" id="nis" value="<?= old('nis'); ?>" placeholder="NIS" class="form-control <?php if(session('errors.nis')) : ?>is-invalid<?php endif ?>" />
                    <div class="invalid-feedback">
                      <?= session('errors.nis') ?>
                    </div>
                  </div>
                </div>
                <!-- end col -->
                <div class="col-12">
                  <div class="input-style-1">
                    <label for="password"><?=lang('Auth.password')?></label>
                    <input type="password" name="password" id="password" placeholder="<?=lang('Auth.password')?>" class="form-control <?php if(session('errors.password') || session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" autocomplete="off" />
                    <div class="invalid-feedback">
                      <?= session('errors.password') ?>
                    </div>
                  </div>
                </div>
                <!-- end col -->
                <div class="col-12">
                  <div class="input-style-1">
                    <label for="pass_confirm"><?=lang('Auth.repeatPassword')?></label>
                    <input type="password" name="pass_confirm" id="pass_confirm" placeholder="Retype Password" class="form-control <?php if(session('errors.password') || session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" autocomplete="off" />
                    <div class="invalid-feedback">
                      <?= session('errors.pass_confirm') ?>
                    </div>
                  </div>
                </div>
                <!-- end col -->
                <div class="col-12">
                  <div
                  class="
                  button-group
                  d-flex
                  justify-content-center
                  flex-wrap
                  "
                  >
                  <button type="submit" class="main-btn primary-btn btn-hover w-100 text-center">
                    Sign Up
                  </button>
                </div>
              </div>
            </div>
            <!-- end row -->
          </form>

          <p class="text-sm text-medium text-dark text-center mt-4">
            Already have an account? <a href="<?= base_url('/login'); ?>">Sign In</a>
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

<?= $this->endSection(); ?>